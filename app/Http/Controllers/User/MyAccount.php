<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyAccount extends Controller
{
    public function index(Request $request)
    {
        return view('user.myaccount', [
        'user' => $request->user()->userid,
        'photo' => $request->user()->photo,
        'level' => $request->user()->group_id,
        'email' => $request->user()->email,
        'birthdate' => $request->user()->birthdate,
        'logins' => $request->user()->logincount,
        'lastlogin' => $request->user()->lastlogin,
        'lastip' => $request->user()->last_ip,
        'cash' => $request->user()->cash,
        'daysvip' => $request->user()->diasvip
        ]);
    }
}
