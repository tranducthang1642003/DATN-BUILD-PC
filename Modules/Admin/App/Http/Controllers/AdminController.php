<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\CarbonPeriod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Auth\Entities\User;
use Modules\Order\Entities\Order_items;
use Modules\Order\Entities\Orders;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Product\Entities\Product;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lastMonthEnd = Carbon::now()->subDays(30)->startOfDay();
        $currentMonthStart = Carbon::now()->endOfDay();
        $lastMonthStart = Carbon::now()->subDays(60)->startOfDay();
        // dd($lastMonthStart,  $currentMonthStart, $lastMonthEnd);
        $totalRevenueCurrentMonth = Orders::whereBetween('order_date', [$lastMonthEnd, $currentMonthStart])
            ->sum('total_amount');
        $totalRevenueLastMonth = Orders::whereBetween('order_date', [$lastMonthStart, $lastMonthEnd])
            ->sum('total_amount');
        $rateRevenue = 0;
        if ($totalRevenueLastMonth != 0) {
            $rateRevenue = (($totalRevenueCurrentMonth - $totalRevenueLastMonth) / $totalRevenueLastMonth) * 100;
        }
        $totalOrdersCurrentMonth = Orders::whereBetween('order_date', [$lastMonthEnd, $currentMonthStart])
            ->count();
        $totalOrdersLastMonth = Orders::whereBetween('order_date', [$lastMonthStart, $lastMonthEnd])
            ->count();
        $rateOrders = 0;
        if ($totalOrdersLastMonth != 0) {
            $rateOrders = (($totalOrdersCurrentMonth - $totalOrdersLastMonth) / $totalOrdersLastMonth) * 100;
        }
        $totalProductsSoldCurrentMonth = Order_items::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereBetween('orders.order_date', [$lastMonthEnd, $currentMonthStart])
            ->sum('order_items.quantity');
        $totalProductsSoldLastMonth = Order_items::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereBetween('orders.order_date', [$lastMonthStart, $lastMonthEnd])
            ->sum('order_items.quantity');
        $rateProducts = 0;
        if ($totalRevenueLastMonth != 0) {
            $rateProducts = (($totalProductsSoldCurrentMonth - $totalProductsSoldLastMonth) / $totalProductsSoldLastMonth) * 100;
        }
        $newUsersCountCurrentMonth = User::whereBetween('created_at', [$lastMonthEnd, $currentMonthStart])
            ->count();
        $newUsersCountLastMonth = User::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])
            ->count();
        $rateUsers = 0;
        if ($newUsersCountLastMonth != 0) {
            $rateUsers = (($newUsersCountCurrentMonth - $newUsersCountLastMonth) / $newUsersCountLastMonth) * 100;
        }
        $currentMonthRevenueData = $this->getChartData('revenue', $lastMonthEnd, $currentMonthStart);
        $currentMonthOrdersData = $this->getChartData('new_orders', $lastMonthEnd, $currentMonthStart);
        $currentMonthSoldProductsData = $this->getChartData('sold_products', $lastMonthEnd, $currentMonthStart);
        $currentMonthNewCustomersData = $this->getChartData('new_customers', $lastMonthEnd, $currentMonthStart);
        $lastMonthRevenueData = $this->getChartData('revenue', $lastMonthStart, $lastMonthEnd);
        $lastMonthOrdersData = $this->getChartData('new_orders', $lastMonthStart, $lastMonthEnd);
        $lastMonthSoldProductsData = $this->getChartData('sold_products', $lastMonthStart, $lastMonthEnd);
        $lastMonthNewCustomersData = $this->getChartData('new_customers', $lastMonthStart, $lastMonthEnd);

        //================================================

        $orders = Orders::with('items.product')->get();
        $order = Orders::All();

        // Tạo mảng để tính tổng số lượng và tổng tiền bán được của từng sản phẩm
        $productQuantities = [];
        $productRevenues = [];

        foreach ($orders as $order) {
            foreach ($order->items as $item) {
                $productId = $item->product_id;
                $quantity = $item->quantity;
                $price = $item->price;

                if (isset($productQuantities[$productId])) {
                    $productQuantities[$productId] += $quantity;
                } else {
                    $productQuantities[$productId] = $quantity;
                }

                $revenue = $quantity * $price;
                if (isset($productRevenues[$productId])) {
                    $productRevenues[$productId] += $revenue;
                } else {
                    $productRevenues[$productId] = $revenue;
                }
            }
        }

        // Sắp xếp mảng theo số lượng bán và lấy top 5 sản phẩm bán chạy
        arsort($productQuantities);
        $topProductsByQuantity = array_slice($productQuantities, 0, 5, true);

        // Sắp xếp mảng theo doanh thu và lấy top 5 sản phẩm doanh thu cao nhất
        arsort($productRevenues);
        $topProductsByRevenue = array_slice($productRevenues, 0, 5, true);

        // Lấy thông tin chi tiết của các sản phẩm trong top 5 bán chạy nhất
        $topProductIdsByQuantity = array_keys($topProductsByQuantity);
        $topProductDetailsByQuantity = Product::with('primaryImage')
            ->whereIn('id', $topProductIdsByQuantity)
            ->select('id', 'product_name', 'product_code')
            ->get();

        // Lấy thông tin chi tiết của các sản phẩm trong top 5 doanh thu cao nhất
        $topProductIdsByRevenue = array_keys($topProductsByRevenue);
        $topProductDetailsByRevenue = Product::with('primaryImage')
            ->whereIn('id', $topProductIdsByRevenue)
            ->select('id', 'product_name', 'product_code')
            ->get();

        // Lấy số lượng đã bán và tổng tiền bán được của từng sản phẩm trong top 5 bán chạy nhất
        foreach ($topProductDetailsByQuantity as $product) {
            $productId = $product->id;
            $product->sold_quantity = $topProductsByQuantity[$productId];
            $product->total_revenue = $product->sold_quantity * $productRevenues[$productId];
        }

        // Sắp xếp lại mảng $topProductDetailsByQuantity theo số lượng đã bán giảm dần
        $topProductDetailsByQuantity = $topProductDetailsByQuantity->sortByDesc(function ($product) {
            return $product->sold_quantity;
        })->values()->all();

        // Lấy số lượng đã bán và tổng tiền bán được của từng sản phẩm trong top 5 doanh thu cao nhất
        foreach ($topProductDetailsByRevenue as $product) {
            $productId = $product->id;
            $product->sold_quantity = $productQuantities[$productId];
            $product->total_revenue = $product->sold_quantity * $topProductsByRevenue[$productId];
        }

        // Sắp xếp lại mảng $topProductDetailsByRevenue theo tổng tiền bán giảm dần
        $topProductDetailsByRevenue = $topProductDetailsByRevenue->sortByDesc(function ($product) {
            return $product->total_revenue;
        })->values()->all();

        $statuses = Orders::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
        // dd($statuses);
        return view('admin.dashboard.dashboard', compact(
            'totalRevenueCurrentMonth',
            'totalOrdersCurrentMonth',
            'totalProductsSoldCurrentMonth',
            'newUsersCountCurrentMonth',
            'rateRevenue',
            'rateOrders',
            'rateProducts',
            'rateUsers',
            'currentMonthRevenueData',
            'currentMonthOrdersData',
            'currentMonthSoldProductsData',
            'currentMonthNewCustomersData',
            'totalRevenueLastMonth',
            'totalOrdersLastMonth',
            'totalProductsSoldLastMonth',
            'newUsersCountLastMonth',
            'lastMonthRevenueData',
            'lastMonthOrdersData',
            'lastMonthSoldProductsData',
            'topProductDetailsByQuantity',
            'topProductDetailsByRevenue',
            'statuses'
        ));
    }

    private function getChartData($type, $startDate, $endDate)
    {
        $dates = [];
        $data = [];
        $interval = CarbonPeriod::create($startDate, $endDate);
        foreach ($interval as $date) {
            $dates[] = $date->format('Y-m-d');
        }
        switch ($type) {
            case 'revenue':
                $results = Orders::selectRaw('DATE(order_date) as date, SUM(total_amount) as total')
                    ->whereBetween('order_date', [$startDate, $endDate])
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get();
                break;
            case 'new_orders':
                $results = Orders::selectRaw('DATE(order_date) as date, COUNT(*) as total')
                    ->whereBetween('order_date', [$startDate, $endDate])
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get();
                break;
            case 'sold_products':
                $results = Order_items::join('orders', 'order_items.order_id', '=', 'orders.id')
                    ->selectRaw('DATE(orders.order_date) as date, SUM(order_items.quantity) as total')
                    ->whereBetween('orders.order_date', [$startDate, $endDate])
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get();
                break;
            case 'new_customers':
                $results = User::selectRaw('DATE(created_at) as date, COUNT(*) as total')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get();
                break;
            default:
                $results = collect();
                break;
        }
        foreach ($dates as $date) {
            $result = $results->firstWhere('date', $date);
            $data[] = $result ? $result->total : 0;
        }

        return json_encode([
            'labels' => $dates,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function product()
    {
        return view('admin.product.product');
    }

    public function add_product()
    {
        return view('admin.category.add');
    }

    public function login_admin()
    {
        return view('admin.login.admin_login');
    }
    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin.product.product');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin::product.add');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
