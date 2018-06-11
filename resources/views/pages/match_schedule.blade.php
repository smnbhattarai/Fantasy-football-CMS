@extends('layouts.app')

@section('title') Match Schedule - @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <h4 class="text-center">Match schedule</h4><hr>

            <table class="table table-borderless table-hover table-responsive">
                <tr>
                    <th>S.No.</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Match Date</th>
                    <th>Match Time</th>
                    <th>Location</th>
                    <th>Group/Level</th>
                </tr>

                @foreach($matches as $k=>$match)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td><img class="mb-2" src="{{ $match->getTeam($match->team_one)->country_flag }}" alt="{{ $match->getTeam($match->team_one)->country_name }}"> {{ $match->getTeam($match->team_one)->country_name }}</td>
                        <td>vs</td>
                        <td><img class="mb-2" src="{{ $match->getTeam($match->team_two)->country_flag }}" alt="{{ $match->getTeam($match->team_two)->country_name }}"> {{ $match->getTeam($match->team_two)->country_name }}</td>
                        <td>{{ Carbon\Carbon::parse($match->match_date)->format('Y F d') }}</td>
                        <td>{{ $match->match_time }}</td>
                        <td>{{ $match->match_location }}</td>
                        <td>{{ $match->group_level }}</td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>
</div>
@endsection