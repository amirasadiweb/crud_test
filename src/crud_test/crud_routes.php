<?php
use Illuminate\Support\Facades\Route;
use CrudTest\CreateCustomer;
use CrudTest\EditController;
use CrudTest\UpdateCustomer;
use CrudTest\DeleteCustomer;

Route::view('customer/list','Crud::index')->name('customer.index');
Route::view('customer/create','Crud::create')->name('customer.create');

Route::post('customer',[CreateCustomer::class,'store'])
    ->name('customer.store');

Route::get('customer/{customer}/edit',[EditController::class,'edit'])
    ->name('customer.edit');

Route::put('customer/{customer}',[UpdateCustomer::class,'update'])
    ->name('customer.update');

Route::delete('customer/{customer}',[DeleteCustomer::class,'destroy'])
    -> name('customer.destroy');
