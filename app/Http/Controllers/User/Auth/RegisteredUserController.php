<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function index()
    {
        return view('user.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->only('userid', 'email', 'password'), [
            'userid' => 'required|min:4|max:10|unique:login,userid',
            'email' => 'required|unique:login,email',
            'password' => 'required|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only([
            'userid',
            'email',
            'password',
            'password_confirmation'
        ]);

        $user = User::create([
            'userid' => $data['userid'],
            'email' => $data['email'],
            'user_pass' => $data['password']
        ]);

        Auth::login($user);
        return redirect()->route('index');
    }
}
