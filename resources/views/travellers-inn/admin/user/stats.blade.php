@extends('travellers-inn.layouts.admin-panel-main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Email Address</th>
                    <th>State</th>
                    <th>Country</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->state()->name }}</td>
                        <td>{{ $user->state()->country->country_name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- end of .col-md-8 -->
    </div>
        @endsection
@section('script')
            <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/user/custom.js') }}" type="text/javascript"></script>
@endsection
