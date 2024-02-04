<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagenotpound extends Model
{
    use HasFactory;

    protected $table = 'pagenotpound';

    protected $fillable = ['image', 'title', 'intro', 'description'];
}
