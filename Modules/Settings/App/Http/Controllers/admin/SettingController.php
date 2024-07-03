<?php

namespace Modules\Settings\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Setting\Entities\Setting;
use Modules\Settings\Entities\Settings;

class SettingController extends Controller
{
    public function index_banner(Request $request)
    {
        $settingsQuery = Settings::All();
        // dd($settingsQuery);
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        if ($startDate && $endDate) {
            $settingsQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        $keyword = $request->input('keyword');
        if ($keyword) {
            $settingsQuery->where('Setting_name', 'like', '%' . $keyword . '%');
        }
        $settings = $settingsQuery;
        return view('admin.setting.banner', compact('settings'));
    }
    public function edit_banner($id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $Setting = Settings::with('brand', 'category')->findOrFail($id);
        $SettingImages = $Setting->SettingImages()->orderBy('is_primary', 'desc')->get();
        $primaryImage = $SettingImages->where('is_primary', true)->first();
        $secondaryImages = $SettingImages->where('is_primary', false);
        return view('admin.Setting.edit', compact('Setting', 'brands', 'categories', 'primaryImage', 'secondaryImages'));
    }


    public function update_banner(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Setting_name' => 'required|string',
            'Setting_code' => 'required|string',
            'color' => 'required|string',
            'quantity' => 'required|numeric',
            'sale' => 'required|numeric',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'specifications' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp|max:2048',
            'additional_images.*' => 'nullable|image|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $Setting = Settings::findOrFail($id);
            $Setting->Setting_name = $request->input('Setting_name');
            $Setting->slug = Str::slug($request->input('Setting_name'), '-');
            $Setting->Setting_code = $request->input('Setting_code');
            $Setting->color = $request->input('color');
            $Setting->quantity = $request->input('quantity');
            $Setting->sale = $request->input('sale');
            $Setting->featured = $request->input('featured') === 'yes';
            $Setting->status = $request->input('status');
            $Setting->category_id = $request->input('category_id');
            $Setting->brand_id = $request->input('brand_id');
            $Setting->price = $request->input('price');
            $Setting->description = $request->input('description');
            $Setting->short_description = $request->input('specifications');
            $Setting->save();

            if ($request->hasFile('image')) {
                $imagePrimary = $request->file('image');
                $imagePrimaryName = time() . '_' . $imagePrimary->getClientOriginalName();
                $imagePrimary->move(public_path('images'), $imagePrimaryName);
                $imagePrimaryPath = 'images/' . $imagePrimaryName;

                if ($Setting->primaryImage) {
                    Storage::disk('public')->delete($Setting->primaryImage->image_path);
                    $Setting->primaryImage->image_path = $imagePrimaryPath;
                    $Setting->primaryImage->save();
                } else {
                    // $SettingImage = new SettingImage();
                    // $SettingImage->Setting_id = $Setting->id;
                    // $SettingImage->image_path = $imagePrimaryPath;
                    // $SettingImage->is_primary = true;
                    // $SettingImage->save();
                }
            }

            $imageSecondaryPaths = [];
            if ($request->hasFile('additional_images')) {
                foreach ($request->file('additional_images') as $image) {
                    $imageSecondaryName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageSecondaryName);
                    $imageSecondaryPath = 'images/' . $imageSecondaryName;
                    // $secondaryImage = new SettingImage();
                    // $secondaryImage->Setting_id = $Setting->id;
                    // $secondaryImage->image_path = $imageSecondaryPath;
                    // $secondaryImage->is_primary = false;
                    // $secondaryImage->save();
                    // $imageSecondaryPaths[] = $imageSecondaryPath;
                }
            }
            if (!empty($Setting->additionalImages)) {
                foreach ($Setting->additionalImages as $image) {
                    if (!in_array($image->image_path, $imageSecondaryPaths)) {
                        Storage::disk('public')->delete($image->image_path);
                        $image->delete();
                    }
                }
            }



            return redirect()->route('Setting')->with('success', 'Cập nhật sản phẩm thành công!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors('Cập nhật sản phẩm thất bại.');
        }
    }





    public function add_banner()
    {
        $brands = Brand::All();
        $categories = Category::all();
        $Setting = Settings::with('brand', 'category', 'image');
        return view('admin.Setting.add', compact('Setting', 'brands', 'categories'));
    }
    public function add_banners(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Setting_name' => 'required|string',
            'Setting_code' => 'required|string',
            'color' => 'required|string',
            'quantity' => 'required|numeric',
            'sale' => 'required|numeric',
            'featured' => 'required|in:yes,no',
            'status' => 'required|in:1,2,3',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'specifications' => 'nullable',
            'image_primary' => 'nullable|image|mimes:jpg,jpeg,png,bmp|max:2048',
            'image_secondary.*' => 'nullable|image|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);
        // dd($validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imagePrimary = $request->file('image_primary');
        $imagePrimaryName = time() . '_' . $imagePrimary->getClientOriginalName();
        $imagePrimary->move(public_path('images'), $imagePrimaryName);
        $imagePrimaryPath = 'images/' . $imagePrimaryName;

        $imageSecondaryPaths = [];
        if ($request->hasFile('image_secondary')) {
            foreach ($request->file('image_secondary') as $image) {
                $imageSecondaryName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageSecondaryName);
                $imageSecondaryPaths[] = 'images/' . $imageSecondaryName;
            }
        }

        try {
            $Setting = new Settings();
            $Setting->Setting_name = $request->input('Setting_name');
            $Setting->slug = Str::slug($request->input('Setting_name'), '-');
            $Setting->Setting_code = $request->input('Setting_code');
            $Setting->color = $request->input('color');
            $Setting->quantity = $request->input('quantity');
            $Setting->sale = $request->input('sale');
            $Setting->featured = $request->input('featured') === 'yes';
            $Setting->status = $request->input('status');
            $Setting->category_id = $request->input('category_id');
            $Setting->brand_id = $request->input('brand_id');
            $Setting->price = $request->input('price');
            $Setting->description = $request->input('description');
            $Setting->short_description = $request->input('specifications');
            $Setting->save();

            // $primaryImage = new SettingImage();
            // $primaryImage->Setting_id = $Setting->id;
            // $primaryImage->image_path = $imagePrimaryPath;
            // $primaryImage->is_primary = true;
            // $primaryImage->save();

            foreach ($imageSecondaryPaths as $imageSecondaryPath) {
                // $secondaryImage = new SettingImage();
                // $secondaryImage->Setting_id = $Setting->id;
                // $secondaryImage->image_path = $imageSecondaryPath;
                // $secondaryImage->is_primary = false;
                // $secondaryImage->save();
            }

            return redirect()->route('Setting')->with('success', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors('Thêm sản phẩm thất bại.');
        }
    }


    public function destroy_banner($id)
    {
        try {
            $Setting = Settings::findOrFail($id);
            if ($Setting->primaryImage) {
                Storage::disk('public')->delete($Setting->primaryImage->image_path);
                $Setting->primaryImage->delete();
            }
            foreach ($Setting->additionalImages as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
            $Setting->delete();
            return redirect()->route('Setting.index')->with('success', 'Setting deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to delete Setting.');
        }
    }
}
