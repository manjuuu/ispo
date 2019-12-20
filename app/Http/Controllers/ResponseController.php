<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Response;
use App\Question;
use App\Option;
use DB;
use Auth;
use App\UserGroup;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function responses($form_id)
    {
        $responses = Response::where('form_id', $form_id)->with('user')->orderBy('id', 'desc')->paginate(15);
        $questions = Question::where('form_id', $form_id)->get()->keyBy('id');
        $form = Form::find($form_id);
        $this->authorize('view', $form);
        return view('reports.responses', compact('responses', 'questions', 'form'));
    }
    public function export(Request $request, $form_id)
    {
        $this->authorize('view', Form::find($form_id));
        $dte_f = Carbon::parse($request->dte_from);
        $dte_t = Carbon::parse($request->dte_to);
        $responses = Response::where('form_id', $form_id)->where('created_at', '>=', $dte_f)->where('created_at', '<=', $dte_t)->with('user')->get();
        $questions = Question::where('form_id', $form_id)->get()->keyBy('id');
        $headers = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0'
            , 'Content-type' => 'text/csv'
            , 'Content-Disposition' => 'attachment; filename=export.csv'
            , 'Expires' => '0'
            , 'Pragma' => 'public'
        ];
        $header = ['User', 'Created At'];

        foreach ($questions as $question) {
            $header[] = $question->title;
        }

       $callback = function() use ($responses, $questions, $header)
        {
            $handler = fopen('php://output', 'w');
            fputcsv($handler, $header);
            foreach ($responses as $response) {
                $row = [
                    $response->user->username,
                    $response->created_at,
                  ];
                foreach ($questions as $question) {
                    if (array_key_exists('q'.$question->id, $response->response_request)) {
                        $row[] = $response->response_request['q'.$question->id];
                    } else {
                        $row[] = '';
                    }
                }
                fputcsv($handler, $row);
            }
            fclose($handler);
        };

        return response()->stream($callback, 200, $headers);

    }

    public function forms()
    {
        if (Auth::user()->admin == 1) {
            $forms = Form::with('group')->orderBy('group_id', 'asc')->orderBy('title', 'asc')->get();
        } else {
            $groups = UserGroup::where('user_id', Auth::id())->select('group_id')->get();
            $forms = Form::whereIn('group_id', $groups)->orderBy('group_id', 'asc')->orderBy('title', 'asc')->get();
        }
        return view('reports.index', compact('forms'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $form = Form::findOrFail($id);

        $this->authorize('view', $form);

        $passThough = request()->query->all();

        request()->session()->put('passThough', $passThough);

        $form = $form->load(['questions', 'questions.questiontype', 'questions.optiongroup.options', 'questions.optiongroup.options.children']);

        return view('response.form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $form_id = decrypt($request->_form);
        $response = new Response;
        $response->user_id = Auth::id();
        $response->form_id = $form_id;
        $response->response_request = $request->except(['_form','_token','_savestate']);
       $response->response_attributes = session('passThough');
        /*foreach($request->except(['_form','_token','_savestate']) as $k => $v) {
        $question_id = intval(preg_replace("/[^0-9]/", "", $k));
            $response->question_id=$question_id;
         }*/
        $response->save();

        $update = Question::where('form_id', $form_id)->where('update_options', true)->select(['id', 'option_group_id'])->get()->keyBy('id');
        if($update->count() > 0) {
            $update = $update->toArray();
            foreach($request->except(['_form','_token','_savestate']) as $k => $v) {
                $question_id = intval(preg_replace("/[^0-9]/", "", $k));
                if(array_key_exists($question_id, $update)) {
                    Option::firstOrNew(['option_group_id' => $update[$question_id]['option_group_id'], 'title' => $v, 'parent_id' => 0])->save();
                }
            }
        }
        $request->session()->put('passThough', []);
        if ($request->_savestate == "Save >> New Form") {
            return redirect(route('forms'))->with(['message' => ['time' => 2000, 'type' => 'success', 'message' =>'Disposition Saved']]);
        } else {
            return redirect(route('response', ['id' => $form_id]))->with(['message' => ['time' => 2000, 'type' => 'success', 'message' =>'Disposition Saved']]);
        }
    }

    /**
     * Display the all resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listdisposes(){
        $lists=DB::table('responses')->get();
         return view('response.list',compact('lists'));
    }


    /**
     * Display the all resource for update.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_dispose(Response $request,$id)
    {
        $view=DB::table('responses')->where('id',$id)->get();
        $logs=DB::table('logs')->get();
        foreach ($logs as $key ) {
        $logarray=unserialize($key->log);
           }
         return view('response.view',compact('view','logarray'));
    } 


    /**
     * update all resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_dispose(Response $request,$id){
        $response=Input::get('respons');
       // return $response;
        DB::table('responses')->where('id',$id)->update(['response_request'=>$response]);
        $user=Auth::user()->name;
       /* $details = serialize(array('page'=>'mypage','action'=>'add','added_by'=>$user,'added_data'=>'dats','added_date'=>date('Y-m-d H:i:s')));
        DB::table('logs')->update(['log'=>$details]);*/
        return redirect('/list_all_disposes');
    }  


    /**
     * delet all resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete_dispose(Request $request,$id){
         DB::table('responses')->where('id',$id)->delete();
         return redirect('/list_all_disposes');
        }

    /**
     * Dispaly serialized data in view which is stored in database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function logs_check()
    {
         $logs=DB::table('logs')->get();
         foreach ($logs as $key ) {
        $logarray=unserialize($key->log);
           }
         return view('response.logs',compact('logarray','logs'));

    }  
*/

    public function logs_check()
    {
        $logs=DB::table('logs')->get();
        //return json_encode($logs);
        foreach ($logs as $key ) {
        $mylogs=json_decode($key->log);
        $log=str_replace(array('[', ']'), '', htmlspecialchars(json_encode($mylogs), ENT_NOQUOTES));
     
    }
    return view('response.logs',compact('logs','log'));

    }



    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
