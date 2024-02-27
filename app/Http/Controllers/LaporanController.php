<?php

namespace App\Http\Controllers;

use App\Livewire\Petugas\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Rak;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    function generatebuku()
    {
        $buku = Buku::all();

        $pdf = Pdf::loadView('laporan.pdfbuku', compact('buku'));
        return $pdf->download('Laporan Buku Perpustakaan.pdf');
    }

    function generatekategori()
    {
        $kategori = Kategori::all();

        $pdf = Pdf::loadView('laporan.pdfkategori', compact('kategori'));
        return $pdf->download('Laporan Kategori Perpustakaan.pdf');
    }

    function generatepenerbit()
    {
        $penerbit = Penerbit::all();

        $pdf = Pdf::loadView('laporan.pdfpenerbit', compact('penerbit'));
        return $pdf->download('Laporan penerbit Perpustakaan.pdf');
    }

    function generaterak()
    {
        $raks = Rak::all();

        $pdf = Pdf::loadView('laporan.pdfrak', compact('raks'));
        return $pdf->download('Laporan Rak Perpustakaan.pdf');
    }

    function generatetransaksi()
    {
        $peminjaman = Peminjaman::all();
        $user = User::all();
        $detailpeminjaman = DetailPeminjaman::all();

        $pdf = Pdf::loadView('laporan.transaksipdf', compact('peminjaman','user','detailpeminjaman'));
        return $pdf->download('Laporan Transaksi Perpustakaan.pdf');
    }

}
