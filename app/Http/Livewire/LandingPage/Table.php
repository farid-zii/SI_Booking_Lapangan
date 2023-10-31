<?php

namespace App\Http\Livewire\LandingPage;

use App\Models\Booking;
use App\Models\Jam;
use App\Models\Lapangan;
use Livewire\Component;

use DB;

class Table extends Component
{

    public $tanggal;
    public $idLapangan;
    public $jam;
    // public $aa;
    public function render()
    {

            return view('livewire.landing-page.table',[
            'lapangan'=>Lapangan::get(),
            'booking'=>Booking::where('tanggal','=',$this->tanggal)->where('idLapangan','=',$this->idLapangan)->get(),
            'jamss'=>DB::select("SELECT jams.jam as jam, bookings.nama as nama FROM jams LEFT JOIN bookings on jams.jam = bookings.jam ORDER BY jams.id"),
        ]);

    }
}
