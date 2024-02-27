@extends('admin-lte/app')

@section('active-dashboard', 'active')
@section('title', 'Dashboard Perpustakaan')

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $count_buku }}</h3>

        <p>Buku</p>
      </div>
      <div class="icon">
        <i class="fas fa-book"></i>
      </div>
      <a href="/buku" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $count_user }}</h3>

        <p>Peminjam</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="/user" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $count_sedang_dipinjam }}</h3>

        <p>Sedang Dipinjam</p>
      </div>
      <div class="icon">
        <i class="fas fa-clock"></i>
      </div>
      <a href="/transaksi" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $count_selesai_dipinjam }}</h3>

        <p>Selesai Dipinjam</p>
      </div>
      <div class="icon">
        <i class="fas fa-check-circle"></i>
      </div>
      <a href="/transaksi" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>Buku terbaru</h5>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>User terbaru</h5>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>Sedang Dipinjam</h5>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Kode Pinjam</th>
                        <th>Tanggal Pinjam</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($sedang_dipinjam as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_pinjam }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                        </tr>
                        @endforeach
                    <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5>Selesai Dipinjam</h5>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Kode Pinjam</th>
                        <th>Tanggal Pengembalian</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($selesai_dipinjam as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_pinjam }}</td>
                            <td>{{ $item->tanggal_pengembalian }}</td>
                        </tr>
                        @endforeach
                    <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
