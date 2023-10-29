<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Order;
use App\Models\AssignOrder;
use App\Models\SubmitOrder;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Assign;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitOrderRequest;
use App\Http\Requests\Order\AddPriceRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('product')->where('status', Constant::ORDER_STATUS['Pending'])->get();
        $designes = Admin::whereIn('type', [Constant::ROLE['Designer'], Constant::ROLE['Production']])->get();

        return view('Admin.Panel.order.new-order-list', compact('orders', 'designes'));
    }

    public function assignOrdersList()
    {
        $orders = Order::where('status', Constant::ORDER_STATUS['Assigned'])->with('assignOrder', 'product')->get();

        return view('Admin.Panel.order.assign-order-list', compact('orders'));
    }

    public function readyOrdersList()
    {
        $orders = Order::whereIn('status', [Constant::ORDER_STATUS['Processing'], Constant::ORDER_STATUS['Payment_pending']])->with('product', 'attachments')->get();
        return view('Admin.Panel.order.ready-order-list', compact('orders'));
    }

    public function PaymentPendingOrdersList()
    {
        $orders = Order::where('status', Constant::ORDER_STATUS['Payment_pending'])->with('attachments', 'product')->get();
        return view('Admin.Panel.order.ready-order-list', compact('orders'));
    }

    public function inShippingOrdersList()
    {
        $orders = Order::where('status', Constant::ORDER_STATUS['Shipping_process'])->with('attachments', 'product')->get();
        return view('Admin.Panel.order.shippment-process', compact('orders'));
    }

    public function completedOrdersList()
    {
        $orders = Order::where('status', Constant::ORDER_STATUS['Completed'])->with('attachments', 'product')->get();
        return view('Admin.Panel.order.completed-order-list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubmitOrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $order = Order::find($request->order_id);
            $order->update([
                'submission_note' => $request->submission_note ?? null,
                'status' => Constant::ORDER_STATUS['Processing'],
            ]);

            if ($request['attachments']) {
                foreach ($request['attachments'] as $file) {
                    $order->attachments()->create([
                        'attachment' => storeFiles('source-files', $file)
                    ]);
                }
            }

            // $this->updateOrderStatus($request->order_id, Constant::ORDER_STATUS['Processing']);
            DB::commit();

            return redirect()->route('admin.orders')->with('success', 'Order submitted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.orders')->with('error', 'Something went wrong please try again later' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('user', 'product.productImages', 'shippingDetail', 'assignOrder', 'attachments')->find($id);
        return view('Admin.Panel.order.order-detail', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function assignOrder(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            AssignOrder::create([
                'order_id' => $id,
                'assigned_by' => auth()->guard('admin')->id(),
                'user_id' => $request->user_id,
                'description' => $request->description ?? null,
            ]);
            $this->updateOrderStatus($id, Constant::ORDER_STATUS['Assigned']);

            DB::commit();
            return redirect()->route('admin.orders')->with('success', 'Order assigned successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.orders')->with('error', 'Something went wrong please try again later' . $th->getMessage());
        }
    }

    public function submitPrice(AddPriceRequest $request)
    {
        try {
            DB::beginTransaction();
            Order::find($request->order_id)->update([
                "price" => $request->price,
                "status" => Constant::ORDER_STATUS['Payment_pending'],
            ]);
            // $this->updateOrderStatus($request->order_id, Constant::ORDER_STATUS['Payment_pending']);

            DB::commit();
            return redirect()->route('admin.orders.ready')->with('success', 'Price added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.orders.ready')->with('error', 'Something went wrong please try again later' . $th->getMessage());
        }
    }

    public function updateOrderStatus($orderId, $status)
    {
        return Order::find($orderId)->update([
            'status' => $status
        ]);
    }

    public function updateOrderShippingStatus(Request $request)
    {
        Order::find($request->order_id)->update([
            'tracker_id' => $request->tracker_id,
        ]);

        return redirect()->route('admin.orders.shipment')->with('success', 'Updated successfully');
    }

    public function orderDelivered($order_id)
    {
        $this->updateOrderStatus($order_id, Constant::ORDER_STATUS['Completed']);
        return redirect()->route('admin.orders.shipment')->with('success', 'Order delivered successfully');
    }
}
