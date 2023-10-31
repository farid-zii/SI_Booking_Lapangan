@extends('layouts.main')
@section('isi')
<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Tambah Boking</div>
            </div>
            <div class="card-body">
                @livewire('booking.form')
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
