<?php

namespace App\Billing;

interface PaymentGateway
{
    public function setDiscount($amount);

    public function charge($amount);
}
