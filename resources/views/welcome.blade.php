<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .h-divider{
            margin-top:5px;
            margin-bottom:5px;
            height:1px;
            width:100%;
            border-top:1px solid #D8D8D8;
        }
        .main {
            width: 50%;
            margin: 50px auto;
        }

        /* Bootstrap 4 text input with search icon */

        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <div class="form-inline">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" id="myInput" onkeyup="search()" placeholder="Search for event..">
                            </div>
                        </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-disabled="true">Ingin Publikasi Event mu?</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('create') }}">
                                        Create Event
                                    </a>

                                    <a class="dropdown-item" href="{{ url('/home') }}">
                                        Your Event
                                    </a>

                                    <div class="h-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <br>
        <main class="py-4">
            <div class="container">
                <div class="row">
                    @foreach ($events as $event)
                        <div id="myUL" class="col-3">
                            <div class="card-deck">
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset('images/'.$event->photo) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $event->name }}</h5>
                                        <p class="card-text">{{ Str::limit($event->description, 100, ' ...') }}</p>
                                        <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#detailModal{{ $event->id }}">Detail</button>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-danger">{{ $event->date }} : {{ $event->starting_hour }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="detailModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $event->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('images/'.$event->photo) }}" class="img-fluid" alt="Responsive image">
                                        <div class="row">
                                            <div class="col">
                                                <br>
                                                <br>
                                                <h4>Deskripsi Event</h4>
                                                <p>{{ $event->description }}</p>
                                            </div>
                                            <div class="col">
                                                <br>
                                                <br>
                                                <p>
                                                    <b>Tempat</b>
                                                    <br>
                                                    {{ $event->place }}
                                                </p>
                                                <p>
                                                    <b>Tanggal</b>
                                                    <br>
                                                    {{ $event->date }}
                                                </p>
                                                <p>
                                                    <b>Penyelenggara</b>
                                                    <br>
                                                    {{ $event->user->agency }}
                                                </p>
                                                <p>
                                                    <b>Contact Person</b>
                                                    <br>
                                                    {{ $event->contact_person }}
                                                </p>
                                                <p>
                                                    <b>Jam</b>
                                                    <br>
                                                    {{ $event->starting_hour }} s/d {{ $event->end_hour }}
                                                </p>
                                                <p>
                                                    <b>Link Registrasi</b>
                                                    <br>
                                                    <a href="{{ $event->registration_link }}" target="{{ $event->registration_link }}">{{ $event->registration_link }}</a>
                                                </p>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
    <script>
        function search() {
            var input, filter, ul, li, h5, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                h5 = li[i].getElementsByTagName("h5")[0];
                txtValue = h5.textContent || h5.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>