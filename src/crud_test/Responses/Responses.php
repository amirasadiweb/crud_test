<?php


namespace CrudTest\Responses;


class Responses
{

    public static function failed()
    {
        return redirect()
            ->route('customer.index')
            ->with('error','Operation Is Failed');
    }

    public static function not_find()
    {
        return redirect()
            ->route('customer.index')
            ->with('error','Not Find Customer');
    }


    public static function success()
    {
        return redirect()
            ->route('customer.index')
            ->with('success','Operation Is Success');
    }


}
