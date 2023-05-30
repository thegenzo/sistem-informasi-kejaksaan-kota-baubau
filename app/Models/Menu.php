<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_order',
        'level',
        'parent',
        'name',
        'type',
        'target'
    ];

    public function child_menu()
    {
        return $this->hasMany(Menu::class, 'parent');
    }

    public function parent_menu()
    {
        return $this->belongsTo(Menu::class, 'parent');
    }
}
