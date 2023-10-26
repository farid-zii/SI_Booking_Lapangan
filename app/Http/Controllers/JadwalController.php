<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Jadwal.index',[
            'jadwal'=>Jadwal::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        if($r->status=='Buka'){
            Jadwal::create([
                'status'=>$r->status,
                'tanggal'=>$r->tanggal,
                'jamBuka'=>$r->jamBuka,
                'jamTutup'=>$r->jamTutup,
            ]);
        }else{
            Jadwal::create([
                'status'=>$r->status,
                'tanggal'=>$r->tanggal,
            ]);
        }

        return redirect('/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Jadwal.edit', [
            'jadwal' => Jadwal::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        if ($r->status == 'Buka') {
            Jadwal::find($id)->update([
                'status' => $r->status,
                'tanggal' => $r->tanggal,
                'jamBuka' => $r->jamBuka,
                'jamTutup' => $r->jamTutup,
            ]);
        } else {
            Jadwal::find($id)->update([
                'status' => $r->status,
                'tanggal' => $r->tanggal,
            ]);
        }
        return redirect('/jadwal');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::destroy($id);

        return back();
    }
}
