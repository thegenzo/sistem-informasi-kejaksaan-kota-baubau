<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::all();

        return view('admin-panel.pages.page.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Category::all();

        return view('admin-panel.pages.page.create', compact('kategori'));
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
            'category_id'           => 'required',
            'title'                 => 'required',
            'page_content'          => 'required',
        ];

        $messages = [
            'category_id.required'      => 'Kategori halaman wajib diisi',
            'title.required'            => 'Judul halaman wajib diisi',
            'page_content.required'     => 'Konten halaman wajib diisi',             
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        Page::create($data);

        return redirect()->route('admin-panel.page.index')->with('success', 'Halaman berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $dataPage = Page::find($page->id);

        return view('admin-panel.pages.page.show', compact('dataPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $dataPage = Page::find($page->id);
        $kategori = Category::all();

        return view('admin-panel.pages.page.edit', compact('dataPage', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $rules = [
            'category_id'           => 'required',
            'title'                 => 'required',
            'page_content'          => 'required',
        ];

        $messages = [
            'category_id.required'      => 'Kategori halaman wajib diisi',
            'title.required'            => 'Judul halaman wajib diisi',
            'page_content.required'     => 'Konten halaman wajib diisi',             
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        $dataPage = Page::find($page->id);
        $dataPage->update($data);

        return redirect()->route('admin-panel.page.index')->with('success', 'Halaman berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $dataPage = Page::find($page->id);
        $dataPage->delete();

        return back()->with('success', 'Halaman berhasil dihapus!');
    }
    public function uploadImage(Request $request)
    {
        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ];

        $messages = [
            'image.required' => 'Gambar wajib diisi',
            'image.image' => 'Gambar tidak sesuai format',
            'image.mimes' => 'Gambar harus berformat berikut (jpeg, png atau jpg)',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $image = $request->file('image');
        $filename = time() . '.jpg';
        $upload_filepath = 'images/pages'; // Update the file path as per your local storage setup
        Storage::makeDirectory($upload_filepath);
        $path = $image->storePubliclyAs($upload_filepath, $filename);

        $url = Storage::url($path);

        return response()->json(['success' => 1, 'file' => ['url' => $url]]);
    }

    public function urlImage(Request $request)
    {
        $rules = [
            'url' => 'required|url',
        ];

        $messages = [
            'url.required' => 'URL gambar wajib diisi',
            'url.url' => 'URL gambar tidak valid',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $url = $request->input('url');
        $contents = file_get_contents($url);
        $filename = time() . '.jpg';
        $upload_filepath = 'images/pages'; // Update the file path as per your local storage setup
        Storage::makeDirectory($upload_filepath);
        Storage::put($upload_filepath . "/" . $filename, $contents, 'public');

        $url = Storage::url($upload_filepath . "/" . $filename);

        return response()->json(['success' => 1, 'file' => ['url' => $url]]);
    }
}
