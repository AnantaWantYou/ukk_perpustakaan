<?php

namespace App\Livewire\Peminjam;

use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Buku as ModelsBuku;
use App\Models\Kategori;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use Livewire\Component;

class Buku extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['pilihKategori', 'semuaKategori'];

    public $nama;
    public $ulasan;
    public $bukuId;

    public $kategori_id, $pilih_kategori, $buku_id, $detail_buku, $Search, $Create;

    public function create()
    {
        $this->Create = true;
        $this->ulasan = Ulasan::all();
    }

    public function store()
    {
        $this->validate([
            'peminjam_id' => 'required',
            'buku_id' => 'required', // tambahkan validasi untuk memastikan bukuId tidak boleh null
            'ulasan' => 'required'
        ]);

        $buku = ModelsBuku::find($this->buku_id);

        if ($buku) {
            $ulasan = Ulasan::create([
                'peminjam_id' => $this->nama,
                'ulasan' => $this->ulasan,
                'buku_id' => $buku->id,
            ]);

            $this->Format1();

            // Optional: Show a success message or perform any additional actions
            session()->flash('success', 'Ulasan berhasil dikirim.');
        } else {
            // Handle jika buku tidak ditemukan
            session()->flash('error', 'Buku tidak ditemukan.');
        }
    }

    public function Format1()
    {
        unset($this->Create);
        $this->nama = '';
        $this->ulasan = '';
        $this->buku_id = null;
    }

    public function pilihKategori($id)
    {
        $this->Format();
        $this->kategori_id = $id;
        $this->pilih_kategori = true;
        $this->updatingSearch();
    }

    public function semuaKategori()
    {
        $this->Format();
        $this->pilih_kategori = false;
        $this->updatingSearch();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function detailBuku($id)
    {
        $this->Format();
        $this->detail_buku = true;
        $this->buku_id = $id;
    }

    public function keranjang(ModelsBuku $buku)
    {
        //user harus login
        if (auth()->user()) {

            //role peminjam
            if (auth()->user()->hasRole('peminjam')) {

                $peminjaman_lama = DB::table('peminjaman')
                    ->join('detail_peminjaman', 'peminjaman.id', '=', 'detail_peminjaman.peminjaman_id')
                    ->where('peminjam_id', auth()->user()->id)
                    ->where('status', '!=', 3)
                    ->get();

                //jumlah maksimmal dipinjam 2
                if ($peminjaman_lama->count() == 2) {
                    session()->flash('gagal', 'Buku yang dipinjam maksimal 2');
            } else {

                //peminjaman sudah ada isinya
                if ($peminjaman_lama->count() == 0) {
                    $peminjaman_baru = Peminjaman::create([
                        'kode_pinjam' => random_int(100000000, 999999999),
                        'peminjam_id' => auth()->user()->id,
                        'status' => 0
                    ]);

                    DetailPeminjaman::create([
                        'peminjaman_id' => $peminjaman_baru->id,
                        'buku_id' => $buku->id
                    ]);

                    $this->dispatch('tambahKeranjang');
                    session()->flash('sukses', 'Buku berhasil ditambahkan kedalam keranjang');

                } else {

                    //buku tidak boleh sama
                    if ($peminjaman_lama[0]->buku_id == $buku->id) {
                        session()->flash('gagal', 'Buku tidak boleh sama');
                    } else {

                        DetailPeminjaman::create([
                            'peminjaman_id' => $peminjaman_lama[0]->peminjaman_id,
                            'buku_id' => $buku->id
                        ]);

                        $this->dispatch('tambahKeranjang');
                        session()->flash('sukses', 'Buku berhasil ditambahkan kedalam keranjang');

                    }

                }

            }

            } else {
                session()->flash('gagal', 'Role user anda bukan peminjam');
            }


        } else {
            session()->flash('gagal', 'Anda harus login terlebih dahulu.');
            redirect('/login');
        }

    }


    public function render()
    {
        if ($this->pilih_kategori) {
            if ($this->Search) {
                $buku = ModelsBuku::latest()->where('judul', 'LIKE', '%' . $this->Search . '%')->where('kategori_id', $this->kategori_id)->paginate(12);
            } else {
                $buku = ModelsBuku::latest()->where('kategori_id', $this->kategori_id)->paginate(12);
            }

            $title = Kategori::find($this->kategori_id)->nama;
        } elseif ($this->detail_buku) {
            $buku = ModelsBuku::find($this->buku_id);
            $title = 'Detail Buku';
        } else {
            if ($this->Search) {
                $buku = ModelsBuku::latest()->where('judul', 'like', '%' . $this->Search . '%')->paginate(12);
            } else {
                $buku = ModelsBuku::latest()->paginate(12);
            }
            $title = 'Semua Buku';
        }

        return view('livewire.peminjam.buku', compact('buku', 'title'));
    }

    public function Format()
    {
        $this->detail_buku = false;
        $this->pilih_kategori = false;
        unset($this->buku_id);
        unset($this->kategori_id);

    }

}
