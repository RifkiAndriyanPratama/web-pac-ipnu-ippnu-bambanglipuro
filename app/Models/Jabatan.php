<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = ['nama', 'keterangan'];

    public function pengurus()
    {
        return $this->hasMany(Pengurus::class);
    }
}
