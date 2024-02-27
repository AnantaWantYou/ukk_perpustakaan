<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Keranjang</h1>
        </div>
    </div>

    @include('admin-lte/flash')

    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input wire:model="tanggal_pinjam" type="date" class="form-control" id="tanggal_pinjam">
            @error('tanggal_pinjam') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="row" >
        <div class="col-md-8 mb-3" >
            @if ($keranjang->status == 1)
                <span class="btn btn-sm btn-warning">Menunggu Konfirmasi</span>
            @elseif($keranjang->status == 2)
                <strong>Tanggal Pinjam : {{ $keranjang->tanggal_pinjam }}</strong>
            @else
               <button wire:click="pinjam({{ $keranjang->id }})" class="btn btn-sm btn-success">Ajukan Peminjaman</button>
            @endif
        </div>
        <div class="col-md-4 mb-3">
            <strong class="float-right" >Kode Pinjam : {{ $keranjang->kode_pinjam }}</strong>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover text-nowrap">
                <thead>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis Buku</th>
                    <th>Rak Buku</th>
                    <th>Baris Buku</th>
                    <th>Status</th>
                    @if (!$keranjang->tanggal_pinjam)
                        <th></th>
                    @endif
                </thead>

                <tbody>
                   @foreach ($keranjang->detail_peminjaman as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->buku->judul}}</td>
                            <td>{{$item->buku->penulis}}</td>
                            <td>{{$item->buku->rak->rak}}</td>
                            <td>{{$item->buku->rak->baris}}</td>
                            <td>
                                @if ($keranjang->status == 1)
                                    <span class="btn btn-sm btn-warning">Menunggu Konfirmasi</span>
                                @elseif($keranjang->status == 2)
                                    <span class="btn btn-sm btn-success">Dipinjam</span>
                                @else
                                    <span class="btn btn-sm btn-success">Belum Dipinjam</span>
                                @endif
                            </td>
                            <td>
                                @if (!$keranjang->tanggal_pinjam)
                                    <button wire:click="hapus({{$keranjang->id}}, {{$item->id}})" class="btn btn-sm btn-danger">Hapus</button>
                                @endif
                            </td>
                        </tr>
                   @endforeach
                </tbody>
            </table>
            @if (!$keranjang->tanggal_pinjam)
                <button wire:click="hapusMasal" class="btn btn-sm btn-danger">Hapus Semuanya</button>
            @endif

        </div>
    </div>
</div>
