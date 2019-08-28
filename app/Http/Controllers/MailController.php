<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class MailController extends Controller
{
    public function sendEmail()
    {
       dispatch(new SendEmailJob());

        echo 'email sent';
    }
}
