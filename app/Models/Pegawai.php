<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'email',
        'alamat',
        'no_hp',
        'gender',
        'agama',
        'image',
        'bagian',
    ];
}
