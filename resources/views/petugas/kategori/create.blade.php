@if ($Create)
<div class="card">
  <div class="card-body">
      <div class="form-group">
        <label for="nama">Tambah Kategori</label>
        <input wire:model="nama" type="email" class="form-control" id="nama" name="nama">
        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <span wire:click="store" class="btn btn-sm btn-success">Simpan</span>
  </div>
</div>
@endif