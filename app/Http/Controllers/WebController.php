<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Carousel;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;

class WebController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        $carousels = Carousel::orderBy('id', 'asc')->get();
        $allNews = News::latest()->take(3)->get();
        foreach($carousels as $carousel){
            $carousel->link = route($carousel->getRouteTarget(), $carousel->getRouteParam());
            $carousel->banner_html = Blade::render(Blade::compileString($carousel->banner_html), ['carousel' => $carousel]);
        }
        return view('web.home', compact('galleries', 'carousels', 'allNews'));
    }
    public function page(Request $request, $id_slug = null)
    {
        if ($id_slug)
        {
            $id = Str::of($id_slug)->explode("-")[0];
            $page = Page::find($id);
            if($page)
            {
                return view('web.page', compact('page'));
            }
            else 
            {
                abort(404);
            }
        }
        else {
            abort(404);
        }
    }
    public function news(Request $request, $id_slug = null)
    {
        if ($id_slug)
        {
            $id = Str::of($id_slug)->explode("-")[0];
            $news = News::find($id);
            if($news)
            {
                $newestNewses = News::where('status', 'published')->orderBy('created_at', 'desc')->take(4)->get();
                return view('web.news-single', compact('news', 'newestNewses'));
            }
            else 
            {
                abort(404);
            }
        }
        else {
            $newestNewses = News::where('status', 'published')->orderBy('created_at', 'desc')->take(4)->get();
            if($request->has('keyword')){
                $keyword = $request->input('keyword');
                $newses = News::where('status', 'published')->where(function($query) use ($keyword){
                    $query->where('title', 'LIKE', '%' . $keyword . '%');
                    $query->orWhere('content', 'LIKE', '%' . $keyword . '%');
                })->paginate(3);
            }
            else {
                $newses = News::where('status', 'published')->orderBy('created_at', 'desc')->paginate(3);
            }
            return view('web.news-all', compact('newses', 'newestNewses'));
        }
    }
}
