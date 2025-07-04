<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $fillable = ['anggota_id', 'jabatan_id', 'periode_id', 'tanggal_mulai', 'tanggal_selesai'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}

