<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\TaskResponse;
use Auth;
use App\TaskLock;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task_id = decrypt($request->_task);
        $task = Task::find($task_id);
        $response = new TaskResponse;
        $response->user_id = Auth::id();
        $response->task_id = $task_id;
        $response->response_attributes = $request->except(['_task','_token','_savestate']);
        $response->save();
        return redirect()->action('QueueController@show',[$task->queue_id])->with(['message' => ['time' => 2000, 'type' => 'success', 'message' =>'Disposition Saved']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::where('id', $id)->has('locks', '<', 1)->has('response', '<', 1)->orderBy('created_at', 'asc')->first();
        if(empty($task)) {
            return redirect()->action('QueueController@index')->with(['message' => ['time' => 2000, 'type' => 'error', 'message' =>'Invalid Task']]);
        }
        $this->authorize('view', $task->queue);

        if($task->locked()) 
        {
            return redirect()->action('QueueController@index')->with(['message' => ['time' => 2000, 'type' => 'error', 'message' =>'Task is locked. Please try again in 10 minuites.']]);
        }
        $task = $task->load(['queue.questions', 'queue.questions.questiontype', 'queue.questions.optiongroup.options', 'queue.questions.optiongroup.options.children']);
        $lock = TaskLock::create(['user_id' => Auth::id(), 'task_id' => $task->id]);
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function skip(Request $request, $id)
    {
        $task = Task::find($id);
        $this->authorize('view', $task->queue);
        $lock = TaskLock::create(['user_id' => 0, 'task_id' => $task->id]);
        return redirect()->action('QueueController@show',[$task->queue_id])->with(['message' => ['time' => 2000, 'type' => 'success', 'message' =>'Task Skipped for 10 mins.']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
