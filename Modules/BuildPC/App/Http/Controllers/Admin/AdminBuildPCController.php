<?php

namespace Modules\BuildPC\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Product\Entities\ProductImage;
use Modules\BuildPC\Entities\Configuration;
use Modules\BuildPC\Entities\ConfigurationItem;

class AdminBuildPCController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Admin - Build PC';
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword');

        $configurationQuery = Configuration::query();

        if ($startDate && $endDate) {
            $configurationQuery->whereBetween('created_at', [$startDate, $endDate]);
        }

        if ($keyword) {
            $configurationQuery->where('name', 'like', '%' . $keyword . '%');
        }

        $configurations = $configurationQuery->with('user')->paginate(13);

        return view('admin.buildpc.buildpc', compact('configurations', 'title'));
    }

    public function show($id)
    {
        $title = 'Admin - Build PC - Chi tiết';
        $configuration = Configuration::with('items.product')->findOrFail($id);
        $configurationItems = $configuration->items;

        foreach ($configurationItems as $item) {
            $primaryImage = $item->product->images()->where('is_primary', true)->first();

            if ($primaryImage) {
                $item->image_path = $primaryImage->image_path;
            } else {
                $item->image_path = asset('images/default-product-image.jpg');
            }
        }
        return view('admin.buildpc.show', compact('configurationItems', 'configuration', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.buildpc.show');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }
}
