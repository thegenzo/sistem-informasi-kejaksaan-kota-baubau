<?php

namespace App\Http\Controllers;

use App\Models\FooterLink;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class FooterLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = FooterLink::all();

        return view('admin-panel.pages.footer-link.index', compact('footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.pages.footer-link.create');
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
            'name'                  => 'required',
            'url'                   => 'required',
        ];

        $messages = [
            'name.required'             => 'Nama footer wajib diisi',
            'url.required'              => 'URL footer wajib diisi',           
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        FooterLink::create($data);

        Alert::success('Berhasil', 'Tautan Footer berhasil dibuat!');

        return redirect()->route('admin-panel.footer-link.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function show(FooterLink $footerLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterLink $footerLink)
    {
        return view('admin-panel.pages.footer-link.edit', compact('footerLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterLink $footerLink)
    {
        $rules = [
            'name'                  => 'required',
            'url'                   => 'required',
        ];

        $messages = [
            'name.required'             => 'Nama footer wajib diisi',
            'url.required'              => 'URL footer wajib diisi',           
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $footerLink->update($data);

        Alert::success('Berhasil', 'Tautan Footer berhasil diubah!');

        return redirect()->route('admin-panel.footer-link.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterLink $footerLink)
    {
        $footerLink->delete();

        Alert::success('Berhasil', 'Tautan Footer berhasil dihapus!');

        return back();
    }
}
