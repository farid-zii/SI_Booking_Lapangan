<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class,'idJadwal');
    }
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class,'idLapangan');
    }
}
