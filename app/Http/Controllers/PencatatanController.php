<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WarisanBudaya;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class PencatatanController extends Controller
{
    public function simpan(Request $request)
    {
        $warisan_budaya             = new WarisanBudaya();
        $warisan_budaya->judul      = array($request->nama, $request->nama_lain);
        $warisan_budaya->domain     = array($request->domain, $request->prioritas);
        $warisan_budaya->kondisi    = $request->kondisi;
        $warisan_budaya->lokasi     = array($request->lokasi, $request->detail_alamat);
        $warisan_budaya->deskripsi  = array($request->definisi, $request->pelestarian);
        $warisan_budaya->pelaku     = $this->managePelaku($request->nama_komunitas, $request->alamat_komunitas, $request->kode_pos_komunitas, $request->no_telp_komunitas, $request->email_komunitas);
        $warisan_budaya->maestro    = array($request->nama_maestro, $request->alamat_maestro, $request->kode_pos_maestro, $request->no_telp_maestro, $request->email_maestro);
        $warisan_budaya->foto       = $this->uploadImage($request->label_image, $request->file('image')); //proses upload foo
        // $warisan_budaya->foto       = array($request->label_image, "logo.png")); //dummy foo
        $warisan_budaya->video      = $this->uploadVideo($request->label_video, $request->file('upload_video') ?? $request->embed_video);
        $warisan_budaya->file       = array("akademis" => $request->file('kajian_akademis_file')->store('akademis'), "surat_persetujuan" => $request->file('surat_persetujuan')->store('surat'));
        $warisan_budaya->user_id    = (Auth::check())?auth()->user()->id:100; // publik user_id
        $warisan_budaya->save();

        return redirect("ajukan")->with("message", "Berhasil mengajukan pencatatan");
    }

    public function uploadImage($label, $image)
    {
        $keys = ['image', 'label'];
        $path = collect($image)->map(function($item, $key){
            return $item->store('media');
        });

        $data = $path->zip(collect($label));

        return $data->transform(function($item, $key) use($keys){
            return collect($keys)->combine($item);
        });
    }

    public function managePelaku($komunitas, $alamat, $kode_pos, $telp, $email)
    {
        // ($request->nama_komunitas, $request->alamat_komunitas, $request->kode_pos_komunitas, $request->no_telp_komunitas, $request->email_komunitas)
        $keys = ['nama_komunitas', 'alamat', 'kode_pos', 'telp', 'email'];
        $data = collect($komunitas)->zip(collect($alamat))->zip(collect($kode_pos))->zip(collect($telp))->zip($email);

        return $data->transform(function($item, $key) use($keys){
            return collect($keys)->combine($item->flatten());
        })->all();
    }

    public function uploadVideo($label, $video)
    {
        if (is_string($video)) {
            return array("sumber" => "embed", "video" => $video, "label" => $label);
        }

        return array("sumber"=>"file", "video" =>$video->store("video"), "label" => $label );
    }
}
