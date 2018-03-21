<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Queue;
use App\Task;
use App\UserQueue;
use Auth;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin == 1) {
            $queues = Queue::with('group')->paginate(6);
        } else {
            $groups = UserQueue::where('user_id', Auth::id())->select('queue_id')->get();
            $queues = Queue::whereIn('queue_id', $groups)->with('group')->paginate(6);
        }
        return view('queue.index', compact('queues'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->session()->reflash();

        $tasks = Task::where('queue_id', $id)->has('locks', '<', 1)->has('response', '<', 1)->orderBy('created_at', 'asc')->select(['id'])->first();
        if(empty($tasks)) {
            return redirect()->action('QueueController@index')->with(['message' => ['time' => 2000, 'type' => 'error', 'message' =>'No more work in this queue.']]);
        }
        return redirect()->action('TaskController@show', [$tasks->id]);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
