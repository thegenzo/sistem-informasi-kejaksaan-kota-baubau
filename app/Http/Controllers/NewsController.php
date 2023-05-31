<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('admin-panel.pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.pages.news.create');
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
            'title'         => 'required',
            'content'       => 'required',
            'cover_image'   => 'required|image|mimes:jpeg,png,jpg',
            'status'        => 'required',
        ];

        $messages = [
            'title.required'        => 'Judul berita wajib diisi',
            'content.required'      => 'Konten berita wajib diisi',
            'cover_image.required'  => 'Sampul jurusan wajib diisi',
            'cover_image.image'     => 'Sampul jurusan harus berupa gambar',
            'cover_image.mimes'     => 'Sampul jurusan harus berformat gambar (jpeg, png atau jpg)',
            'status.required'       => 'Status berita wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // PROSES UPLOAD cover_image DISINI
        $cover_image = $request->file('cover_image');
        $filename = time() . '.jpg';
        $upload_filepath = 'news'; // Update the upload directory as per your requirement
        $path = $cover_image->storeAs($upload_filepath, $filename);

        $data = $request->all();
        unset($data['cover_image']);
        $data['cover_image'] = Storage::url($path);
        $data['user_id'] = auth()->user()->id;
        News::create($data);

        return redirect()->route('admin-panel.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin-panel.pages.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $rules = [
            'title'         => 'required',
            'content'       => 'required',
            'cover_image'   => 'image|mimes:jpeg,png,jpg',
            'status'        => 'required',
        ];

        $messages = [
            'title.required'        => 'Judul berita wajib diisi',
            'content.required'      => 'Konten berita wajib diisi',
            'cover_image.image'     => 'Sampul jurusan harus berupa gambar',
            'cover_image.mimes'     => 'Sampul jurusan harus berformat gambar (jpeg, png atau jpg)',
            'status.required'       => 'Status berita wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        if ($request->has('cover_image')) {
            $existing_image = basename($news->cover_image);
            Storage::delete($existing_image);
            // PROSES UPLOAD cover_image DISINI
            $cover_image = $request->file('cover_image');
            $filename = time() . '.jpg';
            $upload_filepath = 'news'; // Update the upload directory as per your requirement
            $path = $cover_image->storeAs($upload_filepath, $filename);
            unset($data['cover_image']);
            $data['cover_image'] = Storage::url($path);
        }

        $news->update($data);

        return redirect()->route('admin-panel.news.index')->with('success', 'Berita berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $existing_image = basename($news->cover_image);
        Storage::delete($existing_image);

        $news->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus!');
    }

    public function uploadImage(Request $request)
    {
        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ];

        $messages = [
            'image.required' => 'Gambar wajib diisi',
            'image.image'    => 'Gambar tidak sesuai format',
            'image.mimes'    => 'Gambar harus berformat berikut (jpeg, png atau jpg)',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $image = $request->file('image');
        $filename = time() . '.jpg';
        $upload_filepath = 'news'; // Update the upload directory as per your requirement
        $path = $image->storeAs($upload_filepath, $filename);

        $url = Storage::url($path);

        return response()->json(['success' => 1, 'file' => ['url' => $url]]);
    }

    public function urlImage(Request $request)
    {
        $rules = [
            'url' => 'required|image_link',
        ];

        $messages = [
            'url.required' => 'Gambar wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $url = $request->input('url');
        $contents = file_get_contents($url);
        $filename = substr($url, strrpos($url, '/') + 1);
        $upload_filepath = 'news'; // Update the upload directory as per your requirement
        Storage::makeDirectory($upload_filepath);
        Storage::put($upload_filepath . '/' . $filename, $contents, 'public');

        $url = Storage::url($upload_filepath . '/' . $filename);

        return response()->json(['success' => 1, 'file' => ['url' => $url]]);
    }
}
