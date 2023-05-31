<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\News;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Validator;
use Image;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = Carousel::all();
        return view('admin-panel.pages.carousel.index', compact('carousel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allRoutes = Route::getRoutes();
        $allPages = Page::all();
        $allNewses = News::all();

        return view('admin-panel.pages.carousel.create', compact('allRoutes', 'allPages', 'allNewses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'banner_image'          => 'required|image|mimes:jpeg,png,jpg',
            'banner_html'           => 'required',
            'link_type'             => 'required',
            'link_title'            => 'required',
            'target_route'          => 'required_if:link_type,route|nullable',
            'target_page'           => 'required_if:link_type,page|nullable|exists:pages,id',
            'target_news'           => 'required_if:link_type,news|nullable|exists:news,id',
        ];

        $messages = [
            'banner_image.required'     => 'Gambar banner wajib diisi',
            'banner_image.images'       => 'Gambar banner harus berupa gambar',
            'banner_image.mimes'        => 'Gambar banner harus berformat gambar (jpeg, png atau jpg)',
            'banner_html.required'      => 'Kode HTML Banner wajib diisi',
            'link_type.required'        => 'Tipe link wajib diisi',         
            'link_title.required'       => 'Judul link wajib diisi',
            'target_page.exists'        => 'Target Halaman harus sesuai',         
            'target_news.exists'        => 'Target Berita harus sesuai', 

            'target_route.required_if'  => 'Target Route harus diisi',
            'target_page.required_if'   => 'Target Halaman harus diisi',         
            'target_news.required_if'   => 'Target Berita harus diisi',         
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // PROSES UPLOAD banner_image DISINI
        $banner_image = $request->file('banner_image');
        $filename = time() . '.jpg';
        $upload_filepath = "carousels";
        $path = $banner_image->storeAs($upload_filepath, $filename);

        $imgFile = Image::make(Storage::disk('public')->path($path));
        $file = $imgFile->fit(1920, 780);
        $file->save(Storage::disk('public')->path($path));

        $data = $request->all();
        unset($data['banner_image']);
        $data['banner_image'] = Storage::url($path);

        if ($data['link_type'] == 'route') {
            $data['link_target'] = $data['target_route'];
        }
        if ($data['link_type'] == 'page') {
            $data['link_target'] = $data['target_page'];
        }
        if ($data['link_type'] == 'news') {
            $data['link_target'] = $data['target_news'];
        }
        Carousel::create($data);

        return redirect()->route('admin-panel.carousel.index')->with('succes', 'Carousel berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        $allRoutes = Route::getRoutes();
        $allPages = Page::all();
        $allNewses = News::all();
        return view('admin-panel.pages.carousel.edit', compact('carousel', 'allRoutes', 'allPages', 'allNewses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        $rules = [
            'banner_image'          => 'image|mimes:jpeg,png,jpg',
            'banner_html'           => 'required',
            'link_type'             => 'required',
            'link_title'            => 'required',
            'target_route'          => 'required_if:link_type,route|nullable',
            'target_page'           => 'required_if:link_type,page|nullable|exists:pages,id',
            'target_news'           => 'required_if:link_type,news|nullable|exists:news,id',
        ];

        $messages = [
            'banner_image.images'       => 'Gambar banner harus berupa gambar',
            'banner_image.mimes'        => 'Gambar banner harus berformat gambar (jpeg, png atau jpg)',
            'banner_html.required'      => 'Kode HTML Banner wajib diisi',
            'link_type.required'        => 'Tipe link wajib diisi',
            'link_title.required'       => 'Judul link wajib diisi',
            'target_page.exists'        => 'Target Halaman harus sesuai',
            'target_news.exists'        => 'Target Berita harus sesuai',
            'target_route.required_if'  => 'Target Route harus diisi',
            'target_page.required_if'   => 'Target Halaman harus diisi',
            'target_news.required_if'   => 'Target Berita harus diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        if ($request->has('banner_image')) {
            $existing_image = Str::after($carousel->banner_image, "storage/");
            Storage::disk('public')->delete($existing_image);

            // PROSES UPLOAD banner_image DISINI
            $banner_image = $request->file('banner_image');
            $filename = time() . '.jpg';
            $path = $banner_image->storeAs('carousels', $filename);
            $imgFile = Image::make(Storage::disk('public')->path($path));
            $file = $imgFile->fit(1920, 780);
            $file->save(Storage::disk('public')->path($path));
            unset($data['banner_image']);
            $data['banner_image'] = Storage::url($path);
        }

        if ($data['link_type'] == 'route') {
            $data['link_target'] = $data['target_route'];
        }
        if ($data['link_type'] == 'page') {
            $data['link_target'] = $data['target_page'];
        }
        if ($data['link_type'] == 'news') {
            $data['link_target'] = $data['target_news'];
        }

        $carousel->update($data);

        return redirect()->route('admin-panel.carousel.index')->with('success', 'Carousel berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        if ($carousel->id == 1) {
            return redirect()->back()->with('failed', 'Carousel utama tidak bisa dihapus!');
        }
        $existing_image = Str::after($carousel->banner_image, "storage/");
        Storage::disk('public')->delete($existing_image);
        $carousel->delete();

        return redirect()->back()->with('success', 'Carousel berhasil dihapus!');
    }
}
