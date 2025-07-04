<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $fillable = ['nama', 'mulai', 'selesai'];

    public function pengurus()
    {
        return $this->hasMany(Pengurus::class);
    }
}

