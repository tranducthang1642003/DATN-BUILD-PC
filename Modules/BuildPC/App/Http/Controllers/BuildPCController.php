<?php

namespace Modules\BuildPC\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\BuildPC\Entities\Configuration;
use Modules\BuildPC\Entities\ConfigurationItem;
use Modules\BuildPC\Repositories\BuildPCRepositoryInterface;
use Modules\Product\Entities\Product;

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

        $totalPrice = collect($configurationItems)->sum(function ($item) {
            return $item['product']->price * $item['quantity'];
        });

        $Productandcategory = $this->BuildPCRepository->getFeaturedCategories();
        return view('public.buildPC.index', compact('Productandcategory', 'configurationItems', 'totalPrice'));
    }

    public function create()
    {
        return view('buildpc::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $configurationItems = session()->get('configuration_items', []);

        $configurationItems[] = [
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'product' => $product,
        ];

        session()->put('configuration_items', $configurationItems);

        return redirect()->back()->with('success', 'Linh kiện ' . $product->product_name . ' đã được thêm vào cấu hình thành công.');
    }

    public function show($id)
    {
        return view('buildpc::show');
    }

    public function edit($id)
    {
        return view('buildpc::edit');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    public function destroy($id)
    {
        //
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
}
