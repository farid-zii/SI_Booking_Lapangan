@extends('layouts.main')
@section('isi')
<div class="container mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title fw-bold">Booking </div>
            </div>
            <div class="card-body">
                @include('layouts.alert')
                <a href="/booking/create" class="btn btn-primary fw-bold mb-1">Tambah Data</a>
                <table id="basic-datatables" class="display table table-bordered table-hover mt-2">
                    <thead class="table-secondary">
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nama </th>
                            <th scope="col">Jadwal </th>
                            <th scope="col">Lapangan</th>
                            {{-- <th scope="col">Bukti DP</th> --}}
                            <th scope="col">DP</th>
                            <th scope="col">Sisa</th>
                            <th scope="col">Status</th>
                            <th scope="col" colspan="2" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($boking as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td class="text-center">
                                <p class="mt-2 fw-bold">{{$item->nama}}</p>
                                <p class="" style="font-size: 12px">{{$item->noTelp}}</p>
                            </td>
                            {{-- <td>{{$item->idJadwal}} </td> --}}
                            <td class="text-center">
                               <p >{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}} </p>
                               <p class="fw-bold"> Jam : {{$item->jam}} WIB</p>
                            </td>
                            {{-- <td>{{$item->jadwal}}</td> --}}
                            <td>{{$item->lapangan->namaLapangan}}</td>
                            <td>@rp($item->uangDp)</td>
                            <td>@rp($item->sisa)</td>
                            <td><span class="p-2 rounded fw-bold text-light {{$item->status=='Booking' ? 'bg-dark':'bg-success p-2 text-white bg-opacity-50';}}">{{$item->status}}</span></td>
                            <td class="">
                                <div class="d-block my-auto mb-2">
                                <a href="/booking/{{$item->id}}/edit" class="btn btn-warning mx-2"><i
                                        class="bi bi-pencil-square"></i></a>


                                <form action="/booking/{{$item->id}}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                                </div>
                            </td>
                        <tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection
