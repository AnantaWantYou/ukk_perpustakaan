<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Buku</title>

    <style>
        thead
        {
            background-color: yellow;
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
            <th>Judul</th>
            <th>Penulis</th>
            <th>Kategori</th>
            <th>Penerbit</th>
            <th>Stok</th>
          </thead>
        <tbody>

            @foreach ($buku as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->judul }}</td>
              <td>{{ $item->penulis }}</td>
              <td>{{ $item->kategori->nama }}</td>
              <td>{{ $item->penerbit->nama }}</td>
              <td>{{ $item->stok }}</td>
        @endforeach

        </tbody>
        </table>
    </div>
        </div>
            </div>
</body>
</html>
