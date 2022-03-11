<?php

namespace App\Http\Controllers;

use App\Models\WarisanBudaya;
use App\Models\User;
use App\Models\Berita;
use App\Models\Event;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view("index", [
            'warisan_budaya' => WarisanBudaya::orderByDesc("id")->get(),
            'berita' => Berita::limit(3)->orderByDesc("id")->get(),
            'jumlah_warisan_budaya' => WarisanBudaya::whereIsApproved(1)->count(),
            'jumlah_pengusulan' => WarisanBudaya::whereIsApproved(0)->count(),
            'jumlah_user' => User::count()
        ]);
    }

    public function pencatatan()
    {
        return view("pencatatan", ['pencatatan' => WarisanBudaya::all()]);
    }

    public function wbtb()
    {
        return view("wbtb", ['warisan_budaya' => WarisanBudaya::whereIsApproved(1)->orderByDesc("id")->get()]);
    }

    public function detail(WarisanBudaya $wbtb)
    {
        // dd($warisan_budaya->judul);
        return view("detail", ["warisan_budaya" => $wbtb]);
    }
    public function preview($id)
    {
        $warisan_budaya = WarisanBudaya::whereIsApproved(0)->whereId($id)->firstOrFail();
        
        if(!auth()->user()){
            return abort(404);
        }elseif(auth()->user()->is_admin == 1 || auth()->user()->id == $warisan_budaya->user_id){
            return view("preview", ["warisan_budaya" => $warisan_budaya]);
        }

        return abort(404);
        
    }

    public function berita()
    {
        return view("berita", ["berita" => Berita::orderByDesc('created_at')->get()]);
        
    }

    public function detailBerita(Berita $berita)
    {
        return view("detail-berita", ["berita" => $berita]);
    }

    public function event()
    {
            // Request::api();
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
    
            $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
            // dd(response()->json($data));
            // dd($data);
            $data = collect($data)->each(function($item, $key){
                return $item["url"] = route("detail-event", ["event" => $item->id]);
            });
            // dd(response()->json($data));
            return response()->json($data);
    }

    public function detailEvent(Event $event)
    {
        return view("detail-event", ['event' => $event]);
    }

    public function ajukan()
    {
        return view("ajukan");
    }
}
