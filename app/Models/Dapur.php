<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dapur extends Model
{
    use HasFactory;
    protected $table = 'dapur';

    protected $fillable = ['stan', 'head_koki'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
