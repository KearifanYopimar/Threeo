<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>S I Three O Cafee</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets-fe/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets-fe/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-fe/css/hero.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <style>
        /* Footer */
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Footer Styles */
        .footer {
            background-color: #333;
            color: #fff;
            padding: 30px 0;
            text-align: center;
        }

        .footer__container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .footer__logo img {
            width: 100px;
        }

        .footer__links ul {
            list-style-type: none;
        }

        .footer__links ul li {
            display: inline-block;
            margin-right: 20px;
        }

        .footer__links ul li a {
            color: #fff;
            text-decoration: none;
        }

        .footer__social ul {
            list-style-type: none;
        }

        .footer__social ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .footer__social ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 20px;
        }

        .footer__bottom {
            margin-top: 20px;
        }

        /* Footer End */


        .sidebar {
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #FFFFFF;
            width: 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar .navbar-toggler {
            border: none;
            outline: none;
            color: #000;
        }

        .sidebar .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-width='2' linecap='round' linejoin='round' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .sidebar .nav-link {
            color: #000;
            font-size: 24px;
            margin: 10px 0;
        }

        .sidebar .nav-link:hover {
            color: #ff902a;
        }

        .content {
            margin-left: 80px;
            padding: 20px;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0) !important;
            /* Transparansi 100% */
            transition: background-color 0.3s ease-in-out;
            /* Efek transisi */
        }

        .navbar .nav-link {
            color: #000 !important;
            padding: 0 15px;
        }

        .navbar .nav-link:hover {
            color: #ff902a !important;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #000;
        }

        .navbar-brand span {
            font-size: 24px;
        }

        .navbar-toggler {
            border: none;
            color: #000;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-width='2' linecap='round' linejoin='round' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .navbar-nav {
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            list-style-type: none;
            padding-left: 0;
        }

        .navbar-nav li {
            margin-right: 20px;
        }

        .navbar-nav li:last-child {
            margin-right: 0;
        }
    </style>
</head>

<body class="d-flex flex-column" style="background-color: #f6ebda;">

    <!-- Sidebar -->
    <div class="sidebar">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse" id="sidebarMenu">
            <nav class="nav flex-column">
                <a class="nav-link" href="https://twitter.com" target="_blank"><i class="bi bi-twitter"></i></a>
                <a class="nav-link" href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                <a class="nav-link" href="https://facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
            </nav>
        </div>
    </div>

    <!-- Konten Utama -->
    <main class="flex-shrink-0 content">
        <!-- Navigasi -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    <span style="color: #00008B;">Three</span>
                    <span style="color: #ff902a;">O</span>
                    <span style="color: #00008B;"> Cafe</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        {{-- @foreach ($menu as $dm)
                            @if (sizeof($dm['itemMenu']) > 0)
                                <li class="nav-item dropdown">
                                    <a href="{{ $dm['url'] }}" class="nav-link dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown">
                                        {{ $dm['menu'] }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @foreach ($dm['itemMenu'] as $idm)
                                            <li>
                                                <a href="{{ $idm['sub_menu_url'] }}" class="dropdown-item"
                                                    target="{{ $idm['sub_menu_target'] }}">
                                                    {{ $idm['sub_menu_nama'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ $dm['url'] }}" class="nav-link" target="{{ $dm['target'] }}">
                                        {{ $dm['menu'] }}
                                    </a>
                                </li>
                            @endif
                        @endforeach --}}
                        <li>
                            <a href="{{route('home.index')}}" class="nav-link">Beranda</a>

                        </li>
                        <li>
                            <a href="{{route('home.product')}}" class="nav-link">Product</a>

                        </li>
                        <li>
                            <a href="{{route('home.transaction')}}" class="nav-link">Transaction</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer__container">
            <div class="footer__logo">
                <img src="logo.png" alt="Company Logo">
            </div>
            <div class="footer__links">
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Produk</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>
            <div class="footer__social">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer__bottom">
            <p>&copy; 2024 Perusahaan XYZ. All rights reserved.</p>
        </div>
    </footer>



    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="{{ asset('assets-fe/js/scripts.js') }}"></script>
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/dist/js/adminlte.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
