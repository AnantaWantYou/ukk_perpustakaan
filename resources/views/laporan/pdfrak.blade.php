<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Rak</title>

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
            <th>Rak</th>
            <th>Baris</th>
            <th>Kategori</th>
          </thead>
        <tbody>

            @foreach ($raks as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->rak }}</td>
              <td>{{ $item->baris }}</td>
              <td>{{ $item->kategori->nama }}</td>

        @endforeach

        </tbody>
        </table>
    </div>
        </div>
            </div>
</body>
</html>
