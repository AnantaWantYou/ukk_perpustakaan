<?php

namespace App\Livewire\Petugas;

use App\Models\Buku;
use App\Models\Kategori as ModelsKategori;
use App\Models\Rak;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Kategori extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Create, $nama, $Edit, $Delete, $kategori_id, $Search;

    protected $messages = [

        'nama.required' => 'Nama harus diisi bang.',

    ];

    protected $rules = [

        'nama' => 'required|min:5',

    ];

    public function create()
    {
        $this->Format();

        $this->Create = true;

    }

    public function store()
    {
        $this->validate();

        ModelsKategori::create([
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama)
        ]);
        session()->flash('sukses', 'Data berhasil ditambahkan.');

        $this->Format();
    }

    public function edit(ModelsKategori $kategori)
    {
        $this->Format();

        $this->Edit = true;
        $this->nama = $kategori->nama;
        $this->kategori_id = $kategori->id;

    }

    public function delete($id)
    {
        $this->Format();
        
        $this->Delete = true;
        $this->kategori_id = $id;
    }

    public function destroy(ModelsKategori $kategori)
    {
        $rak = Rak::where('kategori_id', $kategori->id)->get();
        foreach ($rak as $key => $value) {
            $value->update([
                'kategori_id' => 1
            ]);
        }

        $buku = Buku::where('kategori_id', $kategori->id)->get();
        foreach ($buku as $key => $value) {
            $value->update([
                'kategori_id' => 1
            ]);
        }

        $kategori->delete();

        session()->flash('sukses', 'Data berhasil di hapus.');

        $this->Format();
    }

    public function update(ModelsKategori $kategori)
    {
        $this->validate();

        $kategori->update([
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama)
        ]);

        session()->flash('sukses', 'Data berhasil di update.');

        $this->Format();
    }

    function updatingSearch()
    {
        $this->resetPage();    
    }

    public function render()
    {
        if ($this->Search) {
            $kategori = ModelsKategori::latest()->where('nama', 'like', '%' . $this->Search . '%')->paginate(5);
        } else {
            $kategori = ModelsKategori::latest()->paginate(5);
        }
        

        return view('livewire.petugas.kategori',[
            'kategori' => $kategori
        ]);
    }

    public function Format()
    {
        unset ($this->kategori_id);
        unset ($this->nama);
        unset ($this->Create);
        unset ($this->Edit);
        unset ($this->Delete);
    }

}
