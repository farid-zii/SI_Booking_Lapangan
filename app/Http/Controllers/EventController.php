<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Event.index',[
            "event"=>Event::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->cek);
        if($request->cek == "Ya"){
            $namaGambar = time().'-'.$request->event.'.jpg';
            $request->gambar->move(public_path('image\Event'), $namaGambar);

            Event::create([
                'event'=>$request->event,
                'deskripsi'=>$request->deskripsi,
                'awalPendaftaran'=>$request->tglAwal,
                'akhirPendaftaran'=>$request->tglAkhir,
                'gambar'=>$namaGambar,
                'tanggalEvent'=>$request->tglEvent.' sampai '. $request->tglEvent2,
            ]);
        }else{
            $namaGambar = time().'-'.$request->event.'jpg';
            $request->gambar->move(public_path('/image/Event'),$namaGambar);
            Event::create([
                'event'=>$request->event,
                'deskripsi'=>$request->deskripsi,
                'awalPendaftaran'=>$request->tglAwal,
                'akhirPendaftaran'=>$request->tglAkhir,
                'gambar'=>$namaGambar,
                'tanggalEvent'=>$request->tglEvent,
            ]);
        }

        return redirect('/event')->with('success','Event Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);

        return back()->with('success','Data Berhasil Dihapus');
    }
}
