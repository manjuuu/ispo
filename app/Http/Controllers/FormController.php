<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\UserGroup;
use Auth;
use App\Group;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin == 1) {
            $forms = Form::with('group')->paginate(6);
        } else {
            $groups = UserGroup::where('user_id', Auth::id())->select('group_id')->get();
            $forms = Form::whereIn('group_id', $groups)->with('group')->paginate(6);
        }
        return view('editor.form.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->admin == 1) {
            $groups = Group::all();
        } else {
            $group_id = UserGroup::where('can_edit', 1)->where('user_id', Auth::id())->select('group_id')->get();
            $groups = Group::whereIn('id', $group_id)->get();
        }
        return view('editor.form.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = new Form;
        $form->title = $request->title;
        $form->active = 1;
        $form->group_id = $request->group_id;
        $form->save();
        return redirect()->action('FormController@edit', [$form->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        view('editor.form.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Form::find($id)->load(['group','questions']);
        return view('editor.form.edit', compact('form'));
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
        $form = Form::find($id);
        $form->title = $request->title;
        $form->active = $request->active;
        $form->mail=$request->mail;
        $form->save();
        return redirect()->action('FormController@edit', [$form->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = Form::find($id);
        $form->delete();
        return redirect()->action('FormController@index');
    }
}
