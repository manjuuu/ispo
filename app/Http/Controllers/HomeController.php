<?php

namespace App\Http\Controllers;

use App\Form;
use Auth;
use DB;
use App\UserGroup;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->admin == 1) {
            $forms = Form::all()->load('group');
        } else {
            $groups = UserGroup::where('user_id', Auth::id())->select('group_id')->get();
            $forms = Form::whereIn('group_id', $groups)->get()->load('group');
        }

        $today = DB::table('responses')
                   ->select(DB::raw('count(*) as aggergate, forms.title'))
                   ->join('forms', 'forms.id', 'responses.form_id')
                   ->where('responses.created_at', '>=', date('Y-m-d'))
                   ->where('responses.user_id', '=', Auth::id())
                   ->groupBy('forms.title')
                   ->get();
        $groups = DB::table('groups')
                    ->select(DB::raw('groups.title, can_edit, can_enroll'))
                    ->join('user_groups', 'groups.id', 'user_groups.group_id')
                    ->where('user_groups.user_id', '=', Auth::id())
                    ->get();
        return view('response.index', compact('forms', 'today', 'groups'));
    }
}
