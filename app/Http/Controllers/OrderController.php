<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use App\Http\Requests\Order\CreateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('status', Constant::ORDER_STATUS['Pending'])->where('user_id', auth()->id())->get();
        return view('user.order.new', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     */
    public function orderInProcess()
    {
        $orders = Order::whereIn('status', [Constant::ORDER_STATUS['Processing'], Constant::ORDER_STATUS['Assigned']])->where('user_id', auth()->id())->get();
        return view('user.order.in-process', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     */
    public function paymentPending()
    {
        $intent = auth()->user()->createSetupIntent();
        $orders = Order::where('status', Constant::ORDER_STATUS['Payment_pending'])->where('user_id', auth()->id())->with('submitOrder')->get();

        return view('user.order.payment-pending-list', compact('orders', 'intent'));
    }

    /**
     * Display a listing of the resource.
     */
    public function completedOrders()
    {
        $orders = Order::where('status', Constant::ORDER_STATUS['Completed'])->where('user_id', auth()->id())->with('submitOrder.attachments')->get();

        return view('user.order.completed-order', compact('orders'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOrderRequest $request)
    {
        try {
            $request['user_id'] = auth()->id();
            $order = Order::create($request->all());
            if ($request['files']) {
                foreach ($request['files'] as $file) {
                    $order->files()->create([
                        'file' => storeFiles('orders', $file)
                    ]);
                }
            }
            return redirect()->route('orders.index')->with('success', 'Order created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
