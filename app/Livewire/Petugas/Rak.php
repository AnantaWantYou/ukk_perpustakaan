<?php

namespace App\Livewire\Petugas;

use App\Models\Buku;
use App\Models\Kategori;
use Livewire\WithPagination;
use App\Models\Rak as ModelsRak;
use Livewire\Component;

class Rak extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Create, $Edit, $Delete, $Search;
    public $rak, $baris, $Kategori, $kategori_id, $rak_id, $rak_lama, $rak_baru;

    protected $messages = [

        'rak.required' => 'Rak harus diisi bang.',
        'baris.required' => 'Baris harus diisi bang.',
        'kategori_id.required' => 'Kategori harus dipilih salah satu bang.',

    ];

    public function create()
    {
        $this->Create = true;
        $this->Kategori = Kategori::all();
    }

    public function store()
    {
        $rak_pilihan = ModelsRak::select('baris')->where('rak',$this->rak)->get()->implode('baris', ',');

        $this->validate([
            'rak' => 'required|numeric|min:1',
            'baris' => 'required|numeric|min:1|not_in:'. $rak_pilihan,
            'kategori_id' => 'required|numeric|min:1',
        ]);

        ModelsRak::create([
            'rak' => $this->rak,
            'baris' => $this->baris,
            'kategori_id' => $this->kategori_id,
            'slug' => $this->rak .'-' .$this->baris
        ]);

        session()->flash('sukses', 'Data berhasil ditambahkan.');

        $this->Format();
    }

    public function edit(ModelsRak $rak)
    {
        $this->Format();

        $this->Edit = true;
        $this->rak_id = $rak->id;
        $this->rak = $rak->rak;
        $this->baris = $rak->baris;
        $this->kategori_id = $rak->kategori_id;
        $this->Kategori = Kategori::all();
    }

    public function update(ModelsRak $rak)
    {
        $rak_lama = ModelsRak::find($this->rak_id);

        if ($rak_lama->rak == $this->rak) {
            $rak_baru = ModelsRak::select('baris')->where('rak',$this->rak)->where('baris', '!=', $rak_lama->baris)->get()->implode('baris', ',');
        } else {
            $rak_baru = ModelsRak::select('baris')->where('rak',$this->rak)->get()->implode('baris', ',');
        }


        $this->validate([
            'rak' => 'required|numeric|min:1',
            'baris' => 'required|numeric|min:1|not_in:'. $rak_baru,
            'kategori_id' => 'required|numeric|min:1',
        ]);

        $rak->update([
            'rak' => $this->rak,
            'baris' => $this->baris,
            'kategori_id' => $this->kategori_id,
            'slug' => $this->rak .'-' .$this->baris
        ]);
        session()->flash('sukses', 'Data berhasil diubah.');

        $this->Format();
    }

    public function delete(ModelsRak $rak)
    {
        $this->Delete = true;
        $this->rak_id = $rak->id;
    }

    public function destroy(ModelsRak $rak)
    {
        $buku = Buku::where('rak_id', $rak->id)->get();
        foreach ($buku as $key => $value) {
            $value->update([
                'rak_id' => 1
            ]);
        }
        $rak->delete();

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
            $raks = ModelsRak::latest()->where('rak', $this->Search)->paginate(5);
        } else {
            $raks = ModelsRak::latest()->paginate(5);
        }
            $count = ModelsRak::select('rak')->distinct()->get();

        return view('livewire.petugas.rak', compact('raks', 'count'));
    }

    public function Format()
    {
        unset($this->Create);
        unset($this->Delete);
        unset($this->Edit);
        unset($this->rak_id);
        unset($this->rak);
        unset($this->baris);
        unset($this->kategori_id);
        unset($this->Kategori);
    }

    function formatSearch()
    {
        $this->Search = false;
    }

}
