<?php

namespace App\Http\Controllers\Rankings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RankingPVP;
use App\Http\Controllers\Controller;

class PVPController extends Controller
{
    public function index(Request $request)
    {
        $n = 1;

        $rankingPVP = RankingPVP::select('char_name', 'matou', 'morreu', 'total')->orderByDesc('total')->limit(50)->get();

        if(Auth::check()) {
            return view('rankings.pvp', [
                'user' => $request->user()->userid,
                'photo' => $request->user()->photo,
                'level' => $request->user()->group_id,
                'rankingPVP' => $rankingPVP,
                'n' => $n
            ]);
        } else {
            return view('rankings.pvp', [
                'user' => $request->user()->userid,
                'photo' => $request->user()->photo,
                'level' => $level,
                'rankingPVP' => $rankingPVP,
                'n' => $n
            ]);
        }

    }
}
