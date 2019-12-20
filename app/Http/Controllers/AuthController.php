<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Conduent\LDAP;
use Session;


class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }



    public function login(Request $request)
    {
        
        
            $user = User::where('username', $request->username)->first();
            Auth::login($user);
            return redirect()->intended()->with(['message' => ['time' => 2000, 'type' => 'success', 'message' =>'You are logged in.']]);
        
    }




    /*public function login(Request $request)
    {
        $loggedIn = LDAP::authenticate($request->username, $request->password, env('LDAP_DOMAIN'), env('LDAP_IPADDRESS'));
        if ($loggedIn) {
            $user = User::where('username', $request->username)->first();
            Auth::login($user);
            return redirect()->intended()->with(['message' => ['time' => 2000, 'type' => 'success', 'message' =>'You are logged in.']]);
        } else {
            return redirect('login')->with(['message' => ['time' => 5000, 'type' => 'error', 'message' =>'Username or password incorrect.']]);
        }
    }*/
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('login')->with('message_logout', 'You just logged out.');;
    }
}
