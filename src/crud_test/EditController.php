<?php


namespace CrudTest;


use CrudTest\DB\CustomerEdit;
use CrudTest\Responses\Responses;

class EditController
{

    public function edit($id)
    {

        $customer=CustomerEdit::edit($id)
            ->getOrSend([Responses::class,'not_find']);

        return view('Crud::edit',compact('customer'));
    }

}
