<?php

namespace App\Orders;

use App\Billing\PaymentGateway;

class OrderDetails
{
    private PaymentGateway $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function all() {
        $this->paymentGateway->setDiscount(250);
        return [
            'name' => 'Aria Gitonga',
            'address' => 'RU 90089, Nairobi - Kenya'
        ];
    }
}
