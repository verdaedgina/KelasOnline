@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center" style="color: #FF6B6B; font-weight: bold;">Data Akun</h1>
    <table class="table table-bordered" style="background-color: #FFECEC; border: 2px solid #FF6B6B;">
        <thead class="text-white" style="background-color: #FF6B6B;">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->nama }}</td> <!-- Ganti 'name' menjadi 'nama' jika kolom di database bernama 'nama' -->
                    <td>{{ $user->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
