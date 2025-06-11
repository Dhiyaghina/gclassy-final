<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TugasMateri extends Model
{
    protected $fillable = ['kelas_id', 'tipe', 'judul', 'deskripsi', 'poin', 'deadline'];

    public function lampiran()
    {
        return $this->hasMany(Lampiran::class);
    }
}
