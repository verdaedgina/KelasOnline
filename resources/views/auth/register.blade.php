@extends('layouts.app')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    .sign-in-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }

    .sign-in-box {
        background-color: #dba8a1;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 300px;
    }

    .sign-in-box h1 {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    .sign-in-box input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 10px;
        border: none;
        background-color: #fbcfcf;
    }

    .sign-in-box button {
        width: 100%;
        padding: 10px;
        background-color: #c58683;
        color: white;
        font-size: 1rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        margin-top: 10px;
    }

    .sign-in-box button:hover {
        background-color: #b56e6a;
    }

    .new-account {
        display: block;
        margin: 10px 0;
        font-size: 0.9rem;
        color: #777;
        text-decoration: none;
    }

    .new-account:hover {
        color: #555;
    }

    /* Additional styles for registration page */
    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        margin-top: 20px;
    }

    .register-box {
        background-color: #dba8a1;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px;
    }

    .register-box h2 {
        font-size: 1.75rem;
        margin-bottom: 30px;
        text-align: center;
    }

    .register-box label {
        font-size: 1rem;
        margin-bottom: 5px;
    }

    .register-box input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 10px;
        border: none;
        background-color: #fbcfcf;
        font-size: 1rem;
    }

    .register-box button {
        width: 100%;
        padding: 12px;
        background-color: #c58683;
        color: white;
        font-size: 1.1rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }

    .register-box button:hover {
        background-color: #b56e6a;
    }

    .register-box .form-group {
        margin-bottom: 15px;
    }
</style>

<section class="register-container">
    <div class="register-box">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username -->
            <div class="form-group">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus placeholder="Masukkan Username">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Masukkan Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Masukkan Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</section>
@endsection
