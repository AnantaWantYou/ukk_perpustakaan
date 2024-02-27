@if ($Delete)
<div class="modal fade show" id="modal-default" style="display: block; padding-right: 17px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Rak</h4>
        <span wire:click="Format" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin menghapus Rak ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <span wire:click="Format" type="button" class="btn btn-default" data-dismiss="modal">Batal</span>
        <span wire:click="destroy({{$rak_id}})" type="button" class="btn btn-danger">Hapus</span>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endif