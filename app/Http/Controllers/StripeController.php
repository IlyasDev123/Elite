<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
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
        $order = SubmitOrder::find($request->input('submit_order_id'));

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
                'order_id' => $order->order_id,
                'user_id' => $user->id,
            ]);

            Order::find($order->order_id)->update(['status' => Constant::ORDER_STATUS['Completed']]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('orders.payment-pending')->with('success', 'Payment has been successfully processed.');
    }
}
