<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('Admin.Lapangan.index',[
            'lapangan'=>Lapangan::latest()->get()
        ]);

        // $data = Lapangan::get();
        // return response()->json($data,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Lapangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {

        $namaGambar = time(). $r->nama . '.jpg';
        $r->gambar->move(public_path('image/Lapangan'), $namaGambar);
        Lapangan::create([
            'namaLapangan'=>$r->nama,
            'gambar'=>$namaGambar,
            'harga'=>$r->harga,
        ]);

        return redirect('/lapangan')->with('success','Lapangan Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function show(Lapangan $lapangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Lapangan.edit',[
            "lapangan"=>Lapangan::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->gambar != null){
            $namaGambar = time() . $request->nama . '.jpg';
            $request->gambar->move(public_path('image/Lapangan'), $namaGambar);
            Lapangan::find($id)->update([
                'namaLapangan'=>$request->nama,
                'gambar' => $namaGambar,
                'harga'=>$request->harga,
            ]);
        }else {
            Lapangan::find($id)->update([
                'namaLapangan'=>$request->nama,
                'harga'=>$request->harga,
            ]);
        }

        return redirect('/lapangan')->with('success', 'Lapangan Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lapangan::destroy($id);

        return back()->with('success','Berhasil di Hapus');
    }
}
