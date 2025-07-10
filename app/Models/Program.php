<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['nama_program', 'deskripsi', 'tanggal_pelaksanaan', 'lokasi', 'status'];
}
