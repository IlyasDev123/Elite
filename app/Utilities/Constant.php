<?php

namespace App\Utilities;

class Constant
{
    const  THREADING_CUT_SIZE = [
        'Cut thread longer than 2 mm' => 1,
        'Cut all connection threads' => 2,
        'Do not cut threads' => 3,
    ];

    const ORDER_STATUS = [
        'Pending' => 1,
        'Assigned' => 2,
        'Processing' => 3,
        'Payment_pending' => 4,
        'Completed' => 5,
        'Shipping_process' => 6,
        'Cancelled' => 7,
    ];

    const QUOTE_STATUS = [
        'Pending' => 1,
        'Payment_pending' => 2,
        'Accepted' => 3,
        'Rejected' => 4,
    ];

    const ROLE = [
        'Admin' => 2,
        'Designer' => 1,
        'Production' => 3,
        'employee' => 4,
    ];

    const PRODUCT_STATUS = [
        'Pending' => 1,
        'Accepted' => 2,
        'Rejected' => 3,
    ];

    const PRODUCT_TYPE = [
        "Physical" => 1,
        "Digital" => 2,
    ];

    const NOTIFICATION_TYPE = [
        'Order_created' => 1,
        'Assign_order' => 2,
        'Submit_order' => 3,
        'Payment_pending' => 4,
        'Payment_completed' => 5,
        'Order_completed' => 6,
        'Order_cancelled' => 7,
        'Quote_created' => 8,
        'Quote_accepted' => 9,
        'Quote_rejected' => 10,
        'Quote_payment_pending' => 11,
        'Quote_payment_completed' => 12,
        'Quote_cancelled' => 13,
        'Quote_assigned' => 14,
    ];
}
