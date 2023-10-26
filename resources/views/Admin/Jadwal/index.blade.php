@extends('layouts.main')
@section('isi')
<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Jadwal</div>
            </div>
            <div class="card-body">
                <a href="/jadwal/create" class="btn btn-primary fw-bold mb-1">Tambah Data</a>
                <table id="basic-datatables" class="display table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam Buka</th>
                            <th scope="col">Jam Tutup</th>
                            <th scope="col">Status</th>
                            <th scope="col" colspan="2" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwal as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}</td>
                            <td>{{$item->jamBuka == null ? '-' : $item->jamBuka}}</td>
                            <td>{{$item->jamTutup == null ? '-' : $item->jamTutup}}</td>
                            <td>
                                @if ($item->status=='Buka')
                                <p class="m-auto bg-success rounded fw-bold text-black text-center">{{$item->status}}</p>
                                @else
                                <p class="m-auto bg-danger rounded fw-bold text-black text-center">{{$item->status}}</p>
                                @endif
                            </td>
                            <td>
                                <a href="/jadwal/{{$item->id}}/edit" class="btn btn-warning"><i
                                        class="bi bi-pencil-square"></i></a>
                            </td>
                            <td>
                                <form action="/jadwal/{{$item->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        <tr>
                            @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        @endsection
