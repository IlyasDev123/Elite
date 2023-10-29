<?php

namespace App\Http\Controllers\User;

use DB;
use App\Models\Order;
use App\Models\Quote;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $orders['new'] = $this->orderStatistics([Constant::ORDER_STATUS['Pending']]);
        $orders['processing'] = $this->orderStatistics([Constant::ORDER_STATUS['Assigned'], Constant::ORDER_STATUS['Processing']]);
        $orders['payment_pending'] = $this->orderStatistics([Constant::ORDER_STATUS['Payment_pending']]);
        $orders['completed'] = $this->orderStatistics([Constant::ORDER_STATUS['Completed']]);
        $orders['shipment'] = $this->orderStatistics([Constant::ORDER_STATUS['Completed']]);
        $orders['total'] = $orders['new'] + $orders['processing'] + $orders['completed'] + $orders['shipment'];
        $quotes['new'] = $this->quoteStatistics()->where('status', Constant::QUOTE_STATUS['Pending'])->count();
        $quotes['accepted'] = $this->quoteStatistics()->where('status', Constant::QUOTE_STATUS['Accepted'])->count();
        $quotes['rejected'] = $this->quoteStatistics()->where('status', Constant::QUOTE_STATUS['Rejected'])->count();
        $quotes['payment_pending'] = $this->quoteStatistics()->where('status', Constant::QUOTE_STATUS['Payment_pending'])->count();
        $quotes['total'] = $quotes['new'] + $quotes['accepted'] + $quotes['rejected'];

        return view('dashboard', compact('orders', 'quotes'));
    }

    public function orderStatistics($status)
    {
        return Order::whereBelongsTo(auth()->user())
            ->whereIn('status', $status)
            ->count();
    }

    public function quoteStatistics()
    {
        return Quote::whereBelongsTo(auth()->user())->get();
    }
}
