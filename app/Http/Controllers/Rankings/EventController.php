<?php

namespace App\Http\Controllers\Rankings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(Request $request)
    {

        $n = 1;

        $rankingEvent = DB::select("SELECT c.name as char_name, c.eventos, g.name as guild_name FROM `char` AS c LEFT JOIN guild AS g ON c.char_id = g.char_id ORDER BY eventos DESC");

        if(Auth::check()) {
            return view('rankings.event', [
                'user' => $request->user()->userid,
                'photo' => $request->user()->photo,
                'level' => $request->user()->group_id,
                'rankingEvent' => $rankingEvent,
                'n' => $n
            ]);
        } else {
            return view('rankings.event', [
                'user' => null,
                'photo' => null,
                'level' => null,
                'rankingEvent' => $rankingEvent,
                'n' => $n
            ]);
        }

    }
}
