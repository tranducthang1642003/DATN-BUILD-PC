<?php

namespace Modules\menus\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\settings\Entities\menu;
use Modules\settings\Entities\ImageType;

class MenuController extends Controller
{
    public function index()
    {
        $imageType = ImageType::all();
        $menus = menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        // Hiển thị form để thêm menu mới
        $imageTypes = ImageType::all();
        return view('menus.create', compact('imageTypes'));
    }

    public function store(Request $request)
    {
        // Lưu menu mới vào cơ sở dữ liệu
        $request->validate([
            'name' => 'required|string',
            'images_url' => 'required|string',
            'image_type_id' => 'required|exists:image_types,id'
        ]);

        menu::create($request->all());

        return redirect()->route('menus.index')
            ->with('success', 'menu has been created successfully.');
    }

    public function edit($id)
    {
        // Hiển thị form để chỉnh sửa menu
        $menu = menu::findOrFail($id);
        $imageTypes = ImageType::all();
        return view('menus.edit', compact('menu', 'imageTypes'));
    }

    public function update(Request $request, $id)
    {
        // Cập nhật menu vào cơ sở dữ liệu
        $request->validate([
            'name' => 'required|string',
            'images_url' => 'required|string',
            'image_type_id' => 'required|exists:image_types,id'
        ]);

        $menu = menu::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('menus.index')
            ->with('success', 'menu has been updated successfully.');
    }

    public function destroy($id)
    {
        // Xóa menu khỏi cơ sở dữ liệu
        $menu = menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')
            ->with('success', 'menu has been deleted successfully.');
    }
}
