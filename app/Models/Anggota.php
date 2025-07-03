<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\PotensiAnggota;
class Anggota extends Model
{
    protected $fillable = ['nama', 'alamat', 'no_hp', 'tanggal_lahir', 'potensi', 'foto'];

    protected $casts = [
    'potensi' => PotensiAnggota::class,
];
}
