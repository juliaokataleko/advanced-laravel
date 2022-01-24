<?php

namespace App\Repositories;

use App\Models\Customer;

interface CustomerRepositoryInterface
{

    public function all();

    public function findById($customerId);

    public function update($customerId);

    public function delete($customerId);

}
