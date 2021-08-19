<?php


namespace CrudTest;


use CrudTest\DB\CustomerStore;
use CrudTest\Responses\Responses;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use CrudTest\ProtectionLayers\ValidateForm;

class CreateCustomer
{

    public function __construct()
    {
        ValidateForm::install();
        resolve(StartGuarding::class)->start();

    }

    public function store()
    {
        HeyMan::checkPoint('customer.store');
        $data=request()->only(['FirstName','LastName','DateOfBirth','PhoneNumber','Email','BankAccountNumber']);

        CustomerStore::store($data)
            ->getOrSend([Responses::class,'failed']);

        return Responses::success();

    }


}
