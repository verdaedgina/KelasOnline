@extends('layouts.app')

@section('content')
<style>
   body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            background-color: #D19B9B;
            padding: 30px;
            border-radius: 15px;
            max-width: 400px;
            margin: 50px auto;
        }
        .form-container input {
            background-color: #FBCBCB;
            border: none;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
        }
        .form-container button {
            background-color: #C27D7D;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            color: white;
            font-size: 18px;
        }
        .form-container button:hover {
            background-color: #B36B6B;
        }
  </style>

<div class="container">
   <h2 class="text-center mt-5">Create Your Account</h2>
   <div class="form-container">
    <form method="POST" action="{{ route('register') }}">
     @csrf

     <!-- Email -->
     <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
     @error('email')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
         </span>
     @enderror

     <!-- username -->
     <input id="username" type="text" placeholder="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>
     @error('username')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
         </span>
     @enderror

     <!-- Password -->
     <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required>
     @error('password')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
         </span>
     @enderror

     <!-- Confirm Password -->
     <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>

     <button type="submit" class="btn btn-success btn-lg mb-1">Register</button>
    </form>
   </div>
</div>
@endsection
