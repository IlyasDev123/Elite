<?php

namespace App\Http\Controllers\Employee;

use App\Models\Order;
use App\Models\SubmitOrder;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('status', Constant::ORDER_STATUS['Assigned'])->withWhereHas('assignOrder', fn ($q) => $q->where('user_id', auth()->guard('admin')->id()))->with('product')->get();

        return view('employee.Panel.order.new-order-list', compact('orders'));
    }

    public function completedOrdersList()
    {
        $orders = Order::whereIn('status', [Constant::ORDER_STATUS['Processing'], Constant::ORDER_STATUS['Payment_pending'], Constant::ORDER_STATUS['Completed']])->withWhereHas('assignOrder', fn ($q) => $q->where('user_id', auth()->guard('admin')->id()))->with('attachments', 'product')->get();

        return view('employee.Panel.order.completed-order-list', compact('orders'));
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
        try {
            DB::beginTransaction();

            $order = Order::with('product')->find($request->order_id);
            $order->update([
                'submission_note' => $request->submission_note ?? null,
                'status' => $order->product->product_type == Constant::PRODUCT_STATUS['Physiacl'] ? Constant::ORDER_STATUS['Payment_pending'] : Constant::ORDER_STATUS['Processing'],
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

            return redirect()->route('employee.orders')->with('success', 'Order submitted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('employee.orders')->with('error', 'Something went wrong please try again later' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('user', 'product.productImages', 'shippingDetail', 'assignOrder', 'attachments')->find($id);
        return view('employee.Panel.order.order-detail', compact('order'));
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

    public function updateOrderStatus($orderId, $status)
    {
        return Order::find($orderId)->update([
            'status' => $status
        ]);
    }
}
