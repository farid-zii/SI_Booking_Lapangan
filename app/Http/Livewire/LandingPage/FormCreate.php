<?php

namespace App\Http\Livewire\LandingPage;

use App\Models\Lapangan;
use Livewire\Component;

class FormCreate extends Component
{
    public function render()
    {
        return view('livewire.landing-page.form-create',[
            'lapangan'=>Lapangan::get()
        ]);
    }
}
