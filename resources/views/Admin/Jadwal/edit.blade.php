@extends('layouts.main')
@section('isi')
<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Tambah Jadwal </div>
            </div>
            <div class="card-body">
                <form action="/jadwal/{{$jadwal->id}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="Buka" class="selectgroup-input" {{$jadwal->status == "Buka" ? 'checked':''}}>
                                    <span class="selectgroup-button fw-bold" >Buka</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="status" value="Tutup" class="selectgroup-input" {{$jadwal->status == "Tutup" ? 'checked':''}}>
                                    <span class="selectgroup-button fw-bold" >Tutup</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" min="{{date('Y-m-d')}}" class="form-control" name="tanggal" value="{{$jadwal->tanggal}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Jam Buka</label>
                                <input type="time" class="form-control" name="jamBuka"  value="{{$jadwal->jamBuka}}">
                            </div>
                            <div class="form-group">
                                <label for="">Jam Tutup</label>
                                <input type="time" class="form-control" name="jamTutup" value="{{$jadwal->jamTutup}}">
                            </div>


                            <button type="submit" class="btn btn-primary"> Tambah </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
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
