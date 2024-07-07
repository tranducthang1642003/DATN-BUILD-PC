<?php

namespace Modules\Like\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Product\Entities\Product;
use Modules\Like\Entities\wishlists;
class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::User();
        $likeItem = wishlists::where('user_id', $user->id)->with('product')->get();
        return view('public.dashboard.like',compact('likeItem'));
    }
    public function addlike(Product $product,Request $request)
    {
        $user = auth()->user();
        $productId = $request->input('product_id');
        $product = Product::find($productId);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        $existingFavorite = Wishlists::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();
    
        if ($existingFavorite) {
            // Nếu sản phẩm đã tồn tại trong danh sách yêu thích, xóa nó
            $existingFavorite->delete();
            return redirect()->route('like')->with('success', 'Đã xóa sản phẩm khỏi danh sách yêu thích.');
        } else {
            // Nếu sản phẩm chưa tồn tại trong danh sách yêu thích, thêm nó
            Wishlists::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
            return back()->with('success', 'Đã thêm sản phẩm vào danh sách yêu thích.');
        }
    }

public function deletelike(string $id)
{
    $likeItem = wishlists::find($id);
    if ($likeItem) {
        $likeItem->delete();
        return back()->with('ssmsg', 'Thêm sản phẩm yêu thích thành công');
    }else
    {
        return redirect()->route('like');
    }
    
}

}