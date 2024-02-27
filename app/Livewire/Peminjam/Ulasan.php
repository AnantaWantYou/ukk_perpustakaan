<?php

namespace App\Livewire\Peminjam;

use Livewire\Component;

class Ulasan extends Component
{
    public $nama;
    public $ulasan;
    public $buku_idd, $Create;

    public function mount($buku_idd)
    {
        $this->buku_idd = $buku_idd;
    }

    public function submitUlasan()
    {
        $this->validate([
            'nama' => 'required',
            'ulasan' => 'required',
        ]);

        Ulasan::create([
            'nama' => $this->nama,
            'ulasan' => $this->ulasan,
            'buku_id' => $this->buku_idd,
        ]);

        $this->resetForm();

        // Optional: Show a success message or perform any additional actions
        session()->flash('success', 'Ulasan berhasil dikirim.');

        // Optional: Refresh the page or redirect to another route
        // return redirect()->to('/buku');
    }


    private function resetForm()
    {
        $this->nama = '';
        $this->ulasan = '';
    }

    public function render()
    {
        return view('livewire.peminjam.ulasan');
    }
}