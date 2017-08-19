<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Response;
use Auth;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::get()->load('questions');
        return view('response.index', compact('forms'));
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
        $response->save();

        $request->session()->put('passThough', []);
        if ($request->_savestate == "Save >> New Form") {
            return redirect(route('forms'))->with(['message' => ['time' => 2000, 'type' => 'success', 'message' =>'Disposition Saved']]);
        } else {
            return redirect(route('response', ['id' => $form_id]))->with(['message' => ['time' => 2000, 'type' => 'success', 'message' =>'Disposition Saved']]);
        }
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
