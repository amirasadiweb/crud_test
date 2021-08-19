@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-4">


                @include('message.form_errors')

                    <form action="{!! route('customer.update', $customer->id) !!}" method="post">
                        @method('put')
                        @csrf

                    <div class="form-group">
                        <label for="title">FirstName</label>
                        <input type="text" name="FirstName" class="form-control" value="{{$customer->FirstName}}" id="title">
                    </div>

                    <div class="form-group">
                        <label for="title">LastName</label>
                        <input type="text" name="LastName" class="form-control" value="{{$customer->LastName}}" id="title">
                    </div>

                    <div class="form-group">
                        <label for="title">DateOfBirth</label>
                        <input type="date" name="DateOfBirth" class="form-control" value="{{$customer->DateOfBirth}}" id="title">
                    </div>

                    <div class="form-group">
                        <label for="title">PhoneNumber</label>
                        <input type="text" name="PhoneNumber" class="form-control" value="{{$customer->PhoneNumber}}" id="title">
                    </div>

                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="text" name="Email" class="form-control" value="{{$customer->Email}}" id="title">
                    </div>


                    <div class="form-group">
                        <label for="title">BankAccountNumber</label>
                        <input type="text" name="BankAccountNumber" class="form-control" value="{{$customer->BankAccountNumber}}" id="title">
                    </div>


                    <button type="submit" class="btn btn-primary">create</button>

                </form>

            </div>

        </div>

    </div>









@endsection
