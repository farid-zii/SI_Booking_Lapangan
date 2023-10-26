<?php

namespace App\Http\Livewire\Booking;

use Livewire\Component;

class Form extends Component
{
    public $lapangan;
    public $nama;
    public $noTelp;
    public $jam;
    public $jadwal;
    public $uangDp;
    public $sisa;
    public $status;
    public $bukti;

    public function render()
    {
        return view('livewire.booking.form');
    }

    public function store(){

    }
}
