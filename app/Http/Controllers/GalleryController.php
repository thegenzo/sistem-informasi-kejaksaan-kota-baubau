<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();

        return view('admin-panel.pages.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.pages.gallery.create');
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
            'category' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg',
        ];

        $messages = [
            'category.required' => 'Kategori wajib diisi',
            'file.required' => 'Foto wajib diisi',
            'file.image' => 'Foto harus berupa gambar',
            'file.mimes' => 'Foto harus berformat gambar (jpeg, png atau jpg)',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // PROSES UPLOAD file DISINI
        $file = $request->file('file');
        $filename = time() . '.jpg';
        $upload_filepath = 'images/gallery'; // Update the upload directory as per your requirement
        $path = $file->storeAs($upload_filepath, $filename);

        $data = $request->all();
        unset($data['file']);
        $data['url'] = Storage::url($path);
        Gallery::create($data);

        return redirect()->route('admin-panel.gallery.index')->with('success', 'Galeri berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin-panel.pages.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $rules = [
            'category' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg',
        ];

        $messages = [
            'category.required' => 'Kategori wajib diisi',
            'file.image' => 'Foto harus berupa gambar',
            'file.mimes' => 'Foto harus berformat gambar (jpeg, png atau jpg)',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        if ($request->has('file')) {
            $existing_image = basename($gallery->url);
            Storage::delete($existing_image);
            // PROSES UPLOAD file DISINI
            $file = $request->file('file');
            $filename = time() . '.jpg';
            $upload_filepath = 'images/gallery'; // Update the upload directory as per your requirement
            $path = $file->storeAs($upload_filepath, $filename);
            unset($data['file']);
            $data['url'] = Storage::url($path);
        }

        $gallery->update($data);

        return redirect()->route('admin-panel.gallery.index')->with('success', 'Galeri berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $existing_image = basename($gallery->url);
        Storage::delete($existing_image);

        $gallery->delete();

        return redirect()->back()->with('success', 'Galeri berhasil dihapus!');
    }
}
