<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use CrudTest\Customer;
class CreateCustomerTable extends Migration
{

    public function up()
    {
        Customer::createTableCustomer();
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
