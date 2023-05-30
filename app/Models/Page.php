<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'page_content'
    ];


    public function getRouteParam(){
        return ['id_slug' => $this->id . '-' . str_slug(implode(" ", array_slice(explode(" ", $this->title), 0, 4)))];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
