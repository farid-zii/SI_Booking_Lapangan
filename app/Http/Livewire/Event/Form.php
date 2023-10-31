<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $event;
    public $deskripsi;
    public $gambar;
    public $tglAwal;
    public $tglAkhir;
    public $tglEvent;
    public $tglEvent2;
    public $cek = "Ya";

    public function render()
    {
        return view('livewire.event.form');
    }

    public function store(){
        if($this->cek == "Ya"){
            $namaGambar = time().'-'.$this->event.'.jpg';
            $this->gambar->move(public_path('image\Event'), $namaGambar);
            $this->validate([
                'event'=>'required',
                'deskripsi'=>'required',
                'gambar'=>'required',
                'tglAwal'=>'required',
                'tglAkhir'=>'required',
                'tglEvent'=>'required',
                'tglEvent2'=>'required',
            ]);

            Event::create([
                'event'=>$this->event,
                'deskripsi'=>$this->deskripsi,
                'awalPendaftaran'=>$this->tglAwal,
                'akhirPendaftaran'=>$this->tglAkhir,
                'gambar'=>$namaGambar,
                'tanggalEvent'=>$this->tglEvent.' - '. $this->tglEvent2,
            ]);
        }else{
            $namaGambar = time().'-'.$this->event.'jpg';
            $this->gambar->move(public_path('/image/Event'),$namaGambar);
            $this->validate([
                'event'=>'required',
                'deskripsi'=>'required',
                'gambar'=>'required',
                'tglAwal'=>'required',
                'tglAkhir'=>'required',
                'tglEvent'=>'required',
            ]);

            Event::create([
                'event'=>$this->event,
                'deskripsi'=>$this->deskripsi,
                'awalPendaftaran'=>$this->tglAwal,
                'akhirPendaftaran'=>$this->tglAkhir,
                'gambar'=>$namaGambar,
                'tanggalEvent'=>$this->tglEvent,
            ]);
        }

        return redirect('/event')->with('success','Event Berhasil Ditambahkan');
    }
}
