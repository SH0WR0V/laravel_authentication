@extends('layouts.header')

@section('content')
    <form action="{{ route('loginSubmit') }}" method="post">
        {{ @csrf_field() }}
        <!-- Email input -->
        <div class="container">
            @if (Session::has('msg'))
                <span class="span-successful">{{ Session::get('msg') }}</span>
            @endif
            <br>
            <h2>Login</h2>
            <br>
            <div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" name="email" id="form1Example1" class="form-control" value="{{ old('email') }}" />
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

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col">
                        <!-- Simple link -->
                        <a href="{{ route('registration') }}">Have not registered yet?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block" name="login">Log in</button>

            </div>
        </div>
    </form>
@endsection
