<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Transaction;
use App\Utilities\Constant;
use App\Jobs\CustomEmailJob;
use Illuminate\Http\Request;
use App\Models\ShippingDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PaymentRequest;
use App\Services\NotificationService;

class StripeController extends Controller
{
    protected $notificationService;

    /**
     * Create a new controller instance.
     */
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function payment(PaymentRequest $request,)
    {
        $user = $request->user();
        $paymentMethod = $request->input('payment_method');
        $order = Order::with('product', 'zipFiles')->find($request->order_id);
        dd($order->zipFiles);
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

            $admin = Admin::select('id', 'email')->where('type', Constant::ROLE['Admin'])->first();

            $this->sendAttachmentByEmail($order, $user);
            $this->sendMail($order, $user, $admin);

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

    public function sendMail($order, $user, $admin)
    {
        $this->notificationService->sendNotification(1, $order->id, Order::class, $user->name . 'has sent the payment against order #' . $order->order_number, $admin->id, Admin::class, $user->id, User::class);
        $data = [
            "subject" => "Payment Sent",
            "email" => $admin->email,
            "view" => "emails.order-created",
            "content" => auth()->user()->name . " has sent the payment against order #$order->order_number.",
        ];
        CustomEmailJob::dispatch($data);
    }

    public function sendAttachmentByEmail($order, $user)
    {
        $data = [
            "subject" => "Attachment Sent",
            "email" => $user->email,
            "view" => "emails.order-created",
            "content" => "Your have recived an attachment.",
            "files" => $order->zipFiles,
        ];

        CustomEmailJob::dispatch($data);
    }
}
