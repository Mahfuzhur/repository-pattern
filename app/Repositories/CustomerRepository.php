<?php 

namespace App\Repositories;

use App\Customer;


class CustomerRepository implements CustomerRepositoryInterface{

    public function all(){
        return Customer::orderBy('name')
        ->where('active',1)
        ->with('user')
        ->get()
        ->map->format();
    }

    public function update($customerId){
        $customer = Customer::find($customerId);
        $customer->update(request()->only('name'));
    }
}