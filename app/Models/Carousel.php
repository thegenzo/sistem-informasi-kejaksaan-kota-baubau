<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_image',
        'banner_html',
        'link_type',
        'link_target',
        'link_title'
    ];

    public function getRouteTarget(){
        if($this->link_type == 'route'){
            return $this->link_target;
        }
        else if($this->link_type == 'page'){
            return "web.page";
        }
        else if($this->link_type == 'news'){
            return "web.news";
        }
    }

    public function getRouteParam(){
        if($this->link_type == 'route'){
            return [];
        }
        else if($this->link_type == 'page'){
            return Page::find($this->link_target)->getRouteParam();
        }
        else if($this->link_type == 'news'){
            return News::find($this->link_target)->getRouteParam();
        }
    }
}
