<?php

namespace App\Http\Controllers\User;

use App\Models\Char;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Guild;
use Illuminate\Support\Facades\DB;

class MyChars extends Controller
{
    public function index(Request $request)
    {

        $id = $request->user()->account_id;

        $chars = DB::select("SELECT c.sex, c.account_id, c.char_id as charid, c.name as char_name, c.class, c.base_level, c.job_level, c.guild_id, c.last_map, g.char_id, g.emblem_id, g.name as guild_name FROM `char` AS c LEFT JOIN guild AS g ON c.char_id = g.char_id  WHERE c.account_id=$id");

        return view('user.mychars', [
            'user' => $request->user()->userid,
            'photo' => $request->user()->photo,
            'level' => $request->user()->group_id,
            'chars' => $chars,
        ]);
    }

    public function resetPosition(Request $request)
    {
        $reset_char = Char::where('char_id', '=', $request->query('id'))->first();

        $reset_char->last_map = "prontera";
        $reset_char->last_x = 150;
        $reset_char->last_y = 150;
        $reset_char->save();

        return back()->with('custom_alert','Posição do personagem resetada com sucesso.');
    }

    public function resetStyle(Request $request)
    {

        $reset_char = Char::where('char_id', '=', $request->query('id'))->first();

        $reset_char->hair = 1;
        $reset_char->hair_color = 1;
        $reset_char->clothes_color = 1;
        $reset_char->body = 0;
        $reset_char->save();

        return back()->with('custom_alert','Estilo do personagem resetado com sucesso.');
    }
}
