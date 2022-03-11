<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\WarisanBudaya;

class Pencatatan extends Component
{
    public $judul;
    public $lokasi;
    public $pelaku;
    public $domain;
    public $kondisi;
    public $deskripsi;
    public $is_create = false;
    public $is_update = false;
    public $selected_id;
    public $message;
    

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

        $pencatatan = WarisanBudaya::create([
            'judul' => $this->judul,
            'lokasi' => $this->lokasi,
            'pelaku' => $this->pelaku,
            'domain' => $this->domain,
            'kondisi' => $this->kondisi,
            'deskripsi' => $this->deskripsi,
            'foto' => json_encode($this->uploadFoto()),
            'user_id' => auth()->user()->id,
            'is_approved' => 1
        ]);

        session()->flash('message', 'Berhasil membuat pencatatan');
        return redirect()->to('/admin/pencatatan');
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
        // dd(WarisanBudaya::whereIsApproved(0)->orderByDesc("id")->get()[0]['domain']);
        return view('livewire.admin.pencatatan.main', ['warisan_budaya' => WarisanBudaya::whereIsApproved(0)->orderByDesc("id")->get()]);
    }

    public function create()
    {
        $this->is_create = true;
        $this->is_update = false;
        $this->judul =null;
        $this->lokasi = null;
        $this->pelaku = null;
        $this->domain = null;
        $this->kondisi = null;
        $this->deskripsi = null;
        $this->selected_id = null;
        $this->dispatchBrowserEvent('create');
    }

    public function deleteId($id)
    {
        $pencatatan = WarisanBudaya::findOrFail($id);
        $this->judul = $pencatatan->judul;
        $this->selected_id = $id;
    }

    public function delete()
    {
        // dd($this->selected_id);
        $pencatatan = WarisanBudaya::findOrFail($this->selected_id);
        $pencatatan->delete();
        $this->selected_id = null;
        $this->judul = null;
        $this->message = "Berhasil menghapus Pencatatan Warisan Budaya.";
    }

    public function edit($selected_id)
    {
        $this->is_create = false;
        $warisan_budaya = WarisanBudaya::findOrFail($selected_id);
        $this->judul = $warisan_budaya->judul;
        $this->lokasi = $warisan_budaya->lokasi;
        $this->pelaku = $warisan_budaya->pelaku;
        $this->domain = $warisan_budaya->domain;
        $this->kondisi = $warisan_budaya->kondisi;
        $this->is_update = true;
        $this->selected_id = $selected_id;
        $this->deskripsi = $warisan_budaya->deskripsi;
        // dd($this->deskripsi);
       
        // $warisan_budaya->deskripsi dibawa ke event
        $this->dispatchBrowserEvent('edit',['newName' => $warisan_budaya->deskripsi]);
    }

    public function update()
    {
        $warisan_budaya = WarisanBudaya::findOrFail($this->selected_id);

        $warisan_budaya->judul = $this->judul;
        $warisan_budaya->lokasi = $this->lokasi;
        $warisan_budaya->pelaku = $this->pelaku;
        $warisan_budaya->domain = $this->domain;
        $warisan_budaya->kondisi = $this->kondisi;
        $warisan_budaya->deskripsi = $this->deskripsi;
        $warisan_budaya->foto = json_encode($this->uploadFoto());
        $warisan_budaya->save();

        $this->is_update = false;

        $this->message = "Berhasil memperbarui Pencatatan Warisan Budaya.";
    }
}
