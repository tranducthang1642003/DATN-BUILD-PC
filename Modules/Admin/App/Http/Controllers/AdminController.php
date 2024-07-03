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
        $lastMonthEnd = Carbon::now()->subDays(30)->startOfDay();// 2024-06-01
        $currentMonthStart = Carbon::now()->subMonths(1)->endOfMonth(); //2024-06-30
        $lastMonthStart = Carbon::now()->subDays(60)->startOfDay(); //2024-05-02
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
