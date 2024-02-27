@if ($Create)
        <div class="modal fade show" id="modal default" style="display: block; padding-right: 17px;">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Ulasan</h4>
                <span wire:click="Format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input wire:model="nama" type="text" class="form-control" id="nama" min="1">
                    @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="ulasan_buku">Ulasan_buku</label>
                    <input wire:model="ulasan_buku" type="text" class="form-control" id="ulasan_buku" >
                    @error('ulasan_buku') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="buku_id">Buku ID</label>
                    <input wire:model="buku_id" type="text" class="form-control" id="buku_id" >
                    @error('buku_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="modal-footer justify-content-between">
            <span wire:click="Format" type="button" class="btn btn-default" data-dismiss="modal">Batal</span>
            <span wire:click="store" type="button" class="btn btn-success">Simpan</span>
            </div>
        </div>
        </div>
    </div>
@endif
