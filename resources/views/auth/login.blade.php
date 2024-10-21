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
    </style>

<section class="sign-in-container">
    <div class="sign-in-box">
        <h1>Sign in to your account</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <input type="password" name="password" placeholder="Masukkan Password" required class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <a href="{{ route('register') }}" class="link-dark">Buat akun baru</a>
            
            <button type="submit" class="btn btn-primary">Masuk</button>
        </form>
    </div>
</section>
@endsection
