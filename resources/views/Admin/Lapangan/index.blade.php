@extends('layouts.main')
@section('isi')
<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Lapangan</div>
            </div>
            <div class="card-body">
                @include('layouts.alert')
                <a href="/lapangan/create" class="btn btn-primary fw-bold mb-1">Tambah Data</a>
                <table id="basic-datatables" class="display table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Lapangan</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Harga</th>
                            <th scope="col" colspan="2" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lapangan as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->namaLapangan}}</td>
                            <td><img src="/image/lapangan/{{$item->gambar}}" alt="{{$item->namaLapangan}}" style="width: 80px;height:80px;"></td>
                            <td>@rp($item->harga)</td>
                            <td class="">
                                <div class="d-block text-center ">
                                <a href="/lapangan/{{$item->id}}/edit" class="btn btn-warning mx-2"><i
                                        class="bi bi-pencil-square"></i></a>

                                <form action="/lapangan/{{$item->id}}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        @endsection
