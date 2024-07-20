<?php

namespace Modules\BuildPC\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\BuildPC\Entities\Configuration;
use Modules\BuildPC\Entities\ConfigurationItem;
use Modules\BuildPC\Repositories\BuildPCRepositoryInterface;
use Modules\Cart\Entities\CartItem;
use Modules\Product\Entities\Product;
use Modules\Settings\Entities\Menu;


class BuildPCController extends Controller
{
    protected $BuildPCRepository;

    public function __construct(BuildPCRepositoryInterface $BuildPCRepository)
    {
        $this->BuildPCRepository = $BuildPCRepository;
    }

    public function index()
    {
        $userId = Auth::id();
        $configurationItems = session()->get('configuration_items', []);
        $menuItems = Menu::all();


        // Calculate total price
        $totalPrice = collect($configurationItems)->sum(function ($item) {
            return $item['product']->price * $item['quantity'];
        });

        // Fetch primary images for each product in configurationItems
        foreach ($configurationItems as &$item) {
            $product = Product::findOrFail($item['product_id']);
            $primaryImage = $product->images()->where('is_primary', true)->first();

            if ($primaryImage) {
                $item['image_path'] = $primaryImage->image_path;
            } else {
                // Handle case where no primary image is found, provide a default path
                $item['image_path'] = asset('images/default-product-image.jpg');
            }
        }

        // Fetch featured categories from repository
        $Productandcategory = $this->BuildPCRepository->getFeaturedCategories();

        // Pass data to the view
        return view('public.buildPC.index', compact('Productandcategory', 'configurationItems', 'totalPrice','menuItems'));
    }

    public function create()
    {
        return view('buildpc::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $configurationItems = session()->get('configuration_items', []);

        $configurationItems[] = [
            'product_id' => $product->id,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'product' => $product,
        ];

        session()->put('configuration_items', $configurationItems);

        return redirect()->back()->with('success', 'Linh kiện ' . $product->product_name . ' đã được thêm vào cấu hình thành công.');
    }

    public function saveConfiguration()
    {
        $configurationItems = session()->get('configuration_items', []);

        if (empty($configurationItems)) {
            return redirect()->back()->with('error', 'Không có linh kiện nào để lưu.');
        }

        $configuration = Configuration::firstOrCreate(['user_id' => auth()->id()], []);

        foreach ($configurationItems as $item) {
            $configurationItem = new ConfigurationItem([
                'configuration_id' => $configuration->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);

            $configurationItem->save();
        }

        $totalPrice = $configuration->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $configuration->update(['total_price' => $totalPrice]);

        session()->forget('configuration_items');

        return redirect()->route('buildpc')->with('success', 'Cấu hình đã được lưu thành công.');
    }

    public function removeItemFromConfiguration($index)
    {
        $configurationItems = session()->get('configuration_items', []);

        if (isset($configurationItems[$index])) {
            unset($configurationItems[$index]);
            session()->put('configuration_items', $configurationItems);
        }

        return redirect()->back()->with('success', 'Linh kiện đã được xóa khỏi cấu hình.');
    }

    public function addToCartMultiple(Request $request)
    {
        $configurationItems = session()->get('configuration_items', []);

        foreach ($configurationItems as $item) {
            $product = Product::findOrFail($item['product_id']);

            CartItem::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price,
            ]);
        }

        session()->forget('configuration_items');

        return redirect()->route('cart.index')->with('success', 'Đã thêm các linh kiện vào giỏ hàng thành công.');
    }
}
