<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPanelController extends Controller
{
    public function index(Request $request)
    {
        $site_config_path = 'site-config.json'; // Update the file path as per your local storage setup
        if (Storage::exists($site_config_path)) {
            $site_config = json_decode(Storage::get($site_config_path));
        } else {
            $site_config = [];
        }
        $newsCount = News::all()->count();
        $documentCount = Document::all()->count();
        return view('admin-panel.pages.dashboard', compact('site_config', 'newsCount', 'documentCount'));
    }

    public function site_setting(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $site_config = json_encode($data);

        $upload_filepath = 'site-config.json'; // Update the file path as per your local storage setup
        Storage::makeDirectory(dirname($upload_filepath));
        Storage::put($upload_filepath, $site_config);

        return redirect()->route('admin-panel.dashboard');
    }
}
