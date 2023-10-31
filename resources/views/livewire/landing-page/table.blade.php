<div>
    <style>
        table,th,td{
            border: 1px solid;
            text-align: center;
        }

    </style>
    {{-- <div class="row"> --}}
        <div class="col-12 col-lg-10 d-flex">
            <div class="form-group">
                <label class="form-label fw-bold">Tanggal</label>
                <input type="date" class="form-control" wire:model="tanggal" value="{{date('Y-m-d')}}">
                {{-- <input type="text" class="form-control" value="{{$tanggal}}"> --}}
            </div>
            <div class="form-group">
                <label class="form-label fw-bold">Lapangan</label>
                <Select class="form-select" wire:model="idLapangan">
                    @foreach ($lapangan as $item )
                    <option value="{{$item->id}}">{{$item->namaLapangan}}</option>
                    @endforeach
                </Select>
            </div>
        </div>
    {{-- </div> --}}
    <table  class="table table-light table-striped bordered mb-4">
        <thead>
            <tr>
                <th>No.</th>
                <th>Jam</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>

            {{-- @php
            $jamArray = [];

            for ($i = 9; $i < 23; $i++) {
                    $jam = str_pad($i, 2, '0', STR_PAD_LEFT); // Format dua digit
                    // $menit = str_pad($j, 2, '0', STR_PAD_LEFT); // Format dua digit
                    $waktu = $jam . ':00';

                    $jamArray[] = $waktu;
            }

            // dd($jamArray);
            @endphp --}}

            @foreach ($jamss as $index=>$item)
                <tr>
                @php

                    $nama =  App\models\booking::where('tanggal','=',$tanggal)->where('idLapangan','=',$idLapangan)->where('jam','=',$item->jam)->first();

                @endphp
                <td>{{$index + 1}}</td>
                <td >{{$item->jam}} WIB</td>
                <td>{{$nama == null ?'-':$item->nama}}</td>
                </tr>
            @endforeach
            {{-- @dd($namaBoking) --}}
        </tbody>
    </table>
</div>
