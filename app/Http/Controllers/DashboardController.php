<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lead;
use App\Models\User;
use App\Models\Order;
use App\Models\Quote;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(Request $request) {
    // Get the selected time range from the request or default to "7 days"
    $range = $request->input('range', '7days');

    // Define the range filters
    $dateRanges = [
        '7days' => Carbon::today()->subDays(6)->startOfDay(), // Start of the day for 7 days ago
        'month' => Carbon::now()->startOfMonth()->startOfDay(), // Start of the current month
        '3months' => Carbon::today()->subMonths(3)->startOfDay(),
        'year' => Carbon::today()->subYear()->startOfDay(),
    ];

    // If the user selects an invalid range, default to "7days"
    $startDate = $dateRanges[$range] ?? $dateRanges['7days'];

    // Get the end date as today, but ensure the end time is at the end of the day
    $endDate = Carbon::today()->endOfDay(); // End of the current day

    // Query the leads, quotes, and orders data based on the selected date range
    $leadsCount = Lead::whereBetween('created_at', [$startDate, $endDate])->count();
    $quotesCount = Quote::whereBetween('created_at', [$startDate, $endDate])->count();
    $ordersCount = Order::whereBetween('created_at', [$startDate, $endDate])->count();
    $usersCount = User::count();

    // Query totals for all time (no date filter)
    $totalLeadsCount = Lead::count();
    $totalQuotesCount = Quote::count();
    $totalOrdersCount = Order::count();

    // Generate the days array for the selected range
    $days = collect();
    $dayCount = 0;

    // Adjust the days based on the selected range
    if ($range === 'month') {
        $dayCount = Carbon::now()->daysInMonth; // Use the number of days in the current month
    } elseif ($range === '3months') {
        $dayCount = 90; // Approx 90 days for 3 months
    } elseif ($range === 'year') {
        $dayCount = 365; // Approx 365 days for a year
    } else {
        $dayCount = 7; // Default for the last 7 days
    }

    // Generate date range for the selected range
    $days = collect(range(0, $dayCount - 1))->map(function ($i) use ($startDate) {
        return Carbon::parse($startDate)->addDays($i)->toDateString();
    });

    // Get sum of tariff for each day for quotes
    $quoteTariffPoints = $days->map(function ($date) {
        return Quote::whereDate('created_at', $date)->sum('tariff');
    });

    // Get sum of tariff for each day for orders
    $orderTariffPoints = $days->map(function ($date) {
        return Order::whereDate('created_at', $date)->sum('tariff');
    });

    // Get sum of deposit for each day for orders (this is the profit)
    $orderDepositPoints = $days->map(function ($date) {
        return Order::whereDate('created_at', $date)->sum('deposit');
    });

    // Ensure all values in tariffPoints are integers
    $quoteTariffPoints = $quoteTariffPoints->map(function ($item) {
        return (int)$item;
    });

    $orderTariffPoints = $orderTariffPoints->map(function ($item) {
        return (int)$item;
    });

    $orderDepositPoints = $orderDepositPoints->map(function ($item) {
        return (int)$item;
    });

    // Calculate the total tariff from quotes
    $totalQuoteTariff = $quoteTariffPoints->sum();
    $totalOrderDeposit = $orderDepositPoints->sum();
    $totalOrderTariff = $orderTariffPoints->sum();

    // Query the total values for all time (no date filter)
    $totalQuoteTariffAll = Quote::sum('tariff');
    $totalOrderTariffAll = Order::sum('tariff');
    $totalOrderDepositAll = Order::sum('deposit');

    // Return the data to the view
    return view('admin.index', compact(
        'leadsCount',
        'quotesCount',
        'ordersCount',
        'usersCount',
        'totalQuoteTariff',
        'totalOrderDeposit',
        'totalOrderTariff',
        'quoteTariffPoints',
        'orderTariffPoints',
        'orderDepositPoints',
        'range', // Pass selected range for active selection
        // Add total values for all time
        'totalLeadsCount',
        'totalQuotesCount',
        'totalOrdersCount',
        'totalQuoteTariffAll',
        'totalOrderTariffAll',
        'totalOrderDepositAll'
    ));
    }

    public function getCustomerData($id) {
        if ($id === 'new') {
            return response()->json(null);
        }

        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }
}
