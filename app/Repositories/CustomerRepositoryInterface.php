<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function list();

    public function findById($customerId);

    public function update($customerId);

    public function trash($customerId);
}
