<?php

namespace App\Http\Controllers\Database;

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
use Yajra\DataTables\Contracts\DataTable;
use App\Models\Item;

class DatabaseController extends Controller
{
    public function item(Request $request)
    {
        $itens = Item::paginate(1000);

        if(Auth::check()) {
            return view('database.item', [
                'user' => $request->user()->userid,
                'photo' => $request->user()->photo,
                'level' => $request->user()->group_id,
                'type_itens' => $this->type(),
                'equipIn' => $this->equip(),
                'itens' => $itens
            ]);
        } else {
            return view('database.item', [
                'user' => null,
                'photo' => null,
                'level' => null,
                'type_itens' => $this->type(),
                'equipIn' => $this->equip(),
                'itens' => $itens
            ]);
        }

    }

    public function type()
    {
        $type_itens = [
            0 => 'Cura',
            2 => 'Usável',
            3 => 'Etc',
            4 => 'Arma',
            5 => 'Armadura',
            6 => 'Carta',
            7 => 'Ovo de PET',
            8 => 'Equipamento de PET',
            10 => 'Munição',
            11 => 'Usável com Delay',
            18 => 'Recompensa de CashShop'];

        return $type_itens;
    }

    public function equip()
    {

        $equipIn = [
            0 => 'Nenhum',
            65536 => 'Armadura Sombria',
            131072 => 'Arma Sombria',
            262144 => 'Escudo Sombrio',
            524288 => 'Sapatos Sombrio',
            1048576 => 'Acessório 2 Sombrio',
            2097152 => 'Acessório 1 Sombrio',
            4096 => 'Visual Baixo',
            2048 => 'Visual Meio',
            1024 => 'Visual Topo',
            256 => 'Cabeça Topo',
            512 => 'Cabeça Meio',
            1 => 'Cabeça Baixo',
            769 => 'Topo/Meio/Baixo Cabeça',
            768 => 'Topo/Meio Cabeça',
            257 => 'Topo/Baixo Cabeça',
            513 => 'Meio/Baixo Cabeça',
            16 => 'Armadura',
            2 => 'Arma',
            32 => 'Escudo',
            34 => 'Duas Mãos',
            50 => 'Armadura/Mãos',
            4 => 'Vestimenta',
            64 => 'Calçado',
            136 => 'Acessório',
            32768 => 'Munição'];

        return $equipIn;

    }
}
