<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface {

    public function all()
    {
        return Customer::orderBy('name')
        ->where('active', 1)
        ->with('user')
        ->get()
        ->map->format();
    }

    public function findById($customerId)
    {
        return Customer::where('id', $customerId)
        ->where('active', 1)
        ->with('user')
        ->firstOrFail()
        ->format();
    }

    public function update($customerId)
    {
        $customer = Customer::where('id', $customerId)
        ->where('active', 1)
        ->with('user')
        ->firstOrFail();

        $customer->update(request()->only('name'));
    }

    public function delete($customerId)
    {
        $customer = Customer::where('id', $customerId)->delete();
    }

    protected function format(Customer $customer) {
        return [
            'customer_id' => $customer->id,
            'name' => $customer->name,
            'created_by' => $customer->user->email,
            'last_updated' => $customer->updated_at->diffForHumans(),
        ];
    }

}