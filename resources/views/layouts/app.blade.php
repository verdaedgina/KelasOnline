<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kelas Online</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Mengubah warna navbar background */
        .navbar {
            background-color: #b56e6a;
        }

        /* Mengubah warna teks navbar menjadi hitam */
        .navbar-nav .nav-link {
            color: black !important; /* Ganti warna teks navbar menjadi hitam */
        }

        /* Mengubah warna teks navbar saat hover */
        .navbar-nav .nav-link:hover {
            color: #333333 !important; /* Warna saat hover, sedikit lebih gelap */
        }

        /* Mengubah warna navbar saat login/logout */
        .navbar-nav .nav-item a {
            color: black !important;
        }

        /* Menandai halaman yang sedang aktif dengan warna gelap */
        .navbar-nav .nav-item.active .nav-link {
            color: #555 !important; /* Warna gelap untuk link yang aktif */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container">
            <img src="img/logo.png" alt="Students Image" height="50" width="80" class="mr-auto"/>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @if (auth()->check() && auth()->user()->role !== 'admin')
                        <li class="nav-item @if(Request::is('home')) active @endif">
                            <a class="nav-link" href="{{ '/home' }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item @if(Request::is('about')) active @endif">
                            <a class="nav-link" href="{{ '/about' }}">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item @if(Request::is('produk')) active @endif">
                            <a class="nav-link" href="{{ '/produk' }}">{{ __('Produk') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }} "
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif

                    @guest
                        <li class="nav-item @if(Request::is('home')) active @endif">
                            <a class="nav-link" href="javascript:void(0);">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item @if(Request::is('about')) active @endif">
                            <a class="nav-link" href="javascript:void(0);">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item @if(Request::is('produk')) active @endif">
                            <a class="nav-link" href="javascript:void(0);">{{ __('Produk') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                        </li>
                    @endguest

                    @if (auth()->check() && auth()->user()->role == 'admin')
                        <li class="nav-item @if(Request::is('admin')) active @endif">
                            <a class="nav-link" href="{{ '/admin' }}">{{ __('Data Mapel') }}</a>
                        </li>
                        <li class="nav-item @if(Request::is('akun')) active @endif">
                            <a class="nav-link" href="{{ '/akun' }}">{{ __('Data Akun') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }} "
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
