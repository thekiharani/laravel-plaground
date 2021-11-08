<?php

namespace App\Billing;

class CreditPaymentGateway implements PaymentGateway
{
    private string $currency;
    private int $discount;

    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($amount) {
        $this->discount = $amount;
    }

    public function charge($amount) {
         // charge the bank
        $fees = min($amount * 0.03, 200);
         return [
             'cost' => $amount,
             'txn_fees' => $fees,
             'discount' => $this->discount,
             'amount' => ($amount - $this->discount) + $fees,
             'currency' => $this->currency,
             'txn_id' => \Str::upper(\Str::random())
         ];
     }
}
