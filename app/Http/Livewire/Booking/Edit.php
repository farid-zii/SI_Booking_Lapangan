<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Jam;
use App\Models\Lapangan;
use Livewire\Component;

class Edit extends Component
{
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
            // 'booking' => Booking::get(),
            'jam'=>Jam::get()
            // 'jadwal' => Jadwal::orderBy('tanggal', 'asc')->get(),
            // 'tanggals'=>$this->tanggal = now()->format('d-m-Y')

        ]);
    }
}
