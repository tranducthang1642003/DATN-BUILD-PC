<?php

namespace Modules\Settings\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\Settings\Entities\Settings;
use Modules\Settings\Entities\ImageType;

class SettingController extends Controller
{
    public function index()
    {
        $title = 'Admin - Cài đặt banner';
        $imageTypes = ImageType::all();
        $settingsBanner = Settings::with('imageType')->ofType('Banner')->get();
        $settingsLogo = Settings::with('imageType')->ofType('Logo')->get();
        $settingsPoster = Settings::with('imageType')->ofType('Poster')->get();
        $settingsBannerHorizontal = Settings::with('imageType')->ofType('banner_horizontal')->get();
        return view('admin.setting.setting', compact('settingsBanner', 'settingsLogo', 'settingsPoster', 'settingsBannerHorizontal', 'imageTypes', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'images_url' => 'nullable|image|mimes:webp,jpg,jpeg,png,bmp|max:2048',
            'image_type_id' => 'required|exists:image_types,id'
        ]);
        if ($request->hasFile('images_url')) {
            $imageSetting = $request->file('images_url');
            $imageSettingName = time() . '_' . $imageSetting->getClientOriginalName();
            $imageSetting->move(public_path('setting'), $imageSettingName);
            $imageSettingPath = 'setting/' . $imageSettingName;
        } else {
            $imageSettingPath = null;
        }
        $setting = new Settings();
        $setting->images_url = $imageSettingPath;
        $setting->image_type_id = $request->input('image_type_id');
        $setting->name = $request->input('name');
        $setting->save();
        return redirect()->route('settings.index')
            ->with('success', 'Ảnh đã được thêm thành công!.');
    }

    public function update(Request $request, $id)
    {
        $setting = Settings::findOrFail($id);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string',
        ]);
        if ($request->hasFile('image')) {
            $imageSetting = $request->file('image');
            $imageSettingName = time() . '_' . $imageSetting->getClientOriginalName();
            $imageSetting->move(public_path('setting'), $imageSettingName);
            $imageSettingPath = 'setting/' . $imageSettingName;
            if ($setting->images_url) {
                Storage::disk('public')->delete($setting->images_url);
            }
        }
        $setting->images_url = $imageSettingPath;
        $setting->name = $request->input('name');
        $setting->save();
        if ($setting->save()) {
            return redirect()->route('settings.index')->with('success', 'CẬp nhật ảnh thành công!');
        } else {
            return redirect()->back()->withInput()->withErrors('errors', 'Cập nhật ảnh thất bại!');
        }
    }


    public function destroy($id)
    {
        $setting = Settings::findOrFail($id);
        Storage::disk('public')->delete($setting->images_url);
        $setting->delete();

        return redirect()->route('settings.index')
            ->with('success', 'Ảnh đã được xóa!');
    }
    public function store_category(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $imageType = new ImageType();
        $imageType->name = $request->input('name');
        $imageType->save();
        return redirect()->route('settings.index')
            ->with('success', 'Danh mục ảnh được tạo thành công!');
    }

    public function update_category(Request $request, $id)
    {
        $imageType = ImageType::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
        ]);
        $imageType->name = $request->input('name');
        $imageType->save();
        if ($imageType->save()) {
            return redirect()->route('settings.index')->with('success', 'Cập nhật danh mục ảnh thành công!');
        } else {
            return redirect()->back()->withInput()->withErrors('errors', 'Cập nhật danh mục ảnh thất bại!');
        }
    }


    public function destroy_category($id)
    {
        $imageType = ImageType::findOrFail($id);
        $imageType->delete();

        return redirect()->route('settings.index')
            ->with('success', 'Đã xóa danh mục ảnh!');
    }
}
