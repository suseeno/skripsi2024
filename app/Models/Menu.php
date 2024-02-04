<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryMenu;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $fillable = [
        'name',
        'slug',
        'price',
        'category_menus_id',
        'image',
        'description',
        'is_active',
        
    ];

    public function category()
    {
        return $this->belongsTo(
            categoryMenu::class,
            'category_menus_id',
            'id'
        )->withDefault(['name_category' => 'guest']);
    }

    public function dapur()
    {
        return $this->belongsTo(Dapur::class);
    }
}
