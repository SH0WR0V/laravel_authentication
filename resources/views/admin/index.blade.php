@extends('layouts.header')

@section('content')
    <div class="container--index">

        @if (Session::has('msg'))
            <span class="span-successful">{{ Session::get('msg') }}</span>
        @endif

        <h2>Pending Approvals</h2>

        @if ($users->isEmpty())
            <p>No pending approval left</p>
        @else
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{ $user->email }}
                                </div>
                            </td>

                            <td>
                                <a href="{{ route('admin.user.approve', ['id' => $user->id]) }}">
                                    <button type="button" class="btn btn-success" data-mdb-ripple-color="dark">
                                        Approve
                                    </button>
                                </a>
                                <a href="{{ route('admin.user.decline', ['id' => $user->id]) }}">
                                    <button type="button" class="btn btn-danger" data-mdb-ripple-color="dark">
                                        Decline
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
