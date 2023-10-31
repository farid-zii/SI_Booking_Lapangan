@extends('layouts.main')
@section('isi')

<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Berita</div>
            </div>
            <div class="card-body">
                @include('layouts.alert')
                <a href="/event/create" class="btn btn-primary fw-bold mb-1">Tambah Data</a>
                <table id="basic-datatables" class="display table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Event</th>
                            {{-- <th scope="col">Gambar</th> --}}
                            <th scope="col">Tanggal Pendaftaran</th>
                            <th scope="col">Tanggal Event</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col" colspan="2" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->event}}</td>
                            {{-- <td><img src="/image/event/{{$item->gambar}}" alt="{{$item->event}}"
                                    style="width: 80px;height:80px;"></td> --}}
                            <td>{{$item->awalPendaftaran}} sampai {{$item->awalPendaftaran}}</td>
                            <td>{{$item->tanggalEvent}}</td>
                            <td>{{$item->deskripsi}}</td>
                            <td>
                                <div class="d-flex">
                                <a href="/event/{{$item->id}}/edit" class="btn btn-warning mx-2"><i
                                        class="bi bi-pencil-square"></i></a>
                                <form action="/event/{{$item->id}}" method="post" class="d-inline">
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
