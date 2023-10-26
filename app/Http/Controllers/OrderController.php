<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\Order\CreateOrderRequest;

class OrderController extends Controller
{
    protected $productService;
    /**
     * Create a new controller instance.
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('product')->where('status', Constant::ORDER_STATUS['Pending'])->where('user_id', auth()->id())->get();
        return view('user.order.new', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     */
    public function orderInProcess()
    {
        $orders = Order::with('product')->whereIn('status', [Constant::ORDER_STATUS['Processing'], Constant::ORDER_STATUS['Assigned']])->where('user_id', auth()->id())->get();
        return view('user.order.in-process', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     */
    public function paymentPending()
    {
        $intent = auth()->user()->createSetupIntent();
        $orders = Order::where('status', Constant::ORDER_STATUS['Payment_pending'])->where('user_id', auth()->id())->with('product')->get();

        return view('user.order.payment-pending-list', compact('orders', 'intent'));
    }


    public function InShippingOrders()
    {
        $orders = Order::where('status', Constant::ORDER_STATUS['Shipping_process'])->where('user_id', auth()->id())->with('attachments', 'product')->get();

        return view('user.order.shipping-process', compact('orders'));
    }
    /**
     * Display a listing of the resource.
     */
    public function completedOrders()
    {
        $orders = Order::where('status', Constant::ORDER_STATUS['Completed'])->where('user_id', auth()->id())->with('attachments', 'product')->get();

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
            $product = $this->productService->storeProduct($request);
            $order = Order::create([
                'user_id' => $request->user_id,
                'order_number' => rand(1333, 100000) . $product->id, // 'order-1634365471
                'product_id' => $product->id,
                "extra_instruction" => $request->extra_instruction,
                "status" => Constant::ORDER_STATUS['Pending'],
            ]);

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
