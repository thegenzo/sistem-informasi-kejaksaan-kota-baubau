<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'cover_image',
        'status',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteParam(){
        return ['id_slug' => $this->id . '-' . str_slug(implode(" ", array_slice(explode(" ", $this->title), 0, 4)))];
    }
}
