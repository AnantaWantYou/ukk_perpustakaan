<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Transaksi</title>

    <style>
        thead
        {
            background-color: rgb(3, 255, 99);
        }
        table, th, td {
            border: 0.5px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="card">
    <div class="card-header">

    <div class="card-body table-responsive p-0">
        <table class="table table-hover ">
          <thead>
            <th >No</th>
            <th>Kode Pinjam</th>
            <th>Buku</th>
            <th>Tempat Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
          </thead>
        <tbody>

            @foreach ($peminjaman as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->kode_pinjam }}</td>
              <td>
                  <ul>
                      @foreach ($item->detail_peminjaman as $detail_peminjaman)
                          <li>{{ $detail_peminjaman->buku->judul }}</li>
                      @endforeach
                  </ul>
              </td>
              <td>
                  <ul>
                      @foreach ($item->detail_peminjaman as $detail_peminjaman)
                          <li>{{ $detail_peminjaman->buku->rak->lokasi }}</li>
                      @endforeach
                  </ul>
              </td>
              <td>{{ $item->tanggal_pinjam }}</td>
              <td>{{ $item->tanggal_kembali }}</td>
              <td>
                    @if ($item->status == 1)
                    <span class="badge bg-indigo">Belum Dipinjam</span>
                @elseif ($item->status == 2)
                    <span class="badge bg-olive">Sedang Dipinjam</span>
                @else
                    <span class="badge bg-fuchsia">Selesai Dipinjam</span>
                @endif
                </td>
            </tr>
        @endforeach

        </tbody>
        </table>
    </div>
        </div>
            </div>
</body>
</html>
