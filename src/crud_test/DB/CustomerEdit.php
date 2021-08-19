<?php


namespace CrudTest\DB;

use CrudTest\Customer;
use Imanghafoori\Helpers\Nullable;

class CustomerEdit
{
    public static function edit($id) : Nullable
    {

        try {

            $customer=Customer::find($id);


        }catch (\Exception $e){

            return nullable(null);

        }

        if(!$customer)
            return nullable(null);

        return nullable($customer);


    }

}
