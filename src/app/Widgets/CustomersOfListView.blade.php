

@php(extract($data))

<table class="table table-bordered table-hover" style="text-align: center">
    <thead>
    <tr>
        <th colspan="9">
            List Of Customers

        </th>
    </tr>
    <tr>
        <th scope="col">FirstName</th>
        <th scope="col">LastName</th>
        <th scope="col">DateOfBirth</th>
        <th scope="col">PhoneNumber</th>
        <th scope="col">Email</th>
        <th scope="col">BankAccountNumber</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>

    {{--    @if($customers->isEmpty())--}}
    {{--        <tr>--}}
    {{--            <td colspan="7" align="center">There Is Not Customer yet</td>--}}
    {{--        </tr>--}}
    {{--    @else--}}



    @foreach($customers as $customer)
        <tr>
            <td>{{$customer->FirstName}}</td>
            <td>{{$customer->LastName}}</td>
            <td>{{$customer->DateOfBirth}}</td>
            <td>{{$customer->PhoneNumber}}</td>
            <td>{{$customer->Email}}</td>
            <td>{{$customer->BankAccountNumber}}</td>

            <td>
                <a href="{{ route('customer.edit',$customer->id)}}">
                    <button type="button" class="btn btn-outline-success">edit</button>
                </a>
            </td>
            <td>
                <form action="{!! route('customer.destroy', $customer->id) !!}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">delete</button>
                </form>

            </td>
        </tr>
    @endforeach

    {{--    @endif--}}


    </tbody>
</table>
