@extends('layouts.main')
@section('isi')
<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Tambah Boking</div>
            </div>
            <div class="card-body">
                <form action="/booking" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="asep" required>
                            </div>
                            <div class="form-group">
                                <label for="">No Telp/WA</label>
                                <input type="text" class="form-control" name="noTelp" maxlength="16"
                                    oninput="formatNomorHP(this)" placeholder="08xx" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Pilih Lapangan</label>
                                <div class="row">
                                    @foreach ($lapangan as $item )
                                    <div class="col-6 col-sm-3">
                                        <label class="imagecheck mb-4">
                                            <input name="idLapangan" type="radio" value="{{$item->id}}" class="imagecheck-input">
                                            <figure class="imagecheck-figure">
                                                <img src="/image/lapangan/{{$item->gambar}}"
                                                    alt="{{$item->namaLapangan}}" class="imagecheck-image col-sm-12">
                                            </figure>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <select class="form-control form-select-sm" name="idJadwal" aria-label="Small select example">
                                    <option hidden>PILIH TANGGAL</option>
                                    @foreach ($jadwal as $item)
                                    <option value="{{$item->id}}" {{$item->status =="Buka"?'':"disabled class='bg-danger'"}}>{{$item->tanggal}} --- <span class="p-1 {{$item->status =="Buka"?'bg-success':'bg-danger'}}">{{$item->status}}</span> --- </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" min="{{date('Y-m-d')}}" class="form-control" name="idJadwal"
                                    placeholder="Lapangan x" required>
                            </div> --}}

                            <div class="form-group">
                                <label class="form-label">Jam</label>
                                <div class="row col-5">
                                    @for($i=10;$i<24;$i++) <div class="selectgroup selectgroup-pills ">
                                        <label class="selectgroup-item  >">
                                            <input type="radio" name="jam" value="{{$i}}:00" class="selectgroup-input"
                                                {{$i==11?"disabled ":'';}} >
                                            <span class="selectgroup-button fw-bold text-dark {{$i==11?"bg-danger":'';}}">{{$i}}:00</span>
                                        </label>
                                </div>
                                @endfor
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="Booking" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button fw-bold">Booking</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="Lunas" class="selectgroup-input">
                                        <span class="selectgroup-button fw-bold">Lunas</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Bukti Pemesan</label>
                                <input type="file" class="form-control" name="buktiDp" required>
                            </div>

                            <div class="form-group">
                                <label for="">Besar DP</label>
                                <input type="number" class="form-control" name="uangDp" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"> Tambah </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function formatNomorHP(input) {
            // Hilangkan spasi dan karakter non-digit dari input
            var nomorHP = input.value.replace(/\D/g, '');

            // Gunakan ekspresi reguler untuk memasukkan spasi setiap empat digit
            nomorHP = nomorHP.replace(/(\d{4})(?=\d)/g, '$1 ');

            // Terapkan hasilnya ke input
            input.value = nomorHP;
        }

    </script>
    @endsection


    {{-- <script>
        let pilih1 = document.getElementById('buka')
        let pilih2 = document.getElementById('tutup')
        let hasil = document.getElementById('hasilBuka')

        pilih1.addEventListener('change',Hasil);
        pilih2.addEventListener('change',Hasil);

        function Hasil() {
            if(pilih2.checked){
                hasil.style.hidden="true";
            }else{

            }
        }
    </script> --}}
