@extends('layouts.header')

@section('content')
    <div class="container">
        <h2>User Home Page</h2>
        <hr>
        @if ($user->approvals == 0)
            <p>Your registration is pending approval form an admin.
                Please be patient we will notify you.</p>
        @else
            <p>Welcome! you have successfully logged in.</p>
        @endif
    </div>
@endsection
