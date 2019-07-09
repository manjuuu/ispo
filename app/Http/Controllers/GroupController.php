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
use Response;

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
    	return view('editor.group.create');
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
    		'title' => 'required|unique:groups|string|min:3|max:255'
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
    	$usergroup->user_id = Auth::user()->id;
    	$usergroup->group_id = $group->id;
    	$usergroup->can_enroll = 0;
    	$usergroup->can_edit = 1;
    	$usergroup->save();
    	return redirect()->action('GroupController@index')->with('success', 'User Group addedd Successfully!');
    } 

    /**
     * Get group id for getting form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function get_gropuid_for_form(Request $request){
        $getgroupid=Group::all();
        return view('response.groups',compact('getgroupid'));
} 

/**
     * Ajax request for getting form from group id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function getform(Request $request,$id){
        $group=DB::table('forms')->where('group_id','=',$id)->get();
        return response()->json($group);

} 

/**
     * Ajax request for getting response from form id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function getresponse(Request $request,$id){
    $response_for_form=DB::table('responses')->where('form_id','=',$id)->get();
    return Response::json($response_for_form);

}
}
