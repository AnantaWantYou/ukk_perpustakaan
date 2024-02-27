@if ($Edit)
        <div class="modal fade show" id="modal default" style="display: block; padding-right: 17px;">
            <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Edit Buku</h4>
                <span wire:click="Format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input wire:model="judul" type="text" class="form-control" id="judul">
                    @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="penulis">Penulis Buku</label>
                            <input wire:model="penulis" type="text" class="form-control" id="penulis">
                            @error('penulis') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stok">Stok Buku</label>
                            <input wire:model="stok" type="number" class="form-control" id="stok" min="1">
                            @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sampul">Sampul Buku</label>
                    <input wire:model="sampul" type="file" class="form-control" id="sampul" min="1">
                    @error('sampul') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Kategori">Kategori Buku</label>
                            <select wire:model="kategori_id" wire:click="pilihKategori" class="form-control" id="kategori">
                                <option selected value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    @if ($item->id != 1)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="penerbit">Penerbit Buku</label>
                            <select wire:model="penerbit_id" class="form-control" id="penerbit">
                                <option selected value="">Pilih Penerbit</option>
                                @foreach ($penerbit as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @error('penerbit_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rak">Rak Buku</label>
                            <select wire:model="rak_id" class="form-control" id="rak">
                                <option selected value="">Pilih Rak</option>
                                @foreach ($rak as $item)
                                    <option value="{{$item->id}}"> Rak : {{$item->rak}}, Baris : {{$item->baris}}</option>
                                @endforeach
                            </select>
                            @error('rak_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
            <span wire:click="Format" type="button" class="btn btn-default" data-dismiss="modal">Batal</span>
            <span wire:click="update({{$buku_id}})" type="button" class="btn btn-success">Update</span>
            </div>
        </div>
        </div>
    </div>    
@endif