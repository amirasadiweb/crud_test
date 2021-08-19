@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-4">


                @include('message.form_errors')

                <form method="post" action="{{route('customer.store')}}">
                    @csrf

                    <div class="form-group">
                        <label for="title">FirstName</label>
                        <input type="text" name="FirstName" class="form-control" value="{{old('FirstName')}}" id="title">
                    </div>

                    <div class="form-group">
                        <label for="title">LastName</label>
                        <input type="text" name="LastName" class="form-control" value="{{old('LastName')}}" id="title">
                    </div>

                    <div class="form-group">
                        <label for="title">DateOfBirth</label>
                        <input type="date" name="DateOfBirth" class="form-control" value="{{old('DateOfBirth')}}" id="title">
                    </div>

                    <div class="form-group">
                        <label for="title">PhoneNumber</label>
                        <input type="text" name="PhoneNumber" class="form-control" value="{{old('PhoneNumber')}}" id="title">
                    </div>

                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="text" name="Email" class="form-control" value="{{old('Email')}}" id="title">
                    </div>


                    <div class="form-group">
                        <label for="title">BankAccountNumber</label>
                        <input type="text" name="BankAccountNumber" class="form-control" value="{{old('BankAccountNumber')}}" id="title">
                    </div>


                    <button type="submit" class="btn btn-primary">create</button>

                </form>

            </div>

        </div>

    </div>









@endsection
