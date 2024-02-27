<?php

namespace App\Livewire\Petugas;

use App\Models\Buku;
use App\Models\Penerbit as ModelsPenerbit;
use Livewire\WithPagination;
use Livewire\Component;
use illuminate\Support\Str;

class Penerbit extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Create, $Edit, $Delete, $Search;
    public $nama, $penerbit_id;

    protected $rules = [

        'nama' => 'required',

    ];

    public function create()
    {
        $this->Create = true;
    }

    public function store()
    {
        $this->validate();   

        ModelsPenerbit::create([
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama)
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan.');

        $this->Format();
    }

    public function edit(ModelsPenerbit $penerbit)
    {
        $this->Format();

        $this->Edit = true;
        $this->nama = $penerbit->nama;
        $this->penerbit_id = $penerbit->id;
    }

    public function update(ModelsPenerbit $penerbit)
    {
        $this->validate();

        $penerbit->update([
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama)
        ]);

        session()->flash('sukses', 'Data berhasil diubah.');

        $this->Format();
    }

    public function delete(ModelsPenerbit $penerbit)
    {
        $this->Delete = true;
        $this->penerbit_id = $penerbit->id;

    }

    public function destroy(ModelsPenerbit $penerbit)
    {
        $buku = Buku::where('penerbit_id', $penerbit->id)->get();
        foreach ($buku as $key => $value) {
            $value->update([
                'penerbit_id' => 1
            ]);
        }

        $penerbit->delete();

        session()->flash('sukses', 'Data berhasil dihapus.');

        $this->Format();
    }

    function updatingSearch()
    {
        $this->resetPage();    
    }

    public function render()
    {
        if ($this->Search) {
            $penerbit = ModelsPenerbit::latest()->where('nama', 'like', '%' . $this->Search . '%')->paginate(5);
        } else {
            $penerbit = ModelsPenerbit::latest()->paginate(5);
        }
        

        return view('livewire.petugas.penerbit', [
            'penerbit' => $penerbit
        ]);
    }

    public function Format()
    {
        unset($this->Create);
        unset($this->Delete);
        unset($this->Edit);
        unset($this->nama);
        unset($this->penerbit_id);
    }
}
