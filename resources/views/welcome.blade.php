<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="index-body">

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li><a href="{{ route('match.result') }}" class="nav-link">Match Result</a></li>
                    <li><a class="nav-link home-login" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link home-register" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: none;">
                                <a href="{{ route('home') }}" class="dropdown-item">Home</a>
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


    <div class="container">
        <div class="row">

            <div class="col">
                <h4 class="text-light text-center">Rules</h4><hr>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="badge badge-primary badge-pill">1</span>
                        Game is simple: Predict the winner and gain 100 points for correct prediction or -25 points for wrong guess.
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-primary badge-pill">2</span>
                        Sign up with an email and get match schedules and other related information.
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-primary badge-pill">3</span>
                        Invite your friends and compete with them and see who has a better prediction capacity.
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-primary badge-pill">4</span>
                        We do not provide any prizes for correct or most accurate prediction. Site is just for fun!
                    </li>
                </ul>
            </div>

            <div class="col">
                <h4 class="text-light text-center">Upcoming matches</h4><hr>
                <table class="table table-borderless bg-light">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Date</th>
                        <th>Group/Level</th>
                    </tr>
                    @foreach($matches as $match)
                    <tr>
                        <td><img class="mb-2" src="{{ $match->getTeam($match->team_one)->country_flag }}" alt="{{ $match->getTeam($match->team_one)->country_name }}"> {{ $match->getTeam($match->team_one)->country_name }}</td>
                        <td>vs</td>
                        <td><img class="mb-2" src="{{ $match->getTeam($match->team_two)->country_flag }}" alt="{{ $match->getTeam($match->team_two)->country_name }}"> {{ $match->getTeam($match->team_two)->country_name }}</td>
                        <td>{{ $match->match_date }}</td>
                        <td>{{ $match->group_level }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>


        <div class="row my-5">
            <div class="col">
                <div class="card text-white bg-info">
                    <div class="card-header text-center">Top predictors</div>
                    <div class="card-body">

                        @php
                            $style_arr = ['badge-primary', 'badge-secondary', 'badge-success', 'badge-danger', 'badge-warning', 'badge-light', 'badge-dark'];
                            $arr_count = count($style_arr);
                        @endphp

                        @foreach($top_users as $top_user)
                            @php
                            $rand_num = rand(0, $arr_count-1);
                            $selected_style = $style_arr[$rand_num];
                            @endphp
                            <span class="badge {{ $selected_style }} p-2">{{ $top_user->userDetail($top_user->user_id)[0]->name }} &raquo; {{ $top_user->score }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



    </div><!-- .container -->

</div><!-- .index-body -->



</body>
</html>
