<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Models\ShippingDetail;
use App\Models\SubmitOrder;
use App\Models\Transaction;
use App\Utilities\Constant;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{

    public function payment(PaymentRequest $request,)
    {
        $user = $request->user();
        $paymentMethod = $request->input('payment_method');
        $order = Order::with('product')->find($request->order_id);

        try {
            DB::beginTransaction();
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $response = $user->charge($order->price * 100, $paymentMethod);
            $data = json_decode(json_encode($response), true);

            Transaction::create([
                'transaction_id' => $data['id'],
                'stripe_response' => json_encode($response),
                'amount' => $order->price,
                'order_id' => $order->id,
                'user_id' => $user->id,
            ]);

            $status =  $order->product->product_type == Constant::PRODUCT_TYPE['Physical'] ? Constant::ORDER_STATUS['Shipping_process'] : Constant::ORDER_STATUS['Completed'];
            $order->update(['status' => $status, 'is_paid' => true]);

            if ($order->product->product_type == Constant::PRODUCT_TYPE['Physical']) {
                $this->addShipping($request, $user->id);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('orders.payment-pending')->with('success', 'Payment has been successfully processed.');
    }

    public function addShipping($request, $userId)
    {
        return  ShippingDetail::create([
            'order_id' => $request->order_id,
            'user_id' => $userId,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
        ]);
    }
}
