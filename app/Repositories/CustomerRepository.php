<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function list() {
        return Customer::active()
            ->with(['user'])
            ->orderBy('name')
            ->get()
            ->map->format();
    }

    public function findById($customerId)
    {
        $customer = Customer::active()
            ->with(['user'])
            ->findOrFail($customerId);
        return $customer->format();
    }

    public function update($customerId)
    {
        $customer = Customer::active()
            ->findOrFail($customerId);
        $customer->update(request()->only('name'));
    }

    public function trash($customerId)
    {
        Customer::active()
            ->findOrFail($customerId)
            ->delete();
    }
}
