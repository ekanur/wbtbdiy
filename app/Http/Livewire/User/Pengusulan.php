<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\WarisanBudaya;
use Illuminate\Support\Facades\Storage;

class Pengusulan extends Component
{
    public $judul;
    public $lokasi;
    public $pelaku;
    public $domain;
    public $kondisi;
    public $deskripsi;

    // $fieldsAvailable property for available input added
    // by default 0  
    public $fieldsAvailable = [0];

    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
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
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'Berhasil membuat pengusulan');
        return redirect()->to('/user/pengusulan');
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

    public function render()
    {
        return view('livewire.user.pengusulan', ['pengusulan' => WarisanBudaya::whereUserId(auth()->user()->id)->get(),
            'fieldsAvailable' => $this->fieldsAvailable 
        ]);
    }

    // function for add fields
    public function addFields(){
        if (count($this->fieldsAvailable) != 0){
            $i = end($this->fieldsAvailable) + 1;
            array_push($this->fieldsAvailable ,$i);
        }
    }
}
