@extends('layouts.app')
@section('content')
<html>
<head>
    <title>Kelas Online</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            flex-wrap: wrap; /* Allow cards to wrap to the next line */
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kelasModal" data-video="{{ $materi->video }}" data-artikel="{{ $materi->artikel }}">
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
                        <a href="#" id="videoLink" target="_blank" class="btn btn-info" style="display: none;">Video</a>
                        <a href="#" id="artikelLink" target="_blank" class="btn btn-warning" style="display: none;">Artikel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // When the modal is shown, get the video and article links from the button that triggered it
    $('#kelasModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget); // Button that triggered the modal
        const videoUrl = button.data('video'); // Extract video link
        const artikelUrl = button.data('artikel'); // Extract article link

        // Set the href attributes for the links
        $('#videoLink').attr('href', videoUrl).show(); // Show and set video link
        $('#artikelLink').attr('href', artikelUrl).show(); // Show and set article link
    });

    $.ajax({
    url: "{{ route('pelajar.profil') }}",
    type: "POST",
    data: {
        _token: "{{ csrf_token() }}",
        increment: 1 // Nilai untuk menambah skor
    },
    success: function(response) {
        if (response.success) {
            window.open(link, '_blank');
        } else {
            alert(response.message);
        }
    },
    error: function() {
        alert('Gagal memperbarui skor. Coba lagi.');
    }
});

</script>


@endsection
