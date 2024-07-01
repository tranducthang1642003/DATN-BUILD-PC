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

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentMonthStart = Carbon::now()->startOfMonth();
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
        $totalRevenueCurrentMonth = Orders::whereBetween('order_date', [$currentMonthStart, $currentMonthStart->copy()->endOfMonth()])
            ->sum('total_amount');
        $totalRevenueLastMonth = Orders::whereBetween('order_date', [$lastMonthStart, $lastMonthEnd])
            ->sum('total_amount');
        $rateRevenue = 0;
        if ($totalRevenueLastMonth != 0) {
            $rateRevenue = (($totalRevenueCurrentMonth - $totalRevenueLastMonth) / $totalRevenueLastMonth) * 100;
        }
        $totalOrdersCurrentMonth = Orders::whereBetween('order_date', [$currentMonthStart, $currentMonthStart->copy()->endOfMonth()])
            ->count();
        $totalOrdersLastMonth = Orders::whereBetween('order_date', [$lastMonthStart, $lastMonthEnd])
            ->count();
        $rateOrders = 0;
        if ($totalOrdersLastMonth != 0) {
            $rateOrders = (($totalOrdersCurrentMonth - $totalOrdersLastMonth) / $totalOrdersLastMonth) * 100;
        }
        $totalProductsSoldCurrentMonth = Order_items::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereBetween('orders.order_date', [$currentMonthStart, $currentMonthStart->copy()->endOfMonth()])
            ->sum('order_items.quantity');
        $totalProductsSoldLastMonth = Order_items::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereBetween('orders.order_date', [$lastMonthStart, $lastMonthEnd])
            ->sum('order_items.quantity');
        $rateProducts = 0;
        if ($totalRevenueLastMonth != 0) {
            $rateProducts = (($totalProductsSoldCurrentMonth - $totalProductsSoldLastMonth) / $totalProductsSoldLastMonth) * 100;
        }
        $newUsersCountCurrentMonth = User::whereBetween('created_at', [$currentMonthStart, $currentMonthStart->copy()->endOfMonth()])
            ->count();
        $newUsersCountLastMonth = User::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])
            ->count();
        $rateUsers = 0;
        if ($newUsersCountLastMonth != 0) {
            $rateUsers = (($newUsersCountCurrentMonth - $newUsersCountLastMonth) / $newUsersCountLastMonth) * 100;
        }
        $currentMonthRevenueData = $this->getChartData('revenue', $currentMonthStart, $currentMonthStart->copy()->endOfMonth());
        $currentMonthOrdersData = $this->getChartData('new_orders', $currentMonthStart, $currentMonthStart->copy()->endOfMonth());
        $currentMonthSoldProductsData = $this->getChartData('sold_products', $currentMonthStart, $currentMonthStart->copy()->endOfMonth());
        $currentMonthNewCustomersData = $this->getChartData('new_customers', $currentMonthStart, $currentMonthStart->copy()->endOfMonth());
        $lastMonthRevenueData = $this->getChartData('revenue', $lastMonthStart, $lastMonthEnd);
        $lastMonthOrdersData = $this->getChartData('new_orders', $lastMonthStart, $lastMonthEnd);
        $lastMonthSoldProductsData = $this->getChartData('sold_products', $lastMonthStart, $lastMonthEnd);
        $lastMonthNewCustomersData = $this->getChartData('new_customers', $lastMonthStart, $lastMonthEnd);
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
            'lastMonthNewCustomersData'
        ));
    }



    private function getChartData($type, $startDate, $endDate)
    {
        $dates = [];
        $data = [];

        // Tạo một khoảng thời gian từ $startDate đến $endDate
        $interval = CarbonPeriod::create($startDate, $endDate);

        // Duyệt qua từng ngày trong khoảng thời gian
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

        // Duyệt qua mảng ngày để tạo mảng dữ liệu
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
