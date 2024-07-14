<?php

namespace Modules\Settings\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\settings\Entities\menu;
use Modules\settings\Entities\ImageType;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');
        $menusQuery = menu::query();
        if ($startDate && $endDate) {
            $menusQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($keyword) {
            $menusQuery->where('name', 'like', '%' . $keyword . '%');
        }
        $menus = $menusQuery->paginate(10);
        return view('admin.menu.menu', compact('menus'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);

        $menus = new menu();
        if ($image = $request->file('image')) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image_menu'), $fileName);
            $menus->image = 'image_menu/' . $fileName;
        }
        $menus->name = $request->input('name');
        $menus->url = $request->input('url');
        $menus->save();

        return redirect()->route('menu.index')
            ->with('success', 'menu đã được tạo thành công!.');
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);

        $menu = menu::findOrFail($id);
        if ($image = $request->file('image')) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image_menu'), $fileName);
            $menu->image = 'image_menu/' . $fileName;
        }
        $menu->name = $request->input('name');
        $menu->url = $request->input('url');
        $menu->save();

        return redirect()->route('menu.index')
            ->with('success', 'menu has been updated successfully.');
    }

    public function destroy($id)
    {
        $menu = menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', 'menu has been deleted successfully.');
    }
}
