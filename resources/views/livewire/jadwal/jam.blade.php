<div>
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                        <input type="radio" name="status" value="Buka" wire:model="status" class="selectgroup-input"
                            checked="">
                        <span class="selectgroup-button fw-bold">Buka</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="status" value="Tutup" wire:model="status" class="selectgroup-input">
                        <span class="selectgroup-button fw-bold">Tutup</span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" min="{{date('Y-m-d', strtotime('+1 day'))}}" wire:model="tanggal" class="form-control @error('tanggal')
                        is-invalid
                    @enderror">
                </div>
                @if ($status =="Buka")
                <div class="form-group">
                    <label for="">Jam Buka</label>
                    <input type="time" class="form-control @error('jamBuka') is-invalid   @enderror" wire:model="jamBuka" step="3600">
                </div>
                <div class="form-group">
                    <label for="">Jam Tutup</label>
                    <input type="time" class="form-control" step="3600" wire:model="jamTutup">
                </div>
                @else
                @endif
                <button type="submit" class="btn btn-primary"> Tambah </button>
            </div>
    </form>
</div>
