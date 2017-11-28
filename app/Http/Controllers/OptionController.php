<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\UserGroup;
use Auth;
use App\Group;
use App\QuestionType;
use App\OptionGroup;
use App\Question;
use App\Option;

class OptionController extends Controller
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
    public function create(Request $request)
    {
        $option_group = OptionGroup::find($request->option_group_id);
        return view('editor.option.create', compact('option_group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $option = new Option;
        $option->option_group_id = $request->option_group_id;
        $option->title = $request->title;
        $option->parent_id = 0;
        $option->save();
        return redirect()->action('OptionGroupController@edit', [$request->option_group_id]);
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
        $option = Option::find($id);
        $option_group = OptionGroup::find($option->option_group_id);
        return view('editor.option.edit', compact('option_group', 'option'));
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
        $option = Option::find($id);
        $option->title = $request->title;
        $option->parent_id = 0;
        $option->save();
        return redirect()->action('OptionGroupController@edit', [$option->option_group_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Option::find($id);
        $option_group_id = $option->option_group_id;
        $option->delete();
        return redirect()->action('OptionGroupController@edit', [$option_group_id]);
    }
}
