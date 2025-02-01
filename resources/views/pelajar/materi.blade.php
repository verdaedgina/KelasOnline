<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi - {{ $materi->materi }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            padding: 20px;
        }
        .back-button {
            background-color: #c98b8b;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .back-button:hover {
            background-color: #b57777;
        }
        .card {
            background-color: #f8cfcf;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
            padding: 20px;
            overflow: hidden;
        }
        .card img {
            width: 100%;
            border-radius: 10px 10px 0 0;
        }
        .card h4 {
            font-size: 24px;
            margin: 10px 0;
            color: #7d4c4c;
        }
        .card h6 {
            font-size: 16px;
            margin: 5px 0;
            color: #5a3a3a;
        }
        .card button {
            background-color: #a97b7b;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px 5px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .card button:hover {
            background-color: #8c5e5e;
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="/histori" class="back-button">Kembali</a>

        <div class="materi-item" data-mapel="{{ $materi->mapel }}" data-materi="{{ $materi->materi }}" id="materi-{{ $materi->id }}">
            <div class="card">
                <img src="{{ Storage::url('public/materis/') . $materi->image }}" alt="Materi Image">
                <h4>{{ $materi->mapel }}</h4>
                <h6>{{ $materi->materi }}</h6>
                <h6>{{ $materi->kelas }}</h6>

                <form action="{{ route('history.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="materi_id" value="{{ $materi->id }}">
                    <input type="hidden" name="redirect_to" value="materi">
                    <button type="submit" onclick="window.open('{{ $materi->video }}', '_blank')">Video</button>
                    <button type="submit" onclick="window.open('{{ $materi->artikel }}', '_blank')">Artikel</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
