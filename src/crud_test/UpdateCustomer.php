<?php


namespace CrudTest;


use CrudTest\DB\CustomerUpdate;
use CrudTest\ProtectionLayers\ValidateForm;
use CrudTest\Responses\Responses;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;

class UpdateCustomer
{

    public function __construct()
    {
        ValidateForm::install();
        resolve(StartGuarding::class)->start();

    }

    public function update($id)
    {
        HeyMan::checkPoint('customer.update');

        $data=request()->only(['FirstName','LastName','DateOfBirth','PhoneNumber','Email','BankAccountNumber']);

        CustomerUpdate::update($data,$id)
            ->getOrSend([Responses::class,'failed']);

        return Responses::success();

    }

}
