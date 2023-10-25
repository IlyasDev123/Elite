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
        'Cancelled' => 6,
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
        'employee' => 3,
    ];

    const PRODUCT_STATUS = [
        'Pending' => 1,
        'Accepted' => 2,
        'Rejected' => 3,
    ];
}
