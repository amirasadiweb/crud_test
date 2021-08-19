<?php


namespace CrudTest\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForm
{
    public static function install()
    {
        HeyMan::onCheckPoint('customer.store')
            ->validate(['PhoneNumber'=>'numeric']);

        HeyMan::onCheckPoint('customer.update')
            ->validate(['PhoneNumber'=>'numeric']);
    }

}
