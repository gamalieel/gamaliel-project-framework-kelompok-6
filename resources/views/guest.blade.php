@extends('layouts.poseify')

@section('header')
    <div class="container-fluid bg-dark py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 text-light">
                    <p class="text-primary fw-bold mb-2 text-uppercase">Pembangunan</p>
                    <h1 class="display-4 fw-bold mb-3">Monitoring Proyek Pembangunan dalam Satu Layar</h1>
                    <p class="mb-4">
                        Pantau progres, lokasi, kontraktor, dan tahapan proyek secara real-time. Gunakan filter,
                        pencarian, serta lampiran dokumen untuk setiap proyek.
                    </p>
                    <div class="d-flex gap-2 flex-wrap">
                        <a class="btn btn-primary px-4" href="{{ route('proyek.index') }}">
                            <i class="fa fa-chart-line me-2"></i> Lihat Data Proyek
                        </a>
                        <a class="btn btn-outline-light px-4" href="{{ route('progres_proyek.index') }}">
                            <i class="fa fa-list-check me-2"></i> Data Progress
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="card bg-secondary text-light shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-1">Total Proyek</h6>
                                    <h3 class="fw-bold mb-0">{{ \App\Models\Proyek::count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-secondary text-light shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-1">Tahapan Terdata</h6>
                                    <h3 class="fw-bold mb-0">{{ \App\Models\TahapanProyek::count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card bg-secondary text-light shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-1">Catatan Progress</h6>
                                    <h3 class="fw-bold mb-2">{{ \App\Models\ProgressProyek::count() }}</h3>
                                    <small class="text-light">Update persentase real, tanggal, dan catatan untuk setiap tahapan.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-secondary text-light shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-1">Proyek</h6>
                                    <p class="mb-2">Kelola data proyek, lokasi, dan dokumen pendukung.</p>
                                    <a href="{{ route('proyek.index') }}" class="text-primary">Lihat proyek</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-secondary text-light shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-1">Tahapan Proyek</h6>
                                    <p class="mb-2">Atur tahapan, target persentase, dan jadwal tiap proyek.</p>
                                    <a href="{{ route('tahapan_proyek.index') }}" class="text-primary">Kelola tahapan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Pembangunan Stats -->
    <div class="container-fluid bg-secondary py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card bg-dark text-light h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Lokasi & GeoJSON</h5>
                            <p class="card-text">Simpan koordinat lat/lng dan lampiran file GeoJSON untuk peta detail.</p>
                            <a href="{{ route('proyek.index') }}" class="text-primary">Kelola lokasi</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-light h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Kontraktor</h5>
                            <p class="card-text">Catat penanggung jawab, kontak, dan alamat kontraktor tiap proyek.</p>
                            <a href="{{ route('proyek.index') }}" class="text-primary">Lihat proyek</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-light h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Progress & Tahapan</h5>
                            <p class="card-text">Update persentase real, tanggal, dan catatan untuk setiap tahapan.</p>
                            <a href="{{ route('progres_proyek.index') }}" class="text-primary">Kelola progress</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pembangunan Stats End -->


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Services</h5>
                        <h1>How We Help You</h1>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-left">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5">
                        <div class="service-img p-5 wow fadeInRight" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 wow fadeInRight" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Fashion Shows</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-right">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5 order-md-1 text-md-end">
                        <div class="service-img p-5 wow fadeInLeft" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 text-md-end wow fadeInLeft" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Corporate Events</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-left">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5">
                        <div class="service-img p-5 wow fadeInRight" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-3.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 wow fadeInRight" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Commercial Photo Shots</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-right">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5 order-md-1 text-md-end">
                        <div class="service-img p-5 wow fadeInLeft" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-4.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 text-md-end wow fadeInLeft" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Professional Modeling</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Banner Start -->
    <div class="container-fluid py-5 bg-secondary">
        <div class="container py-5">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="title mx-5 px-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="title-center">
                            <h5>Casting</h5>
                            <h1>Want to be a Model?</h1>
                        </div>
                    </div>
                    <p class="fs-5 mb-5 wow fadeInUp" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit. Sed erat lectus, venenatis sit amet egestas eget, aliquet a nisl.</p>
                    <div class="position-relative wow fadeInUp" data-wow-delay="0.3s">
                        <input class="form-control border-0 bg-dark rounded-pill w-100 py-4 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button" class="btn btn-primary py-3 px-4 position-absolute top-0 end-0 me-2"
                            style="margin-top: 7px;">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Models</h5>
                        <h1>Meet Our Models</h1>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-1.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Naomy Olsen</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-2.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Pamela Torney</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-3.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Joanne Irwin</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-4.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Gillian Rowe</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-5.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Naomy Olsen</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-6.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Pamela Torney</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-7.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Joanne Irwin</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-8.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Gillian Rowe</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5 bg-secondary">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Testimonial</h5>
                        <h1>What Our Clients Say</h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item">
                    <div class="testimonial-inner">
                        <img class="img-fluid" src="{{ asset('poseify/img/testimonial-1.jpg') }}" alt="">
                        <div class="testimonial-text">
                            <p class="fs-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat lectus,
                                venenatis sit amet egestas eget, aliquet a nisl.</p>
                            <h5 class="text-uppercase">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-inner">
                        <img class="img-fluid" src="{{ asset('poseify/img/testimonial-2.jpg') }}" alt="">
                        <div class="testimonial-text">
                            <p class="fs-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat lectus,
                                venenatis sit amet egestas eget, aliquet a nisl.</p>
                            <h5 class="text-uppercase">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-inner">
                        <img class="img-fluid" src="{{ asset('poseify/img/testimonial-3.jpg') }}" alt="">
                        <div class="testimonial-text">
                            <p class="fs-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed erat lectus,
                                venenatis sit amet egestas eget, aliquet a nisl.</p>
                            <h5 class="text-uppercase">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
@extends('layouts.poseify')

@section('header')
    <div class="container-fluid bg-dark py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 text-light">
                    <p class="text-primary fw-bold mb-2 text-uppercase">Pembangunan</p>
                    <h1 class="display-4 fw-bold mb-3">Monitoring Proyek Pembangunan dalam Satu Layar</h1>
                    <p class="mb-4">
                        Pantau progres, lokasi, kontraktor, dan tahapan proyek secara real-time. Gunakan filter,
                        pencarian, serta lampiran dokumen untuk setiap proyek.
                    </p>
                    <div class="d-flex gap-2 flex-wrap">
                        <a class="btn btn-primary px-4" href="{{ route('proyek.index') }}">
                            <i class="fa fa-chart-line me-2"></i> Lihat Data Proyek
                        </a>
                        <a class="btn btn-outline-light px-4" href="{{ route('progres_proyek.index') }}">
                            <i class="fa fa-list-check me-2"></i> Data Progress
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="card bg-secondary text-light shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-1">Total Proyek</h6>
                                    <h3 class="fw-bold mb-0">{{ \App\Models\Proyek::count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-secondary text-light shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-1">Tahapan Terdata</h6>
                                    <h3 class="fw-bold mb-0">{{ \App\Models\TahapanProyek::count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card bg-secondary text-light shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-1">Catatan Progress</h6>
                                    <h3 class="fw-bold mb-2">{{ \App\Models\ProgressProyek::count() }}</h3>
                                    <small class="text-light">Update persentase real, tanggal, dan catatan untuk setiap tahapan.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-secondary text-light shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-1">Proyek</h6>
                                    <p class="mb-2">Kelola data proyek, lokasi, dan dokumen pendukung.</p>
                                    <a href="{{ route('proyek.index') }}" class="text-primary">Lihat proyek</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-secondary text-light shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-uppercase text-muted mb-1">Tahapan Proyek</h6>
                                    <p class="mb-2">Atur tahapan, target persentase, dan jadwal tiap proyek.</p>
                                    <a href="{{ route('tahapan_proyek.index') }}" class="text-primary">Kelola tahapan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Pembangunan Stats -->
    <div class="container-fluid bg-secondary py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card bg-dark text-light h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Lokasi & GeoJSON</h5>
                            <p class="card-text">Simpan koordinat lat/lng dan lampiran file GeoJSON untuk peta detail.</p>
                            <a href="{{ route('proyek.index') }}" class="text-primary">Kelola lokasi</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-light h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Kontraktor</h5>
                            <p class="card-text">Catat penanggung jawab, kontak, dan alamat kontraktor tiap proyek.</p>
                            <a href="{{ route('proyek.index') }}" class="text-primary">Lihat proyek</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-light h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Progress & Tahapan</h5>
                            <p class="card-text">Update persentase real, tanggal, dan catatan untuk setiap tahapan.</p>
                            <a href="{{ route('progres_proyek.index') }}" class="text-primary">Kelola progress</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pembangunan Stats End -->


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Services</h5>
                        <h1>How We Help You</h1>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-left">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5">
                        <div class="service-img p-5 wow fadeInRight" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 wow fadeInRight" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Fashion Shows</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-right">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5 order-md-1 text-md-end">
                        <div class="service-img p-5 wow fadeInLeft" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 text-md-end wow fadeInLeft" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Corporate Events</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-left">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5">
                        <div class="service-img p-5 wow fadeInRight" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-3.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 wow fadeInRight" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Commercial Photo Shots</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-right">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5 order-md-1 text-md-end">
                        <div class="service-img p-5 wow fadeInLeft" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-4.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 text-md-end wow fadeInLeft" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Professional Modeling</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Banner Start -->
    <div class="container-fluid py-5 bg-secondary">
        <div class="container py-5">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="title mx-5 px-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="title-center">
                            <h5>Casting</h5>
                            <h1>Want to be a Model?</h1>
                        </div>
                    </div>
                    <p class="fs-5 mb-5 wow fadeInUp" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit. Sed erat lectus, venenatis sit amet egestas eget, aliquet a nisl.</p>
                    <div class="position-relative wow fadeInUp" data-wow-delay="0.3s">
                        <input class="form-control border-0 bg-dark rounded-pill w-100 py-4 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button" class="btn btn-primary py-3 px-4 position-absolute top-0 end-0 me-2"
                            style="margin-top: 7px;">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Models</h5>
                        <h1>Meet Our Models</h1>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-1.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Naomy Olsen</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-2.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Pamela Torney</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-3.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Joanne Irwin</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-4.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Gillian Rowe</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-5.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Naomy Olsen</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-6.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Pamela Torney</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-7.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Joanne Irwin</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-8.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Gillian Rowe</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5 bg-secondary">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Testimonial</h5>
                        <h1>Our Clients Say</h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="testimonial-item text-center"
                    data-dot="<img class='img-fluid' src='{{ asset('poseify/img/testimonial-1.jpg') }}' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                        sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                        justo sea clita.</p>
                    <h5 class="text-uppercase">Joanne Irwin</h5>
                    <span class="text-primary">Profession</span>
                </div>
                <div class="testimonial-item text-center"
                    data-dot="<img class='img-fluid' src='{{ asset('poseify/img/testimonial-2.jpg') }}' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                        sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                        justo sea clita.</p>
                    <h5 class="text-uppercase">Lana Anderson</h5>
                    <span class="text-primary">Profession</span>
                </div>
                <div class="testimonial-item text-center"
                    data-dot="<img class='img-fluid' src='{{ asset('poseify/img/testimonial-3.jpg') }}' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                        sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                        justo sea clita.</p>
                    <h5 class="text-uppercase">Pamela Torney</h5>
                    <span class="text-primary">Profession</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection

@push('styles')
<style>
    /* Blue & White Theme for Guest Page */
    .bg-dark {
        background: linear-gradient(135deg, #002266, #004499) !important;
    }
    
    .bg-secondary {
        background: linear-gradient(135deg, #f8f9fa, #ffffff) !important;
        color: #004499 !important;
        border: 2px solid #3399ff !important;
    }
    
    .text-primary {
        color: #0066cc !important;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #0066cc, #3399ff) !important;
        border: none !important;
        color: white !important;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #004499, #0066cc) !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 102, 204, 0.3);
    }
    
    .btn-outline-light {
        color: #0066cc !important;
        border-color: #0066cc !important;
        background: rgba(255, 255, 255, 0.9) !important;
    }
    
    .btn-outline-light:hover {
        background: #0066cc !important;
        border-color: #0066cc !important;
        color: white !important;
    }
    
    .card.bg-secondary {
        background: white !important;
        border: 2px solid #3399ff !important;
        color: #004499 !important;
        transition: all 0.3s ease;
    }
    
    .card.bg-secondary:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 102, 204, 0.2);
    }
    
    .text-muted {
        color: #6699cc !important;
    }
    
    .text-light {
        color: white !important;
    }
    
    .fw-bold {
        color: #0066cc !important;
    }
    
    .card.bg-secondary .fw-bold {
        color: #004499 !important;
    }
    
    /* Icon Colors */
    .fa {
        color: #0066cc !important;
    }
    
    /* Hover Effects */
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 102, 204, 0.15);
    }
    
    /* Container Styling */
    .container-fluid.bg-dark {
        background: linear-gradient(135deg, #002266, #004499) !important;
        position: relative;
        overflow: hidden;
    }
    
    .container-fluid.bg-dark::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23ffffff" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.1;
    }
    
    .container {
        position: relative;
        z-index: 1;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2rem !important;
        }
        
        .card.bg-secondary {
            margin-bottom: 1rem;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }
</style>
@endpush