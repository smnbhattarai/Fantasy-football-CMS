@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="card card-body">
                    <h5 class="card-title">Pick your team</h5>
                    <p>
                        <small>Predict your team and we will calculate your score after each match.</small>
                        <small>Deadline for picking your team is 24 hour before the match date.</small>
                    </p>

                    <table class="table table-borderless table-responsive">

                        <tr>
                            <th>S.No.</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Match Date</th>
                            <th>Group/Level</th>
                            <th>Your pick</th>
                            <th>Score</th>

                        </tr>

                        @foreach($matches as $k=>$match)
                            <tr{!! ($match->userScore($match->id) > 0) ? ' class="table-success"' : '' !!}{!! ($match->userScore($match->id) < 0) ? ' class="table-danger"' : '' !!}>
                                <td>{{ $k+1 }}</td>
                                <td><img class="mb-2" src="{{ $match->getTeam($match->team_one)->country_flag }}" alt="{{ $match->getTeam($match->team_one)->country_name }}"> {{ $match->getTeam($match->team_one)->country_name }}</td>
                                <td>vs</td>
                                <td><img class="mb-2" src="{{ $match->getTeam($match->team_two)->country_flag }}" alt="{{ $match->getTeam($match->team_two)->country_name }}"> {{ $match->getTeam($match->team_two)->country_name }}</td>
                                <td>{{ $match->match_date }}</td>
                                <td>{{ $match->group_level }}</td>
                                <td>
                                    @if(!empty($match->getTeam($match->userPrediction($match->id))->country_flag))
                                    <img src="{{ $match->getTeam($match->userPrediction($match->id))->country_flag }}" alt="{{ $match->getTeam($match->userPrediction($match->id))->country_name }}"> {{ $match->getTeam($match->userPrediction($match->id))->country_name }}
                                    @else
                                        <strong>{{ strtoupper($match->userPrediction($match->id)) }}</strong>
                                    @endif
                                </td>
                                <td>{!! $match->userScore($match->id) > 0 ? '<strong class="text-success">'. $match->userScore($match->id) .'</strong>' : '<strong class="text-danger">'. $match->userScore($match->id) .'</strong>'  !!}</td>
                            </tr>
                        @endforeach

                    </table>

                </div>

            </div>


            <div class="col-md-3">

                @if($score > 0)
                    <div class="card text-white bg-success mb-3 text-center">
                        <div class="card-header">{{ Auth::user()->name }}, Your score</div>
                        <div class="card-body">
                            <p class="card-text">Going great! Your score is </p>
                            <h1 class="card-title">{{ $score }}</h1>
                        </div>
                    </div>
                @else
                    <div class="card text-white bg-danger mb-3 text-center">
                        <div class="card-header">{{ Auth::user()->name }}, Your score</div>
                        <div class="card-body">
                            <p class="card-text">Looks like your prediction is not going well! Your score is </p>
                            <h1 class="card-title">{{ $score }}</h1>
                        </div>
                    </div>
                @endif

                <div class="card card-body">
                    <h5 class="card-title">Teams</h5>
                    <p><small>Teams participating in 2018 Russia world cup.</small></p>
                    <ul class="list-group">
                        @foreach($teams as $team)
                            <li class="list-group-item"><img src="{{ $team->country_flag }}" alt="{{ $team->country_name }}"> {{ $team->country_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>
    </div>
@endsection