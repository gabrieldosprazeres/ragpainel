<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database;
use App\Models\Char;
use App\Models\Guild;
use App\Models\RankingPVP;
use App\Models\RankingGVG;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ManagerVipController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.managervip', [
            'user' => $request->user()->userid,
            'photo' => $request->user()->photo,
            'level' => $request->user()->group_id,
            'findvip' => null,
            'findlogin' => null
        ]);

    }

    public function add(Request $request){

        $validator = Validator::make($request->only('login', 'vipadd'), [
            'login' => 'required|min:4|max:10',
            'vipadd' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/managervip')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('userid', $request->input('login'))->first();

        if($user) {
            $user->diasvip += $request->vipadd;
            $user->group_id = 1;
            $user->save();
            return back()->with('custom_alert_success', 'Dias VIP adicionados com sucesso na conta: '.$request->input('login').'.');
        } else {
            return back()->with('custom_alert', 'Usuário não encontrado.');
        }

    }

    public function remove(Request $request){

        $validator = Validator::make($request->only('login', 'vipremove'), [
            'login' => 'required|min:4|max:10',
            'vipremove' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/managervip')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('userid', $request->input('login'))->first();

        if($user) {
            $user->diasvip -= $request->vipremove;
            if($user->diasvip <= 1){
                $user->group_id = 0;
            }
            $user->save();
            return back()->with('custom_alert', 'Dias VIP removidos com sucesso na conta: '.$request->input('login').'.');
        } else {
            return back()->with('custom_alert', 'Usuário não encontrado.');
        }

    }

    public function find(Request $request){

        $validator = Validator::make($request->only('login'), [
            'login' => 'required|min:4|max:10',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/managervip')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('userid', $request->input('login'))->first();

        if($user) {
            return view('admin.managervip', [
                'user' => $request->user()->userid,
                'photo' => $request->user()->photo,
                'level' => $request->user()->group_id,
                'findlogin' => $user->userid,
                'findvip' => $user->diasvip
            ]);
        } else {
            return back()->with('custom_alert', 'Usuário não encontrado.');
        }

    }
}
