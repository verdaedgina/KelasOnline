<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #c98b8b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #c98b8b;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f7c6c6;
        }
        tr:hover {
            background-color: #f1a3a3;
        }
        .back-button {
            background-color: #c98b8b;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #b57777;
        }
        .no-history-message {
            text-align: center;
            color: #8a0000;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Histori Anda</h1>
    <a href="/profil" class="back-button">Kembali ke Profil</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Materi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($histories as $history)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $history->created_at ? $history->created_at->format('d M Y') : '-' }}</td>
        <td>{{ $history->materi->materi }}</td>
    </tr>
@empty
    <tr>
        <td colspan="3" class="no-history-message">Tidak ada histori ditemukan</td>
    </tr>
@endforelse

        </tbody>
    </table>
</body>
</html>
