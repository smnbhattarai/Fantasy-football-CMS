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

                <table class="table table-borderless">

                    <tr>
                        <th>S.No.</th>
                        <th>Teams</th>
                        <th>Match Date</th>
                        <th>Group/Level</th>
                        <th>Score</th>
                    </tr>

                    @foreach($matches as $k=>$match)
                        <tr{{ $match->match_date <= \Carbon\Carbon::now()->format('Y-m-d') ? ' class="text-muted"' : '' }}>
                            <td>{{ $k+1 }}</td>
                            <td>
                                <input type="radio" data-match-id="{{ $match->id }}" class="winner-select form-check-input" name="winner{{ $match->id }}" value="{{ $match->getTeam($match->team_one)->id }}" {!! ($match->userPrediction($match->id) == $match->team_one) ? 'checked="checked"' : "" !!} {!! $match->match_date <= \Carbon\Carbon::now()->format('Y-m-d') ? 'disabled="disabled"' : '' !!}>
                                <img class="mb-2" src="{{ $match->getTeam($match->team_one)->country_flag }}" alt="{{ $match->getTeam($match->team_one)->country_name }}"> {{ $match->getTeam($match->team_one)->country_name }} <br>
                                <input type="radio" data-match-id="{{ $match->id }}" class="winner-select form-check-input" name="winner{{ $match->id }}" value="{{ $match->getTeam($match->team_two)->id }}" {!! ($match->userPrediction($match->id) == $match->team_two) ? 'checked="checked"' : "" !!} {!! $match->match_date <= \Carbon\Carbon::now()->format('Y-m-d') ? 'disabled="disabled"' : '' !!}>
                                <img class="mb-2" src="{{ $match->getTeam($match->team_two)->country_flag }}" alt="{{ $match->getTeam($match->team_two)->country_name }}"> {{ $match->getTeam($match->team_two)->country_name }} <br>
                                <input type="radio" data-match-id="{{ $match->id }}" class="winner-select form-check-input" name="winner{{ $match->id }}" value="draw" {!! ($match->userPrediction($match->id) == "draw") ? 'checked="checked"' : "" !!} {!! $match->match_date <= \Carbon\Carbon::now()->format('Y-m-d') ? 'disabled="disabled"' : '' !!}>
                                <label class="form-check-label">Match Draw</label>
                            </td>
                            <td>{{ $match->match_date }}</td>
                            <td>{{ $match->group_level }}</td>
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


@section('script')
    <script>
        $('.winner-select').change(function(e){
            let winner = ($(this).attr('value'));
            let match = $(this).data('match-id');
            $.ajax({
                url: "{{ action('WinnerPredictionController@addPrediction') }}",
                type: "POST",
                data: { winner: winner, match_id: match },
                success: function(data) {
                    toastr.success(data);
                }
            });
        });
    </script>
@endsection