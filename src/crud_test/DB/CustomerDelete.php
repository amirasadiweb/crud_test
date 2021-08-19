<?php


namespace CrudTest\DB;


use CrudTest\Customer;
use Imanghafoori\Helpers\Nullable;

class CustomerDelete
{

    public static function delete($id) : Nullable
    {

        try {

            $customer=Customer::find($id);
            $customer->delete($id);

        }catch (\Exception $e){

            return nullable(null);

        }


        if(!$customer)
            return nullable(null);

        return nullable($customer);


    }

}
