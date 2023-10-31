@extends('layouts.main')
@section('isi')
<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Tambah Event </div>
            </div>
            <div class="card-body">
                @livewire('event.form')
            </div>
        </div>
    </div>


    @endsection
