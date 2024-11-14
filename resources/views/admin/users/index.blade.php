@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center" style="color: #FF6B6B; font-weight: bold;">Data Akun User</h1>
    <table class="table table-bordered" style="background-color: #FFECEC; border: 2px solid #FF6B6B;">
        <thead class="text-white" style="background-color: #FF6B6B;">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->username }}</td> <!-- Pastikan kolom sesuai di database -->
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
