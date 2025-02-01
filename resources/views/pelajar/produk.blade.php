@extends('layouts.app')

@section('content')
<html>
<head>
    <title>Kelas Online</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        .content {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 20px;
        }
        .card {
            background-color: #f8cfcf;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            text-align: center;
            width: 200px;
            padding: 10px;
        }
        .card img {
            width: 100%;
            border-radius: 10px 10px 0 0;
        }
        .card h4 {
            margin: 20px;
            font-size: 30px;
        }
        .card button {
            background-color: #a97b7b;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="container">
    <div class="row">
        <!-- Input Pencarian untuk Nama Mapel -->
        <div class="col-md-6">
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Search Mapel...">
            <datalist id="datalistOptions">
                @foreach ($mapels as $mapel)
                <option value="{{ $mapel->namaMapel }}" data-id="{{ $mapel->id }}">{{ $mapel->namaMapel }}</option>
                @endforeach
            </datalist>
        </div>

        <!-- Input Pencarian untuk Nama Materi -->
        <div class="col-md-6 mt-3 mt-md-0">
            <input class="form-control" id="materiSearch" placeholder="Search Materi...">
        </div>
    </div>
</div>


        <div class="row mt-4">
            @foreach ($materi as $materi)
                <div class="col-md-3 materi-item" data-mapel="{{ $materi->mapel }}" data-materi="{{ $materi->materi }}" id="materi-{{ $materi->id }}">
                    <div class="card">
                        <img src="{{ Storage::url('public/materis/') . $materi->image }}">
                        <h4>{{ $materi->mapel }}</h4>
                        <h6>{{ $materi->materi }}</h6>
                        <h6>{{ $materi->kelas }}</h6>

                        <form action="{{ route('history.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="materi_id" value="{{ $materi->id }}">
                            <button type="submit" class="btn btn-primary mt-3" onclick="window.open('{{ $materi->video }}', '_blank')">Video</button>
                            <button type="submit" class="btn btn-primary mt-3" onclick="window.open('{{ $materi->artikel }}', '_blank')">Artikel</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Fungsi Pencarian untuk Nama Mapel
        document.getElementById('exampleDataList').addEventListener('input', function() {
            var searchTerm = this.value.toLowerCase();
            var materiItems = document.querySelectorAll('.materi-item');
            var found = false;

            materiItems.forEach(function(item) {
                var mapelName = item.getAttribute('data-mapel').toLowerCase();

                if (mapelName.includes(searchTerm)) {
                    item.style.display = 'block'; 
                    if (!found) {
                        item.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        found = true;
                    }
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Fungsi Pencarian untuk Nama Materi
        document.getElementById('materiSearch').addEventListener('input', function() {
            var searchTerm = this.value.toLowerCase();
            var materiItems = document.querySelectorAll('.materi-item');
            var found = false;

            materiItems.forEach(function(item) {
                var materiName = item.getAttribute('data-materi').toLowerCase();

                if (materiName.includes(searchTerm)) {
                    item.style.display = 'block';
                    if (!found) {
                        item.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        found = true;
                    }
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
@endsection
