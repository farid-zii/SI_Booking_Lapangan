<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Lapangan;
use Livewire\Component;

class Form extends Component {
    public $idLapangan;
    public $nama;
    public $noTelp;
    public $jam;
    public $tanggal;
    public $uangDp;
    public $sisa;
    public $status = "Booking";
    public $bukti;

    public
    function render() {
        return view('livewire.booking.form',[
            'lapangan' => Lapangan::get(),
            'booking' => Booking::get(),
            'jadwal' => Jadwal::orderBy('tanggal', 'asc')->get(),
            // 'tanggals'=>$this->tanggal = now()->format('d-m-Y')

        ]);
    }

    public
    function store() {

        $Lapangan=Lapangan::find($this->idLapangan);
        if ($this -> status == "Lunas") {
            $this -> validate([
                'idLapangan' => "required",
                'noTelp' => "required",
                'nama' => "required",
                'status' => "required",
                'tanggal' => "required",
                'jam' => "required",
            ]);

            Booking::create([
                "nama"=>$this->nama,
                "noTelp"=>$this->noTelp,
                "idLapangan"=>$this->idLapangan,
                "status"=>$this->status,
                "tanggal"=>$this->tanggal,
                "jam"=>$this->jam,
                "uangDp"=>$Lapangan->harga,
                "sisa"=>0
            ]);

        } else {

            // dd($this);
            $this->validate([
                'idLapangan' => "required",
                'noTelp' => "required",
                'nama' => "required",
                'status' => "required",
                'tanggal' => "required",
                'jam' => "required",
                'uangDp' => "required",
            ]);

            $sisaBayar = $Lapangan->harga - $this->uangDp;
            Booking::create([
                "nama"=>$this->nama,
                "noTelp"=>$this->noTelp,
                "idLapangan"=>$this->idLapangan,
                "status"=>$this->status,
                "tanggal"=>$this->tanggal,
                "jam"=>$this->jam,
                "uangDp"=>$this->uangDp,
                "sisa"=>$sisaBayar
            ]);
        }

        return redirect('booking');
    }
}
