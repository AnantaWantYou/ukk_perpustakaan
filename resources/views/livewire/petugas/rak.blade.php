<div class="row">
    <div class="col-12">

      @include('admin-lte/flash')

      @include('petugas/rak/create')
      @include('petugas/rak/edit')
      @include('petugas/rak/delete')

      <div class="card">
        <div class="card-header">
            @role('admin')
          <span wire:click="create" class="btn btn-sm btn-primary">Tambah</span>
          @endrole

          <a href="{{ route('pdf.rak') }}">
            <span class="btn btn-sm btn-danger ml-2">Cetak PDF</</span>
          </a>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <select wire:model.live.throttle.500ms="Search" class="form-control float-right" id="exampleFormControlSelect1">
                    @foreach ($count as $item)
                        <option value="{{ $item->rak }}">{{ $item->rak }}</option>
                    @endforeach
                  </select>

              <div class="input-group-append">
                <button wire:click="formatSearch" type="submit" class="btn btn-default">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- /.card-header -->
        @if ($raks->isNotEmpty())
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th width="10%">No</th>
                <th>Rak</th>
                <th>Baris</th>
                <th>Kategori</th>
                @role('admin')
                    <th width="15%">Aksi</th>
                @endrole
              </tr>
            </thead>
            <tbody>

                @foreach ($raks as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->rak }}</td>
                <td>{{ $item->baris }}</td>
                <td>{{ $item->kategori->nama }}</td>
                @role('admin')
                <td>
                        <div class="btn-group">
                            <span wire:click="edit({{ $item->id }})" class="btn btn-sm btn-primary mr-2">Edit</span>
                            <span wire:click="delete({{$item->id}})" class="btn btn-sm btn-danger">Hapus</span>
                        </div>
                    </td>
                @endrole
                </tr>
                @endforeach

            </tbody>

          </table>

        </div>
        <!-- /.card-body -->
        @endif

      </div>
      <!-- /.card -->

      <div class="row justify-content-center">
        {{ $raks->links() }}
      </div>

      @if ($raks->isEmpty())
      <div class="card">
        <div class="card-body">
          <div class="alert alert-warning">
            Anda tidak memiliki data
          </div>
        </div>
      </div>
  @endif
    </div>
  </div>
