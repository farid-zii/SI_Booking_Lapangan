<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Admin.Booking.index',[
            'boking'=>Booking::with('jadwal')->get(),

        ]);

        // $data= Booking::get();

        // return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Booking.create',[
            'lapangan'=>Lapangan::get(),
            'jadwal'=>Jadwal::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->status);
        $lapangan = Lapangan::find($request->idLapangan)->first();
        $sisa = $lapangan - $request->uangDp;

        if($request->status=="Booking"){
            $bukti = time().'_'.$request->nama.'.jpg';
            $request->buktiDp->move(public_path('/image/bukti_Boking'),$bukti);
            Booking::create([
                'nama'=>$request->nama,
                'noTelp'=>$request->noTelp,
                'idLapangan'=>$request->idLapangan,
                'idJadwal'=>$request->idJadwal,
                'jam'=>$request->jam,
                'uangDp'=>$request->uangDp,
                'sisa'=>$sisa,
                'buktiBooking'=>$bukti,
                'status'=>$request->status,
            ]);
        }
        if($request->status=="Lunas"){
            $bukti = time().'_'.$request->nama.'.jpg';
            $request->buktiDp->move(public_path('/image/bukti_Boking'),$bukti);

            Booking::create([
                'nama'=>$request->nama,
                'noTelp'=>$request->noTelp,
                'idLapangan'=>$request->idLapangan,
                'idJadwal'=>$request->idJadwal,
                'jam'=>$request->jam,
                'uangDp'=>$lapangan->harga,
                'sisa'=>$sisa,
                'buktiBooking'=>$bukti,
                'status'=>$request->status,
            ]);
        }
        return redirect('/booking');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Booking.edit',[
            'booking'=>Booking::find($id)->first(),
            'lapangan'=>Lapangan::get(),
            'jadwal'=>Jadwal::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lapangan = Lapangan::find($request->idLapangan)->first();
        $sisa = $lapangan - $request->uangDp;

        if($request->status=="Booking"){
            $bukti = time().'_'.$request->nama.'.jpg';
            $request->buktiDp->move(public_path('/image/bukti_Boking'),$bukti);
            Booking::find($id)->update([
                'nama'=>$request->nama,
                'noTelp'=>$request->noTelp,
                'idLapangan'=>$request->idLapangan,
                'idJadwal'=>$request->idJadwal,
                'jam'=>$request->jam,
                'uangDp'=>$request->uangDp,
                'sisa'=>$sisa,
                'buktiBooking'=>$bukti,
                'status'=>$request->status,
            ]);
        }
        if($request->status=="Lunas"){
            $bukti = time().'_'.$request->nama.'.jpg';
            $request->buktiDp->move(public_path('/image/bukti_Boking'),$bukti);

            Booking::find($id)->update([
                'nama'=>$request->nama,
                'noTelp'=>$request->noTelp,
                'idLapangan'=>$request->idLapangan,
                'idJadwal'=>$request->idJadwal,
                'jam'=>$request->jam,
                'uangDp'=>$lapangan->harga,
                'sisa'=>$sisa,
                'buktiBooking'=>$bukti,
                'status'=>$request->status,
            ]);
        }
        return redirect('/booking');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        Booking::destroy($id);

        return redirect('/booking');
    }
}
