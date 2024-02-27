@if ($Create)
        <div class="modal fade show" id="modal default" style="display: block; padding-right: 17px;">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Ulasan</h4>
                <span wire:click="Format1" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="user_id">User</label>
                    <input wire:model="user_id" type="text" class="form-control" id="user_id" min="1">
                    @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="buku_id">Buku ID</label>
                    <input wire:model="buku_id" type="text" class="form-control" id="buku_id" >
                    @error('buku_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="ulasan">Ulasan_buku</label>
                    <input wire:model="ulasan" type="text" class="form-control" id="ulasan" >
                    @error('ulasan') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="modal-footer justify-content-between">
            <span wire:click="Format1" type="button" class="btn btn-default" data-dismiss="modal">Batal</span>
            <span wire:click="store" type="button" class="btn btn-success">Simpan</span>
            </div>
        </div>
        </div>
    </div>
@endif
