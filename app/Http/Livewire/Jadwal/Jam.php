<?php

namespace App\Http\Livewire\Jadwal;

use App\Models\Jadwal;
use Livewire\Component;

class Jam extends Component
{

    public $status = "Buka";
    public $tanggal ;
    public $jamBuka ;
    public $jamTutup ;
    public function render()
    {
        return view('livewire.jadwal.jam');
    }

    public function store(){

        if ($this->status =="Buka") {
            // dd($this->jamTutup);
            $this->validate([
                "tanggal"=>'required',
                "jamBuka"=>'required',
                "jamTutup"=>'required',
            ]);

            Jadwal::create([
                "tanggal"=>$this->tanggal,
                "jamBuka"=>$this->jamBuka,
                "jamTutup"=>$this->jamTutup,
                "status"=>$this->status
            ]);
        }
        else {
            $this->validate([
                "tanggal"=>'required',
            ]);
            // dd($this->tanggal);
            Jadwal::create([
                "tanggal"=>$this->tanggal,
                "status" => $this->status
            ]);
        }

        return redirect('jadwal');

    }

}
