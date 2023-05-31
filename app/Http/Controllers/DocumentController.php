<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::all();

        return view('admin-panel.pages.document.index', compact('document'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.pages.document.create');
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
            'file'          => 'required_if:type,file|mimes:csv,txt,xlx,xls,xlsx,pdf,docx,doc,ppt',
            'url'           => 'required_if:type,url',
            'type'          => 'required',
            'name'          => 'required',
            'description'   => 'required'
        ];

        $messages = [
            'file.required_if'      => 'Dokumen wajib diisi',
            'file.mimes'            => 'Dokumen harus berformat khusus (csv, txt, xlx, xls, xlsx, pdf, docx, doc, ppt)',
            'name.required'         => 'Nama dokumen wajib diisi',
            'type.required'         => 'Tipe dokumen wajib diisi',
            'description.required'  => 'Deskripsi dokumen wajib diisi',
            'url.required_if'      => 'Link / URL Wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        if ($request->input('type') == 'file') {
            $document_file = $request->file('file');
            $filename = $document_file->getClientOriginalName();
            $upload_filepath = 'documents'; // Update the upload directory as per your requirement, thank you ChatGPT :)
            $path = $document_file->storeAs($upload_filepath, $filename);

            $data = $request->all();
            unset($data['url']);
            $data['url'] = Storage::url($path);
            $data['filename'] = $document_file->getClientOriginalName();
            $data['file_size'] = $document_file->getSize();
            $data['mime_type'] = $document_file->getClientMimeType();
            Document::create($data);
        }

        else if($request->input('type') == 'url'){
            $data = $request->all();
            $data['filename'] = $data['url'];
            $data['file_size'] = null;
            $data['mime_type'] = "Link / URL";
            Document::create($data);
        }

        return redirect()->route('admin-panel.document.index')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('admin-panel.pages.document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $rules = [
            'file'          => 'mimes:csv,txt,xlx,xls,xlsx,pdf,docx,doc,ppt',
            'url'           => 'required_if:type,url',
            'type'          => 'required',
            'name'          => 'required',
            'description'   => 'required'
        ];

        $messages = [
            'file.mimes'            => 'Dokumen harus berformat khusus (csv, txt, xlx, xls, xlsx, pdf, docx, doc, ppt)',
            'name.required'         => 'Nama dokumen wajib diisi',
            'type.required'         => 'Tipe dokumen wajib diisi',
            'url.required_if'       => 'Link / URL wajib diisi',
            'description.required'  => 'Deskripsi dokumen wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        if ($request->has('file') && $request->input('type') == 'file') {
            $existing_document = basename($document->url);
            Storage::delete($existing_document);
            $document_file = $request->file('file');
            $filename = $document_file->getClientOriginalName();
            $upload_filepath = 'documents'; // Update the upload directory as per your requirement, thank you ChatGPT :)
            $path = $document_file->storeAs($upload_filepath, $filename);
            unset($data['url']);
            $data['url'] = Storage::url($path);
            $data['filename'] = $document_file->getClientOriginalName();
            $data['file_size'] = $document_file->getSize();
            $data['mime_type'] = $document_file->getClientMimeType();
        }

        if ($request->has('url') && $request->input('type') == 'url') {
            if ($document->type == 'file') {
                $existing_document = basename($document->url);
                Storage::delete($existing_document);
            }
            $data['filename'] = $data['url'];
            $data['file_size'] = null;
            $data['mime_type'] = "Link / URL";
        }


        $document->update($data);

        return redirect()->route('admin-panel.document.index')->with('success', 'Dokumen berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        if($document->type == 'file'){
            $existing_document = basename($document->url);
            Storage::delete($existing_document);
        }
        $document->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus!');
    }
}
