<div>
    <form  wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror " name="nama" value="{{$boking->nama}}" wire:model="nama">
                    @error('nama')
                    <small id="emailHelp" class="form-text text-muted text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">No Telp/WA</label>
                    <input type="text" class="form-control @error('noTelp') is-invalid @enderror" value="{{$boking->noTelp}}" wire:model="noTelp" maxlength="16" oninput="formatNomorHP(this)"
                        placeholder="08xx" >
                    @error('noTelp')
                    <small id="emailHelp" class="form-text text-muted text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Pilih Lapangan</label>
                    @error('tanggal')
                    <small id="" class="form-text text-muted text-danger">{{$message}}</small>
                    @enderror
                    <div class="row ">
                        @foreach ($lapangan as $item )
                        <div class="col-6 col-sm-3 text-center">
                            <label class="imagecheck mb-4">
                                <input name="idLapangan" type="radio" wire:model="idLapangan" value="{{$item->id}}" class="imagecheck-input ">
                                <figure class="imagecheck-figure">
                                    <img src="/image/lapangan/{{$item->gambar}}" alt="{{$item->namaLapangan}}"
                                        class="imagecheck-image col-sm-12" style="height: 120px">
                                    </figure>
                                    <label class="text-dark">{{$item->namaLapangan}}</label>
                                </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid  @enderror" name="tanggal" value="{{$boking->tanggal}}" wire:model="tanggal"
                        value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" >
                    @error('tanggal')
                    <small id="" class="form-text text-muted text-danger">{{$message}}</small>
                    @enderror
                    {{-- <input type="text" class="form-control" name="tanggal" value="{{$tanggal}}"> --}}
                </div>

                <div class="form-group">
                    <label class="form-label">Jam</label>
                    @error('jam')
                    <small id="" class="form-text text-muted text-danger">{{$message}}</small>
                    @enderror
                    <div class="row col-5">

                        @php
                        $jamArray = [];

                        for ($i = 9; $i < 23; $i++) {
                                $jam = str_pad($i, 2, '0', STR_PAD_LEFT); // Format dua digit
                                // $menit = str_pad($j, 2, '0', STR_PAD_LEFT); // Format dua digit
                                $waktu = $jam . ':00';

                                $jamArray[] = $waktu;
                        }
                        @endphp
                        @foreach($jamArray as $i) <div class="selectgroup selectgroup-pills ">
                            <label class="selectgroup-item  >">
                                <input type="radio" wire:model="jam" value="{{$i}}" class="selectgroup-input"
                                    wire:model="jam">
                                <span class="selectgroup-button fw-bold text-dark">{{$i}}</span>
                            </label>
                    </div>
                    @endforeach

                </div>
                {{-- {{$jamm->jam}} --}}
                <div class="form-group">
                    <label>Status</label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="status" value="Booking"  wire:model="status"
                                class="selectgroup-input" checked>
                            <span class="selectgroup-button fw-bold">Booking</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="status" value="Lunas" wire:model="status"
                                class="selectgroup-input">
                            <span class="selectgroup-button fw-bold">Lunas</span>
                        </label>
                    </div>
                </div>
                @if($status=="Booking")
                {{-- <div class="form-group">
                                <label for="">Bukti Pemesan</label>
                                <input type="file" class="form-control" name="buktiDp" >
                            </div> --}}

                <div class="form-group">
                    <label for="">Besar DP</label>
                    <input type="number" class="form-control @error('uangDp') is-invalid @enderror" wire:model="uangDp" name="uangDp" >
                </div>
                @error('uangDp')
                    <small id="" class="form-text text-muted text-danger">{{$message}}</small>
                @enderror
                @else

                @endif
            </div>

            <button type="submit" class="btn btn-primary"> Tambah </button>
        </div>
    </form>
</div>
