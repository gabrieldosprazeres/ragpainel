<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database;

class IndexController extends Controller
{
    public function index(Request $request)
    {

        if(Auth::check()) {
            return view('index', [
                'user' => $request->user()->userid,
                'photo' => $request->user()->photo

            ]);
        } else {
            return view('index');
        }

    }
}
