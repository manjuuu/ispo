<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Form;
use App\UserGroup;
use App\Group;
use App\User;
use Auth;

class GroupController extends Controller
{
	/**
     * Display a listing of the groups.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$group_ids = UserGroup::where('can_edit', 1)->select('group_id')->get();
    	$groups = Group::whereIn('id', $group_ids)->with('users')->paginate(10);
    	return view('editor.group.list', compact('groups'));
    }

    /**
     * Show the form for creating a new usergroup.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$users = User::where('admin', '!=', 1)->get();
    	return view('editor.group.create', compact('users'));
    }

    /**
     * Store a newly created usergroup in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'title' => 'required|unique:groups|string|min:3|max:255',
    		'user_id' => 'required|string'
    	]);
    	
    	if ($validator->fails())
    	{
    		return redirect()->action('GroupController@create')
    			->withErrors($validator)
    			->withInput();
    	}

    	$group = new Group;
    	$group->title = $request->title;
    	$group->cost_center = '';
    	$group->save();
    	$usergroup = new UserGroup;
    	$usergroup->user_id = $request->user_id;
    	$usergroup->group_id = $group->id;
    	$usergroup->can_enroll = 0;
    	$usergroup->can_edit = 1;
    	$usergroup->save();
    	return redirect()->action('GroupController@index')->with('success', 'User Group addedd Successfully!');
    }
}
