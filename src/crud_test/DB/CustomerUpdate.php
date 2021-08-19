<?php


namespace CrudTest\DB;


use CrudTest\Customer;
use Imanghafoori\Helpers\Nullable;

class CustomerUpdate
{

    public static function update($data,$id) : Nullable
    {

        try {

            $customer=Customer::find($id);
            $customer->update($data);

        }catch (\Exception $e){

            return nullable(null);

        }


        if(!$customer)
            return nullable(null);

        return nullable($customer);


    }
}
