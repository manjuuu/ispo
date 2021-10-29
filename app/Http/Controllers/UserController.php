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
use DB;

class UserController extends Controller
{
	/**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::where('admin', '!=', 1)->with('groups')->paginate(10);
    	return view('editor.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('editor.user.create', compact('groups'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'username' => 'required|unique:users|string|min:8|max:8',
    		'name' => 'required|string|min:3|max:255',
    		'group_id' => 'required|string'
    	]);
    	
    	if ($validator->fails())
    	{
    		return redirect()->action('UserController@create')
    			->withErrors($validator)
    			->withInput();
    	}

    	$user = new User;
    	$user->username = $request->username;
    	$user->name = $request->name;
    	$user->admin = $request->admin;
    	$user->remember_token = Str::random(60);
    	$user->save();
    	$usergroup = new UserGroup;
    	$usergroup->user_id = $user->id;
    	$usergroup->group_id = $request->group_id;
    	$usergroup->can_enroll = 1;
    	$usergroup->can_edit = 0;
    	$usergroup->save();
    	return redirect()->action('UserController@index')->with('success', 'User addedd Successfully!');
    }

    /**
     * Remove the specified user in a group from storage.
     *
     * @param  int  $user_id
     * @param  int  $group_id
     * @return \Illuminate\Http\Response
     */
    public function unassign($user_id, $group_id)
    {
    	$usergroup = new UserGroup;
    	UserGroup::where('user_id', $user_id)->where('group_id', $group_id)->delete();
    	return redirect()->action('UserController@index')->with('success', 'Removed User from a group successfully');
    }
}
