<?php

namespace App\Http\Controllers\Tickets;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database;
use App\Models\Char;
use App\Models\Guild;
use App\Models\RankingPVP;
use App\Models\RankingGVG;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;
use App\Models\Item;
use App\Models\Monster;
use App\Models\TicketsCategory;
use App\Models\Ticket;

class TicketsController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()) {
            return view('tickets.index', [
                'user' => $request->user()->userid,
                'photo' => $request->user()->photo,
                'email' => $request->user()->email,
                'level' => $request->user()->group_id,
                'categorys' => $this->category()
            ]);
        } else {
            return view('tickets.index', [
                'user' => null,
                'photo' => null,
                'level' => null,
                'categorys' => $this->category()
            ]);
        }
    }

    public function category(){

        $categorys = TicketsCategory::all();

        return $categorys;
    }

    public function imageupload(Request $request){
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        $imageName = time().'.'.$request->file->extension();
        $request->file->move(public_path('assets/img/tickets'), $imageName);
        return [
            'location' => asset('assets/img/tickets/'.$imageName),
        ];
    }

    public function send(Request $request){

        $validator = Validator::make($request->only('title', 'body'), [
            'title' => 'required|min:4|max:24',
            'body' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            return redirect('tickets')
                ->withErrors($validator)
                ->withInput();
        }

        if($request->input('category') == null){

            return back()->with('custom_alert', 'Selecione uma categoria.');
        }

        $ticket = new Ticket;
        $ticket->title = $request->title;
        $ticket->login = $request->user()->userid;
        $ticket->email = $request->user()->email;
        $ticket->body = $request->body;
        $ticket->category = $request->category;
        $ticket->save();

        return back()->with('custom_alert_success', 'Ticket enviado com sucesso.');
    }
}
