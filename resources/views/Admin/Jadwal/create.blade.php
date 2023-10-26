@extends('layouts.main')

@push('styles')
@livewireStyles
@endpush
@push('script')
@livewireScripts
@endpush
@section('isi')
<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Tambah Jadwal </div>
            </div>
            <div class="card-body">
                @livewire('jadwal.jam')
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
