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
        $imageTypes = ImageType::all();
        $settingsBanner = Settings::with('imageType')->ofType('Banner')->get();
        $settingsLogo = Settings::with('imageType')->ofType('Logo')->get();
        $settingsPoster = Settings::with('imageType')->ofType('Poster')->get();
        $settingsBannerHorizontal = Settings::with('imageType')->ofType('banner_horizontal')->get();
        // dd($settingsBanner);
        return view('admin.setting.setting', compact('settingsBanner', 'settingsLogo', 'settingsPoster', 'settingsBannerHorizontal', 'imageTypes'));
    }

    public function create()
    {
        // Hiển thị form để thêm setting mới
        $imageTypes = ImageType::all();
        return view('settings.create', compact('imageTypes'));
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
            ->with('success', 'Setting has been created successfully.');
    }
    public function edit($id)
    {
        // Hiển thị form để chỉnh sửa setting
        $setting = Settings::findOrFail($id);
        $imageTypes = ImageType::all();
        return view('settings.edit', compact('setting', 'imageTypes'));
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
            return redirect()->route('settings.index')->with('success', 'Chỉnh sửa thành công!');
        } else {
            return redirect()->back()->withInput()->withErrors('errors', 'Chỉnh sửa thất bại!');
        }
    }


    public function destroy($id)
    {
        $setting = Settings::findOrFail($id);
        Storage::disk('public')->delete($setting->images_url);
        $setting->delete();

        return redirect()->route('settings.index')
            ->with('success', 'Setting has been deleted successfully.');
    }
}
