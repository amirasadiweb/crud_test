<?php

namespace CrudTest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
class Customer extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table="customers";


    public static function createTableCustomer()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->id();
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->char('PhoneNumber',15);
            $table->string('Email')->unique();
            $table->string('BankAccountNumber')->nullable();
            $table->timestamps();

            $table->unique(['FirstName', 'LastName','DateOfBirth']);

        });



    }

}
