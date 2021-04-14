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
use App\Models\Config;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    public function index(Request $request)
    {
        $configs = [];

        $dbconfigs = Config::get();

        foreach ($dbconfigs as $dbconfig){
            $configs [ $dbconfig['name'] ] = $dbconfig['content'];
        }

        return view('admin.config', [
            'user' => $request->user()->userid,
            'photo' => $request->user()->photo,
            'level' => $request->user()->group_id,
            'configs' => $configs
        ]);
    }

    public function saveGeneral(Request $request)
    {
        $date = $request->only(['title', 'title_mini', 'email', 'discord', 'facebook']);

        $validator = Validator::make($date, [
            'title' => 'required|min:4|max:100',
            'title_mini' => 'required|min:2|max:2',
            'email' => 'required|email:rfc,dns|min:4|max:100',
            'facebook' => 'required|active_url|min:4|max:100',
            'discord' => 'required|active_url|min:4|max:100'
        ]);

        if ($validator->fails()) {
            return redirect('admin/configs')
                ->withErrors($validator)
                ->withInput();
        }

        foreach ($date as $item => $value){

            Config::where('name', $item)->update(['content' => $value]);
        }

        return back()->with('custom_alert_success', 'Configurações atualizadas com sucesso.');
    }

    public function saveColor(Request $request)
    {

        Config::where('name', 'color')->update(['content' => $request->query('color')]);

        return back()->with('custom_alert_success', 'Cor atualizada com sucesso.');
    }

    public function saveColorBg(Request $request)
    {

        Config::where('name', 'colorbg')->update(['content' => $request->query('colorbg')]);

        return back()->with('custom_alert_success', 'Cor de fundo atualizada com sucesso.');
    }
}
