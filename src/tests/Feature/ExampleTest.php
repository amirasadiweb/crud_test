<?php

namespace Tests\Feature;

use CrudTest\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ExampleTest extends TestCase
{


    public function testCreateCustomer()
    {

        Customer::createTableCustomer();

        $response=$this->post('/customer', $this->data());
        $this->assertCount(1,Customer::all());

        $response->assertRedirect(route('customer.index'));
        Schema::dropIfExists('customers');


    }

    public function testValidateForPhone()
    {
        Customer::createTableCustomer();

        $response=$this->post('/customer',array_merge($this->data(),['PhoneNumber' => 'asassas']));
        $response->assertSessionHasErrors('PhoneNumber');

        Schema::dropIfExists('customers');

    }

    public function testUniqueFirstNameLastNameDateOfBirth()
    {
//         $this->withoutExceptionHandling();

        Customer::createTableCustomer();

        $this->post('/customer', $this->data());
        $this->assertCount(1,Customer::all());

        $this->post('/customer',array_merge($this->data(),['PhoneNumber' => '444443333','Email'=>'moharam1400@gmail.com','BankAccountNumber'=>'9999999']));
        $this->assertCount(1,Customer::all());

        Schema::dropIfExists('customers');

    }

    public function testUniqueEmail()
    {
        //         $this->withoutExceptionHandling();

        Customer::createTableCustomer();

        $this->post('/customer', $this->data());
        $this->assertCount(1,Customer::all());

        $this->post('/customer',array_merge($this->data(),['Email'=>'amiasadsadi@gmail.com']));
        $this->assertCount(1,Customer::all());

        Schema::dropIfExists('customers');


    }


    public function testDeleteCustomer()
    {

        //         $this->withoutExceptionHandling();

        Customer::createTableCustomer();

        $this->post('/customer', $this->data());
        $this->assertCount(1,Customer::all());

        $customer=Customer::first();

        $response = $this->delete(route('customer.destroy',$customer->id));
        $this->assertCount(0,Customer::all());

        $response->assertRedirect(route('customer.index'));
        Schema::dropIfExists('customers');


    }


    public function testUpdateCustomer()
    {
        Customer::createTableCustomer();

        $this->post('/customer', $this->data());
        $customer=Customer::first();

        $response = $this->put(route('customer.update',$customer->id), [
            'FirstName' => 'New Customer',
            'BankAccountNumber' => '5555555',
        ]);

        $this->assertEquals('New Customer',Customer::first()->FirstName);
        $this->assertEquals('5555555',Customer::first()->BankAccountNumber);

        $response->assertRedirect(route('customer.index'));
        Schema::dropIfExists('customers');


    }


    private function data(): array
    {
        return ['FirstName'=>'amir',
                'LastName'=>'asadi',
                'DateOfBirth'=>'2021-08-19',
                'PhoneNumber'=>'32131313',
                'Email'=>'amiasadsadi@gmail.com',
                'BankAccountNumber'=>'12121212'
              ];
    }


}
