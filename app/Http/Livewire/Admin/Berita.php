<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Berita as BeritaModel;

class Berita extends Component
{
    public $judul, $konten, $selected_id, $message, $user_id;
    public $is_create = false;
    public $is_update = false;

    protected $rules = [
        'judul' => 'required',
        'konten' => 'required',
    ];


    public function render()
    {
        return view('livewire.admin.berita.main', ["berita" => BeritaModel::orderByDesc('id')->get()]);
    }

    public function create()
    {
        $this->is_create = true;
        $this->dispatchBrowserEvent('create');
    }

    public function save()
    {
        $this->validate($this->rules);
        $berita = BeritaModel::create([
            'judul' => $this->judul,
            'konten' => $this->konten,
            'user_id' => auth()->user()->id,
        ]);

        $this->is_create = false;
        $this->is_update = false;
        $this->message = "Berhasil membuat Berita. Lihat berita <a href='".route('detail-berita', ['berita'=>$berita->id])."' target='_blank'>di sini</a>";
    }

    public function deleteId($id)
    {
        $berita = BeritaModel::findOrFail($id);
        $this->judul = $berita->judul;
        $this->selected_id = $id;
    }

    public function delete()
    {
        // dd($this->selected_id);
        $berita = BeritaModel::findOrFail($this->selected_id);
        $berita->delete();
        $this->selected_id = null;
        $this->judul = null;
        $this->message = "Berhasil menghapus Berita.";
    }
}
