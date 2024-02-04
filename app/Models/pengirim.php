<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengirim extends Model
{
    use HasFactory;

    protected $table='pengirim';

    protected $fillable=[
        'id','no_pengiriman','tanggal',
        'lokasi_id','barang_id','harga_barang',
        'jumlah_barang','is_active','user_id'
    ];

    protected $hidden=[];
    public function lokasi()
    {
        
           return $this->belongsTo(lokasi::class, 'lokasi_id', 'id')->withDefault(['nama_lokasi'=>'guest']);
        
    }
    public function barang()
    {
        
           return $this->belongsTo(barang::class, 'barang_id', 'id')->withDefault(['nama_barang'=>'guest']);
        
    }
    public function user()
    {
        
           return $this->belongsTo(user::class, 'user_id', 'id')->withDefault(['name'=>'guest']);
        
    }
}
