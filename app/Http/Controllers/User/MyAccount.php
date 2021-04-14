<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;

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
        'daysvip' => $request->user()->diasvip,
        'password' => $request->user()->user_pass
        ]);
    }

    public function uploadimg(Request $request)
    {

        $validator = Validator::make($request->only('myPhoto'), [
            'myPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('myaccount')
                ->withErrors($validator)
                ->withInput();
        }

        $imageName = time().'.'.$request->myPhoto->extension();
        $request->myPhoto->move('assets/img/users', $imageName);
        $img = User::where('userid', $request->user()->userid)->first();
        $img->photo = $imageName;
        $img->save();

        return back()->with('custom_alert','Foto de perfil atualizada com sucesso.');

    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->only('email', 'password', 'password_confirmation'), [
            'email' => 'required',
            'password' => 'required|min:8|confirmed',
            'birthdate' => 'date_format:"d/m/Y"',
        ]);

        if ($validator->fails()) {
            return redirect('myaccount')
                ->withErrors($validator)
                ->withInput();
        }

        if($request->user()->email != $request->input('email')){

            $hasEmail = User::where('email', $request->input('email'))->get();

            if(count($hasEmail) === 0) {
                $request->user()->email = $request->input('email');
            } else {
                    return back()->with('custom_alert_danger','Já existe um usuário utilizando este e-mail.');
                }
        }

        if($request->user()->user_pass != $request->input('password')){

            $request->user()->user_pass = $request->input('password');
        }

        if($request->user()->birthdate != $request->input('birthdate')){

            $request->user()->birthdate = $request->input('birthdate');
        }

        $request->user()->save();
        return back()->with('custom_alert','Dados atualizados com sucesso.');
    }
}
