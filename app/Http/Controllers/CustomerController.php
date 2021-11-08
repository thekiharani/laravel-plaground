<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private CustomerRepositoryInterface $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index() {
        $customers = $this->customerRepository->list();
        return response()->json(['customers' => $customers], 200);
    }

    public function show($customerId)
    {
        return $this->customerRepository->findById($customerId);
    }

    public function update($customerId)
    {
        $this->customerRepository->update($customerId);
        return redirect()->route('customers.show', $customerId);
    }

    public function destroy($customerId)
    {
        $this->customerRepository->trash($customerId);
        return redirect()->route('customers.index');
    }
}
