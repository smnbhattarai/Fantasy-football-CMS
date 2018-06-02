<nav class="navbar navbar-expand-md bg-danger navbar-dark navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @if(Auth::check())
                @if(Auth::user()->is_admin)
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('team.index') }}">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('match.index') }}">Match</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.calculate.score') }}">Calculate Score</a></li>
                    </ul>
                @endif
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li><a href="{{ route('match.schedule') }}" class="nav-link">Match Schedule</a></li>
                <li><a href="{{ route('match.result') }}" class="nav-link">Match Result</a></li>
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.prediction') }}">My Predictions</a></li>
                    <li><a href="{{ route('match.schedule') }}" class="nav-link">Match Schedule</a></li>
                    <li><a href="{{ route('match.result') }}" class="nav-link">Match Result</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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