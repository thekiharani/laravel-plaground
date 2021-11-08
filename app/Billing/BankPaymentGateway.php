<?php

namespace App\Billing;

class BankPaymentGateway implements PaymentGateway
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
         return [
             'cost' => $amount,
             'discount' => $this->discount,
             'amount' => $amount - $this->discount,
             'currency' => $this->currency,
             'txn_id' => \Str::upper(\Str::random())
         ];
     }
}
