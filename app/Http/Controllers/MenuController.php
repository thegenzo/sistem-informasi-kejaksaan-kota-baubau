<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::where('level', 0)->orderBy('menu_order', 'asc')->get();

        $allRoutes = Route::getRoutes();
        $allPages = Page::all();

        return view('admin-panel.pages.menu.index', compact('menus', 'allRoutes', 'allPages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $allParent = Menu::where('level', 0)->orderBy('menu_order', 'asc')->get();
        $isSubmenu = $request->has('submenu');
        $parent_id = $request->input('parent_id');
        $allRoutes = Route::getRoutes();
        $allPages = Page::all();
        return view('admin-panel.pages.menu.create', compact('allParent', 'isSubmenu', 'parent_id', 'allRoutes', 'allPages'));
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
            'name'                      => 'required',
            'target_route'              => 'nullable',
            'target_page'               => 'nullable|exists:pages,id',
            'type'                      => 'required',
            'parent'                    => 'nullable|exists:menus,id'
        ];

        $messages = [
            'name.required'                 => 'Nama menu wajib diisi',
            'target_page.exists'            => 'Target Halaman harus sesuai',
            'type.required'                 => 'Tipe menu harus diisi',
            'parent.exists'                 => 'Parent menu harus sesuai',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        
        if($data['parent'] == null){
            $level = 0;
            $lastCount = Menu::where('level', 0)->count();
        }
        else {
            $level = 1;
            $lastCount = Menu::where('parent', $data['parent'])->count();
        }

        if($data['type'] == 'route'){
            $target = $data['target_route'];
        }
        if($data['type'] == 'page'){
            $target = $data['target_page'];
        }
        if($data['type'] == 'link'){
            $target = $data['target_link'];
        }
        if($data['type'] == 'dropdown'){
            $target = "#";
        }

        $create = [
            'menu_order' => $lastCount,
            'level' => $level,
            'parent' => $data['parent'],
            'name' => $data['name'],
            'type' => $data['type'],
            'target' => $target
        ];

        Menu::create($create);

        return redirect()->route('admin-panel.menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $allParent = Menu::where('level', 0)->orderBy('menu_order', 'asc')->get();
        $allRoutes = Route::getRoutes();
        $allPages = Page::all();
        return view('admin-panel.pages.menu.edit', compact('menu', 'allParent', 'allRoutes', 'allPages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $data = $request->all();
        if($data['type'] == 'dropdown' && $menu['type'] == $data['type']){
            $result = null;
            parse_str($data['sub_menu_order'], $result);
            $data['sub_menu_order'] = $result['childs'];
        }
        else {
            $data['sub_menu_order'] = null;
        }

        $rules = [
            'name'                      => 'required',
            'target'                    => 'required',
            'type'                      => 'required',
            'sub_menu_order'            => 'nullable|array',
        ];

        $messages = [
            'name.required'                 => 'Nama menu wajib diisi',
            'target.exists'                 => 'Target harus sesuai',
            'type.required'                 => 'Tipe menu harus diisi',
            'sub_menu_order.array'          => 'Tipe menu harus diisi',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if($validator->fails()) {
            if($request->ajax()){
                return response()->json($validator->messages(), 405);
            }
            else {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
        }

        if($menu['type'] == 'dropdown' && $data['type'] !== 'dropdown'){
            $target = 0;
        }

        $update = [
            'name' => $data['name'],
            'type' => $data['type'],
            'target' => $data['target']
        ];

        $menu->update($update);

        if($data['type'] == 'dropdown' && !empty($data['sub_menu_order'])){
            foreach($data['sub_menu_order'] as $key => $id){
                Menu::find($id)->update(['menu_order' => $key]);
            }
        }

        if($request->ajax()){
            return response()->json(['status' => 'success']);
        }
        else {

            return redirect()->route('admin-panel.menu.edit', $menu->id)->with('success', 'Menu berhasil diubah!');
        }
    }

    public function updateParentMenuOrder(Request $request)
    {
        $data = $request->all();
        $result = null;
        parse_str($data['menu_order'], $result);
        $data['menu_order'] = $result['menus'];

        $rules = [
            'menu_order'            => 'array',
        ];

        $messages = [
            'menu_order.array'              => 'Tipe menu harus diisi',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if($validator->fails()) {
            return response()->json($validator->messages(), 405);
        }

        foreach($data['menu_order'] as $key => $id){
            Menu::find($id)->update(['menu_order' => $key]);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if($menu->child_menu()->count() > 0) {
            return redirect()->back()->with('failed', 'Menu ini memiliki sub-menu, harap hapus sub-menu terlebih dahulu!');
        }
        else {
            $menu->delete();

            return redirect()->back()->with('success', 'Menu berhasil dihapus!');
        }
    }
}
