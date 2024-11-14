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
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .pagination span {
            height: 10px;
            width: 10px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            margin: 0 5px;
        }
        .pagination span.active {
            background-color: #000;
        }
    </style>
</head>
<body>
    <div class="content">
    @foreach ($materi as $materi)
    <div class="card">
        <img src="{{ Storage::url('public/materis/') . $materi->image }}">
        <h4>{{ $materi->mapel }}</h4>
        <h6>{{ $materi->materi }}</h6>
        <h6>{{ $materi->kelas }}</h6>
        <!-- Trigger Modal -->
        <button type="button" class="btn btn-primary watch-video-btn" data-toggle="modal" data-target="#kelasModal"
        data-video="{{ $materi->video }}" data-artikel="{{ $materi->artikel }}" data-id="{{ $materi->id }}">
            Pilih
        </button>

    </div>
    @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="kelasModal" tabindex="-1" aria-labelledby="kelasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kelasModalLabel">Pilih Tipe Materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Pilih jenis materi yang ingin Anda akses:</p>
                    <div id="materiLinks">
                        <a href="#" id="videoLink" target="_blank" class="btn btn-info" style="display: none;" data-activity-type="view_video">Video</a>
                        <a href="#" id="artikelLink" target="_blank" class="btn btn-warning" style="display: none;" data-activity-type="view_artikel">Artikel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
$(document).ready(function() {
    // Menangani klik pada tombol "Pilih"
    $('.watch-video-btn').on('click', function() {
        var materiId = $(this).data('id');
        var video = $(this).data('video');
        var artikel = $(this).data('artikel');

        // Kirim data ke controller melalui AJAX
        $.ajax({
        url: '/history/add/' + materiId, // The correct route URL
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
            materi_id: materiId // Any other data you need to send
        },
        success: function(response) {
            alert(response.message); // Handle success response
        },
        error: function(xhr, status, error) {
            alert('Terjadi kesalahan: ' + error); // Handle error response
        }
    });

    });

    // Ketika modal ditampilkan, atur link video dan artikel
    $('#kelasModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget); // Tombol yang memicu modal
        const videoUrl = button.data('video'); // Ambil URL video
        const artikelUrl = button.data('artikel'); // Ambil URL artikel

        // Setel href untuk video dan artikel
        $('#videoLink').attr('href', videoUrl).show();
        $('#artikelLink').attr('href', artikelUrl).show();
    });
});

</script>

</body>
</html>
@endsection
