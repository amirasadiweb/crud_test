<?php


namespace CrudTest;


use CrudTest\DB\CustomerDelete;
use CrudTest\ProtectionLayers\ValidateForm;
use CrudTest\Responses\Responses;

class DeleteCustomer
{

    public function __construct()
    {
        ValidateForm::install();
    }

    public function destroy($id)
    {

        CustomerDelete::delete($id)
            ->getOrSend([Responses::class,'failed']);

        return Responses::success();

    }


}
