<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Utilities\Constant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $orderState =  $this->dashboardState();
        return view('Admin.Panel.dashboard', compact('orderState'));
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
}
