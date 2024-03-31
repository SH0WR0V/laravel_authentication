@extends('layouts.header')

@section('content')
    <form action="" method="post">
        {{ @csrf_field() }}
        <!-- Email input -->
        <div class="container">
            @if (Session::has('msg'))
                <span class="span-successful">{{ Session::get('msg') }}</span>
            @endif
            <br>
            <h2>Registration</h2>
            <br>
            <div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="name" name="name" id="form1Example" class="form-control" value="{{ old('name') }}" />
                    @error('name')
                        <span class="span">{{ $message }}</span>
                    @enderror
                    <label class="form-label" for="form1Example">Name</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" name="email" id="form1Example1" class="form-control"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="span">{{ $message }}</span>
                    @enderror
                    <label class="form-label" for="form1Example1">Email address</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" name="password" id="form1Example2" class="form-control" />
                    @error('password')
                        <span class="span">{{ $message }}</span>
                    @enderror
                    <label class="form-label" for="form1Example2">Password</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" name="confirm_password" id="form1Example3" class="form-control" />
                    @error('confirm_password')
                        <span class="span">{{ $message }}</span>
                    @enderror
                    <label class="form-label" for="form1Example3">Confirm Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col">
                        <!-- Simple link -->
                        <a href="{{ route('login') }}">Already Registered? </a>
                    </div>
                </div>

                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block"
                    name="register">Register</button>

            </div>
        </div>
    </form>
@endsection
