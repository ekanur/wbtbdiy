<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\WarisanBudaya;

class Dashboard extends Component
{
    public $judul;
    public $lokasi;
    public $pelaku;
    public $domain;
    public $kondisi;
    public $deskripsi;


    public function render()
    {
        return view('livewire.admin.dashboard', ["jumlah_warisan_budaya" => WarisanBudaya::whereIsApproved(1)->count()]);
    }

    public function approve($id)
    {
        $warisan_budaya = WarisanBudaya::findOrFail($id);
        $warisan_budaya->is_approved = 1;
        $warisan_budaya->save();
        $url = route("detail", ["wbtb" => $id]);

        session()->flash('message', "Berhasil menyetujui Pengusulan. <a href='".$url."' target='_blank'>Lihat di Halaman Depan</a>");
        return redirect()->to('/admin');
    }

    protected $rules = [
        'domain' => 'required',
        'kondisi' => 'required',
        'judul' => 'required',
        'lokasi' => 'required',
        'deskripsi' => 'required',
    ];

    public function mount() { 
        
    }

    public function save() {
        $this->validate();
        // $this->uploadFoto();

        $pengusulan = WarisanBudaya::create([
            'judul' => $this->judul,
            'lokasi' => $this->lokasi,
            'pelaku' => $this->pelaku,
            'domain' => $this->domain,
            'kondisi' => $this->kondisi,
            'deskripsi' => $this->deskripsi,
            'foto' => json_encode($this->uploadFoto()),
            'is_approved' => 1,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'Pencatatan WBTb berhasil disimpan. <a href="'.route('detail', ['wbtb' => $pengusulan->id]).'" target="_blank">Lihat Pencatatan WBTb</a>');
        return redirect()->to('/admin');
    }

    public function uploadFoto(){
        $dom = new \DomDocument();
        $dom->loadHTML($this->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');
        $list_images = array();
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            // dd(parse_url($data));
            if(sizeof(parse_url($data))>2){
                $data = 'data:image/jpg;base64,'.base64_encode(file_get_contents($data));
            }
            // dd($data);
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $mime_type = finfo_buffer(finfo_open(), $data, FILEINFO_MIME_TYPE);
            $image_name = time().$k.'.'.$this->fileExtension($mime_type);
            $image_location= "/upload/" . $image_name;
            // dd($data);
            file_put_contents(public_path() . $image_location, $data);
            
            array_push($list_images, $image_name);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_location);
        }

        $this->deskripsi = $dom->saveHTML();

        return $list_images;
    }

    public function fileExtension($mime_type)
    {
        $ext = explode("/", $mime_type);
        return $ext[1];
    }



}
