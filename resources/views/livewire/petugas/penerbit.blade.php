<div class="row">
    <div class="col-12">

      @include('admin-lte/flash')

      @include('petugas/penerbit/create')
      @include('petugas/penerbit/edit')
      @include('petugas/penerbit/delete')

      <div class="card">
        <div class="card-header">
            @role('admin')
          <span wire:click="create" class="btn btn-sm btn-primary">Tambah</span>
          @endrole

          <a href="{{ route('pdf.penerbit') }}">
            <span class="btn btn-sm btn-danger ml-2">Cetak PDF</span>
          </a>
            
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input wire:model.live.throttle.500ms="Search" type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          @if ($penerbit->isNotEmpty())
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th width="10%">No</th>
                  <th>Penerbit</th>
                  @role('admin')
                    <th width="15%">Aksi</th>
                  @endrole
                </tr>
              </thead>
              <tbody>
  
                  @foreach ($penerbit as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama }}</td>
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
        {{ $penerbit->links() }}
      </div>

      @if ($penerbit->isEmpty())
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
