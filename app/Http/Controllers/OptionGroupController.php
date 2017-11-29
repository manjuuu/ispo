<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OptionGroup;
use App\UserGroup;
use Auth;
use App\Group;

class OptionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin == 1) {
            $optiongroups = OptionGroup::with('group')->paginate(6);
        } else {
            $groups = UserGroup::where('can_edit', 1)->where('user_id', Auth::id())->select('group_id')->get();
            $optiongroups = OptionGroup::whereIn('group_id', $groups)->with('group')->paginate(6);
        }
        return view('editor.optiongroup.index', compact('optiongroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group_id = UserGroup::where('can_edit', 1)->where('user_id', Auth::id())->select('group_id')->get();
        $groups = Group::whereIn('id', $group_id)->get();
        return view('editor.optiongroup.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = new OptionGroup;
        $form->title = $request->title;
        $form->group_id = $request->group_id;
        $form->save();
        return redirect()->action('OptionGroupController@edit', [$form->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        view('editor.optiongroup.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $optiongroup = OptionGroup::find($id)->load(['group', 'options']);
        return view('editor.optiongroup.edit', compact('optiongroup'));
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
        $form = OptionGroup::find($id);
        $form->title = $request->title;
        $form->save();
        return redirect()->action('OptionGroupController@edit', [$form->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = OptionGroup::find($id);
        $form->delete();
        return redirect()->action('OptionGroupController@index');
    }
}
