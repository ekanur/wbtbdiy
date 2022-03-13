<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WarisanBudaya;
use Illuminate\Support\Facades\Auth;


class PencatatanController extends Controller
{
    public function simpan(Request $request)
    {
        $warisan_budaya = new WarisanBudaya();
        $warisan_budaya->judul      = array($request->nama, $request->nama_lain);
        $warisan_budaya->domain     = array($request->domain, $request->prioritas);
        $warisan_budaya->kondisi    = $request->kondisi;
        $warisan_budaya->lokasi     = array($request->lokasi, $request->detail_alamat);
        $warisan_budaya->deskripsi  = array($request->definisi, $request->pelestarian);
        $warisan_budaya->pelaku     = array($request->nama_komunitas, $request->alamat_komunitas, $request->kode_pos_komunitas, $request->no_telp_komunitas, $request->email_komunitas);
        $warisan_budaya->maestro    = array($request->nama_maestro, $request->alamat_maestro, $request->kode_pos_maestro, $request->no_telp_maestro, $request->email_maestro);
        $warisan_budaya->foto       = array($request->label_image, $this->uploadMedia($request->file('image'))); //proses upload foo
        // $warisan_budaya->foto       = array($request->label_image, "logo.png")); //dummy foo
        $warisan_budaya->video      = array($request->label_video, $request->embed_video);
        $warisan_budaya->user_id    = (Auth::check())?auth()->user()->id:100; // publik user_id
        $warisan_budaya->save();

        return redirect("ajukan")->with("message", "Berhasil mengajukan pencatatan");
    }

    public function uploadMedia($media)
    {
        $path = $media->store('media');
        
        return $path;
    }
}
