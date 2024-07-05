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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the current user's configuration
        $userId = Auth::id();
        $configuration = Configuration::where('user_id', $userId)->with('items.product')->first();

        if (!$configuration) {
            return redirect()->route('buildpc')->with('error', 'Bạn chưa có cấu hình nào.');
        }
        $Productandcategory = $this->BuildPCRepository->getFeaturedCategories();
        return view('public.buildPC.index', compact('Productandcategory', 'configuration'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buildpc::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $configuration = Configuration::firstOrCreate(['user_id' => auth()->id()], []);

        $configurationItem = new ConfigurationItem([
            'configuration_id' => $configuration->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        $configurationItem->save();
        $totalPrice = $configuration->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $configuration->update(['total_price' => $totalPrice]);

        return redirect()->back()->with('success', 'Linh kiện ' . $product->product_name . ' đã được thêm vào cấu hình thành công.');
    }

   
    public function show($id)
    {
        return view('buildpc::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('buildpc::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
