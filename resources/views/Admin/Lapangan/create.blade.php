@extends('layouts.main')
@section('isi')
<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Tambah Barang </div>
            </div>
            <div class="card-body">
                <form action="/lapangan" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="">Nama Lapangan</label>
                                <input type="text" class="form-control" name="nama" placeholder="Lapangan x" required>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control" name="gambar" required>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" name="harga" placeholder="1xxx" required>
                            </div>

                            <button type="submit" class="btn btn-primary"> Tambah </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
