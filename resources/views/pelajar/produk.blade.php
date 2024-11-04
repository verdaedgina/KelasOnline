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
        .card h3 {
            margin: 10px 0;
            font-size: 18px;
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
        @foreach ($materiList as $materi)
        <div class="card">
            <img alt="{{ $materi->nama }}" src="{{ asset('storage/images/' . $materi->image) }}" />
            <h3>{{ $materi->mapel }}</h3>
            <!-- Trigger Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kelasModal" data-materi-id="{{ $materi->id }}">
                Pilih
            </button>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="kelasModal" tabindex="-1" role="dialog" aria-labelledby="kelasModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kelasModalLabel">Pilih Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="kelasForm" action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kelasSelect">Pilih Kelas:</label>
                            <select class="form-control" id="kelasSelect" name="kelas">
                                <option value="kelas_1">Kelas 1</option>
                                <option value="kelas_2">Kelas 2</option>
                                <option value="kelas_3">Kelas 3</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <input type="hidden" id="materiId" name="materi_id" value="">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#kelasModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var materiId = button.data('materi-id'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#materiId').val(materiId); // Set materi ID to hidden input in the form
        });

        // Handle form submission
        $('#kelasForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            var actionUrl = "/your-route/" + $('#materiId').val(); // Define your route
            $(this).attr('action', actionUrl); // Set action for the form
            this.submit(); // Submit the form
        });
    </script>
</body>
</html>
@endsection
