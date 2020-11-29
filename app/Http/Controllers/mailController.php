<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\verifiedMail;

use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function sendMail(Request $req){
        Mail::to($req->email)->send(new verifiedMail());

		return redirect ('/');
    }
}
