<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Exception;

class ExceptionController extends Controller
{
    public function index()
    {
        return view('exception.index');
    }


    	public function search(Request $request)
	{
    
        $user = User::findOrFail($request->input('user_id'));
    	return view('exception.search', compact('user'));
	}
}
