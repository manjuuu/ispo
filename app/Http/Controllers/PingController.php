<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PingController extends Controller
{
    public function ping() {
      return response()->json([
        'status' => 'OK',
        'loggedIn' => Auth::check()
      ]);
    }
}
