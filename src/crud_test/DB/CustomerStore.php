<?php


namespace CrudTest\DB;


use CrudTest\Customer;
use Imanghafoori\Helpers\Nullable;

class CustomerStore
{

    public static function store($data) : Nullable
    {

        try {

            $customer=Customer::create($data);

        }catch (\Exception $e){

            return nullable(null);

        }


        if(! $customer->exists)
            return nullable(null);

        return nullable($customer);

    }
}
