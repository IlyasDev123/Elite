<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Quote;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Services\NotificationService;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $orderState =  $this->dashboardState();
        $quotes =  $this->dashboardQuoteState();
        $totalIncomes = $this->getTotalIncomes()->sum('amount');
        $monthlyWise = $this->getTotalIncomes()->groupBy(fn ($t) => $t->created_at->format('Y-m'));

        return view('Admin.Panel.dashboard', compact('orderState', 'quotes', 'totalIncomes', 'monthlyWise'));
    }

    public function employeeDashboard()
    {
        $orderState =  $this->dashboardDesignerState();
        return view('employee.Panel.dashboard', compact('orderState'));
    }

    public function dashboardState()
    {
        $order['pending'] = $this->orderCount(Constant::ORDER_STATUS['Pending']);
        $order['assigned'] = $this->orderCount(Constant::ORDER_STATUS['Assigned']);
        $order['in_progress'] = $this->orderCount(Constant::ORDER_STATUS['Processing']);
        $order['completed'] = $this->orderCount(Constant::ORDER_STATUS['Completed']);
        $order['cancelled'] = $this->orderCount(Constant::ORDER_STATUS['Cancelled']);
        $order['total'] = $order['pending'] + $order['assigned'] + $order['in_progress'] + $order['completed'] + $order['cancelled'];

        return $order;
    }

    public function dashboardQuoteState()
    {
        $quotes['new'] = $this->quoteStatistics()->where('status', Constant::QUOTE_STATUS['Pending'])->count();
        $quotes['accepted'] = $this->quoteStatistics()->where('status', Constant::QUOTE_STATUS['Accepted'])->count();
        $quotes['rejected'] = $this->quoteStatistics()->where('status', Constant::QUOTE_STATUS['Rejected'])->count();
        $quotes['payment_pending'] = $this->quoteStatistics()->where('status', Constant::QUOTE_STATUS['Payment_pending'])->count();
        $quotes['total'] = $quotes['new'] + $quotes['accepted'] + $quotes['rejected'];
        return $quotes;
    }

    public function dashboardDesignerState()
    {
        $order['assigned'] = $this->orderCountDesigner([Constant::ORDER_STATUS['Assigned']]);
        $order['completed'] = $this->orderCountDesigner([Constant::ORDER_STATUS['Completed'], Constant::ORDER_STATUS['Payment_pending'], Constant::ORDER_STATUS['Processing']]);

        return $order;
    }

    function orderCount($status)
    {
        return Order::where('status', $status)->count();
    }

    function orderCountDesigner($status)
    {
        return Order::whereIn('status', $status)->whereHas('assignOrder', fn ($query) => $query->where('user_id', auth('admin')->id()))->count();
    }

    public function quoteStatistics()
    {
        return Quote::select('id', 'status')->get();
    }

    public function getTotalIncomes()
    {
        return Transaction::get();
    }
}
