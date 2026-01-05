<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', 'Sistem Monitoring Proyek Pembangunan')</title>
    <meta name="description" content="Sistem Monitoring Proyek Pembangunan" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('tamplate-web/Nova-Bootstrap5_beta1-1.0.0/assets/css/bootstrap-5.0.0-beta1.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('tamplate-web/Nova-Bootstrap5_beta1-1.0.0/assets/css/LineIcons.2.0.css') }}"/>
    <link rel="stylesheet" href="{{ asset('tamplate-web/Nova-Bootstrap5_beta1-1.0.0/assets/css/tiny-slider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('tamplate-web/Nova-Bootstrap5_beta1-1.0.0/assets/css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('tamplate-web/Nova-Bootstrap5_beta1-1.0.0/assets/css/lindy-uikit.css') }}"/>

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4C6EF5;
            --secondary-color: #748FFC;
            --danger-color: #FF6B6B;
            --success-color: #51CF66;
            --warning-color: #FFD43B;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-area {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
        }

        .button {
            padding: 12px 28px;
            font-weight: 600;
            border-radius: 6px;
            display: inline-block;
            transition: all 0.3s ease;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .button-small {
            padding: 6px 12px;
            font-weight: 600;
            border-radius: 4px;
            display: inline-block;
            transition: all 0.3s ease;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .button-small:hover {
            text-decoration: none;
        }

        .button-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .button-primary:hover {
            background-color: #3751D7;
            color: white;
            text-decoration: none;
        }

        .button-secondary {
            background-color: var(--secondary-color);
            color: white;
        }

        .button-secondary:hover {
            background-color: #5C72E4;
            color: white;
        }

        .button-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .button-danger:hover {
            background-color: #FA5252;
            color: white;
        }

        .button-success {
            background-color: var(--success-color);
            color: white;
        }

        .button-success:hover {
            background-color: #40C057;
            color: white;
        }

        /* Bootstrap button styling fallback */
        .btn {
            padding: 6px 12px;
            font-weight: 600;
            border-radius: 4px;
            display: inline-block;
            transition: all 0.3s ease;
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            text-decoration: none;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            background: white;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-outline-danger {
            color: var(--danger-color);
            border-color: var(--danger-color);
            background: white;
        }

        .btn-outline-danger:hover {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-outline-warning {
            color: #FFB800;
            border-color: #FFB800;
            background: white;
        }

        .btn-outline-warning:hover {
            background-color: #FFB800;
            color: white;
        }

        .btn-outline-success {
            color: var(--success-color);
            border-color: var(--success-color);
            background: white;
        }

        .btn-outline-success:hover {
            background-color: var(--success-color);
            color: white;
        }

        .w-100 {
            width: 100%;
        }

        .card {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            padding: 20px;
            border-radius: 8px;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .footer {
            background-color: #2D3748;
            color: white;
            margin-top: 60px;
            padding: 40px 0 20px;
        }

        .footer a {
            color: #A0AEC0;
            text-decoration: none;
        }

        .footer a:hover {
            color: white;
        }

        .section-title {
            margin-bottom: 30px;
        }

        .section-title h3 {
            font-size: 28px;
            font-weight: 700;
            color: #1A202C;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #718096;
            font-size: 16px;
        }

        .table-responsive table {
            border-collapse: collapse;
        }

        .table-responsive table thead {
            background-color: #F7FAFC;
        }

        .table-responsive table th {
            border: 1px solid #E2E8F0;
            padding: 12px;
            font-weight: 600;
            color: #2D3748;
        }

        .table-responsive table td {
            border: 1px solid #E2E8F0;
            padding: 12px;
            color: #4A5568;
        }

        .form-control {
            border: 1px solid #CBD5E0;
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(76, 110, 245, 0.1);
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-primary {
            background-color: #EBF4FF;
            color: var(--primary-color);
        }

        .badge-success {
            background-color: #E6FFFA;
            color: var(--success-color);
        }

        .badge-danger {
            background-color: #FFE0E0;
            color: var(--danger-color);
        }

        .badge-warning {
            background-color: #FFFAEB;
            color: #B8860B;
        }

        .alert {
            border-radius: 6px;
            border: none;
            padding: 15px 20px;
        }

        .alert-success {
            background-color: #E6FFFA;
            color: #065F46;
        }

        .alert-danger {
            background-color: #FFE0E0;
            color: #7F1D1D;
        }

        .alert-info {
            background-color: #EBF4FF;
            color: #1E3A8A;
        }

        .alert-warning {
            background-color: #FFFAEB;
            color: #78350F;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 20px;
        }

        .breadcrumb-item {
            font-size: 14px;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            text-decoration: underline;
        }

        .breadcrumb-item.active {
            color: #718096;
        }

        .preloader {
            display: none;
        }

        .btn-action {
            padding: 8px 12px;
            font-size: 13px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .modal-header {
            border-bottom: 1px solid #E2E8F0;
            background-color: #F7FAFC;
        }

        .modal-title {
            color: #2D3748;
            font-weight: 700;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid #E2E8F0;
            padding: 15px 20px;
        }

        .pagination {
            gap: 5px;
        }

        .page-link {
            color: var(--primary-color);
            border: 1px solid #CBD5E0;
            border-radius: 4px;
        }

        .page-link:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .container-fluid > .row {
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .section-title h3 {
                font-size: 22px;
            }

            .table-responsive {
                font-size: 13px;
            }

            .table-responsive table th,
            .table-responsive table td {
                padding: 8px;
            }

            .btn-action {
                padding: 6px 10px;
                font-size: 12px;
            }
        }
    </style>

    @yield('extra_css')
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header/Navbar -->
    <header class="header header-6">
        <div class="navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <strong style="font-size: 20px; color: var(--primary-color);">
                                    <i class="fas fa-project-diagram"></i> ProyekMonitor
                                </strong>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarNav">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/') }}">
                                            <i class="fas fa-home"></i> Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('proyek.index') }}">
                                            <i class="fas fa-folder-open"></i> Proyek
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('tahapan_proyek.index') }}">
                                            <i class="fas fa-sitemap"></i> Tahapan
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('progres_proyek.index') }}">
                                            <i class="fas fa-tasks"></i> Progress
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('lokasi.index') }}">
                                            <i class="fas fa-map-marker-alt"></i> Lokasi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <i class="fas fa-sign-in-alt"></i> Login
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer footer-style-4">
        <div class="container">
            <div class="widget-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
                            <div class="logo">
                                <a href="{{ url('/') }}" style="text-decoration: none;">
                                    <strong style="font-size: 18px; color: white;">
                                        <i class="fas fa-project-diagram"></i> ProyekMonitor
                                    </strong>
                                </a>
                            </div>
                            <p class="desc">Sistem Monitoring Proyek Pembangunan yang komprehensif untuk tracking progress, lokasi, kontraktor, dan tahapan proyek secara real-time.</p>
                            <ul class="socials">
                                <li> <a href="#0"> <i class="lni lni-facebook-filled"></i> </a> </li>
                                <li> <a href="#0"> <i class="lni lni-twitter-filled"></i> </a> </li>
                                <li> <a href="#0"> <i class="lni lni-instagram-filled"></i> </a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".3s">
                            <h6>Menu Cepat</h6>
                            <ul class="links">
                                <li> <a href="{{ url('/') }}">Home</a> </li>
                                <li> <a href="{{ route('proyek.index') }}">Proyek</a> </li>
                                <li> <a href="{{ route('tahapan_proyek.index') }}">Tahapan</a> </li>
                                <li> <a href="{{ route('progres_proyek.index') }}">Progress</a> </li>
                                <li> <a href="{{ route('lokasi.index') }}">Lokasi</a> </li>
                                <li> <a href="{{ route('login') }}">Login</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".4s">
                            <h6>Fitur Utama</h6>
                            <ul class="links">
                                <li> <a href="#">Monitoring Proyek</a> </li>
                                <li> <a href="#">Tracking Progress</a> </li>
                                <li> <a href="#">Manajemen Tahapan</a> </li>
                                <li> <a href="#">Dokumentasi</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-widget wow fadeInUp" data-wow-delay=".5s">
                            <h6>Informasi</h6>
                            <ul class="links">
                                <li> <i class="fas fa-envelope"></i> <a href="mailto:info@proyekmonitor.com">info@proyekmonitor.com</a> </li>
                                <li> <i class="fas fa-phone"></i> <a href="tel:+621234567890">+62 123 4567 890</a> </li>
                                <li> <i class="fas fa-map-marker-alt"></i> Indonesia </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrapper wow fadeInUp" data-wow-delay=".2s">
                <p>&copy; <span id="year"></span> Sistem Monitoring Proyek Pembangunan. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" class="scroll-top"> <i class="lni lni-chevron-up"></i> </a>

    <!-- JS -->
    <script src="{{ asset('tamplate-web/Nova-Bootstrap5_beta1-1.0.0/assets/js/bootstrap-5.0.0-beta1.min.js') }}"></script>
    <script src="{{ asset('tamplate-web/Nova-Bootstrap5_beta1-1.0.0/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('tamplate-web/Nova-Bootstrap5_beta1-1.0.0/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('tamplate-web/Nova-Bootstrap5_beta1-1.0.0/assets/js/main.js') }}"></script>

    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>

    @yield('extra_js')
</body>
</html>
