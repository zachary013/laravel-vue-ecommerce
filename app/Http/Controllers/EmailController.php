<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail() {
        // send email
        $toEmail = 'noreply@cloe.com';
        $message = 'Welcome to Cloe official website';
        $subject = 'Welcome mail in laravel using gmail';

        Mail::to($toEmail)->send(new MyEmail($message, $subject));
    }
}
