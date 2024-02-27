<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Penerbit</title>

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
            <th>Penerbit</th>
          </thead>
        <tbody>

            @foreach ($penerbit as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->nama }}</td>

        @endforeach

        </tbody>
        </table>
    </div>
        </div>
            </div>
</body>
</html>
