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
        'daysvip' => $request->user()->diasvip
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
        $request->myPhoto->move(public_path('assets\img\users'), $imageName);
        $img = User::where('userid', $request->user()->userid)->first();
        $img->photo = $imageName;
        $img->save();

        return back()->with('custom_alert','Foto de perfil atualizada com sucesso.');

    }
}
