@extends('layouts.app')

@section('content')
<style>
    /* Styling sesuai dengan yang telah kamu buat sebelumnya */
</style>

<div class="container">
    <h2>Data Pengguna</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>*****</td> <!-- Jangan menampilkan password -->
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
