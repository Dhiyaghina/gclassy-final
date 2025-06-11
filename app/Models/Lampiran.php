<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $fillable = ['tugas_materi_id', 'tipe', 'isi'];

    public function tugasMateri()
    {
        return $this->belongsTo(TugasMateri::class);
    }
}

