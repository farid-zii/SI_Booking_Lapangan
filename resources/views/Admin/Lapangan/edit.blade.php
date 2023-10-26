@extends('layouts.main')
@section('isi')
<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Edit Barang </div>
            </div>
            <div class="card-body">
                <form action="/lapangan/{{$lapangan->id}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="">Nama Lapangan</label>
                                <input type="text" class="form-control" name="nama" placeholder="Lapangan x" required value="{{$lapangan->namaLapangan}}">
                            </div>

                            <div class="form-group">
                                <img src="/image/lapangan/{{$lapangan->gambar}}" style="width: 200px;height: 200px" alt="">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                            </div>

                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" name="harga" placeholder="1xxx" required value="{{$lapangan->harga}}">
                            </div>

                            <button type="submit" class="btn btn-primary"> Simpan </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
