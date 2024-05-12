<?php

use App\Models\Sitting;
use App\Models\Url;

$sittings = Sitting::all()->first();
$url = Url::latest()->first();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>iQuick Url Shortner</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/sittings/'.$sittings->light_favicon) }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('../../front')}}/css/styles.css" rel="stylesheet" />
</head>


<body id="page-top">
    <!-- Navigation-->
    
    <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="height: 70px; background-color: #191E3A;">
        <div class="container">
            <a class="navbar-brand" href="{{'/'}}"><img style="width: 140px; " src="{{ asset('public/sittings/'.$sittings->light_logo) }}" alt=""></a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('/dashboard') }}">Dashboard</a></li>
                    @elseauth('admin')
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('/admin/dashboard') }}">Dashboard</a></li>

                    @else
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('login') }}">Log in</a></li>
                    <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('admin.login') }}">Log in for Admin</a></li> -->

                    @if (Route::has('register'))
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('register') }}">Register</a></li>
                    <!-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('admin.register') }}">Register for admin</a></li> -->
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    
    <header class="masthead text-white text-center" style="height:100vh; background-color: #191E3A;">
    
        <div class=" d-flex align-items-center flex-column">

            <h1 class="">iQuick Url Shortner</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <form id="contactForm" method="POST" action="{{route('url.store')}}">
                @csrf
                <div class=" mb-3 " style="width:90vh;">
                    <input class="form-control" id="name" name="url" type="text" placeholder="Enter your Url..." data-sb-validations="required" />

                    <div class="invalid-feedback" data-sb-feedback="name:required">A Url is required.</div>
                </div>
                @error('url')
                <div class="invalid-feedback" style="display: block; color:red; ">
                    {{$message}}
                </div>
                @enderror

                <button class="btn btn-primary btn-xl " id="submitButton" type="submit">Create Short Link</button>

            </form>
            

        </div>
        @if (Session::has('success'))
            <div class="alert alert-success m-5">
                <div class="icon__wrapper">
                    <span class="mdi mdi-alert-outline"></span>
                </div>
                <p>{{ Session::get('success') }}</p>
                <span class="mdi mdi-open-in-new open"></span>
                <span class="mdi mdi-close close"></span>
                <br>
                <p>Url: <a href="{{$url->origin_url}}" target="_blank">{{$_SERVER['HTTP_HOST'].'/'.$url->shortened_url_code}}</a></p>
            </div>
            @endif
    </header>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent URLs</h4>
                <!-- <p class="card-description"> Add class <code>.table-hover</code> -->
                </p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Guest</th>
                                <th>Origin URL</th>
                                <th>Short URL</th>
                                <th>User Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Models\Url::latest()->paginate(6) as $url)
                            <tr>
                                @if (!$url->admin && !$url->user)
                                <td>Guest</td>
                                <td><a href="{{$url->origin_url}}" target="_blank">{{$url->origin_url}}</a></td>
                                <td><a href="{{$url->origin_url}}" target="_blank">{{$_SERVER['HTTP_HOST'].'/'.$url->shortened_url_code}}</a></td>


                                <td><label class="btn btn-primary">guest</label></td>

                                @endif
                            </tr>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{asset('../../front')}}/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>