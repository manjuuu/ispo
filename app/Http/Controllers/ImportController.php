<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Task;
use Auth;
use App\Queue;
use App\ApiToken;

class ImportController extends Controller
{
    public function index()
    {
        if (Auth::user()->admin == 1) {
            $queues = Queue::with('group')->get();
        } else {
            $groups = UserQueue::where('user_id', Auth::id())->select('queue_id')->get();
            $queues = Queue::whereIn('queue_id', $groups)->with('group')->get();
        }
        return view('import.index', compact('queues'));
    }
    public function process(Request $request)
    {
        $inputCsv = Reader::createFromPath($request->csv_import->path());
        $inputCsv->setDelimiter(',');
        $inputCsv->setHeaderOffset(0);
        foreach ($inputCsv->getRecords() as $record) {
            $task = Task::create(['queue_id' => $request->queue_id, 'task_details' => $record, 'created_user_id' => Auth::id()]);
        }
        return redirect()->back()->with(['message' => ['time' => 2000, 'type' => 'success', 'message' =>'Your CSV was imported.']]);
    }
    public function api(Request $request)
    {
        $token_id = $request->header('X-DISPO-TOKEN');

        $token = ApiToken::where('token', $token_id)->first();

        if(empty($token))
        {
            return abort(401, 'Not authorized to access this queue.');
        }

        $queue = Queue::find($token->queue_id);

        $task = Task::create(['queue_id' => $queue->id, 'task_details' => ($request->all()), 'created_user_id' => 0]);
        
        return $task->id;
    }
}
