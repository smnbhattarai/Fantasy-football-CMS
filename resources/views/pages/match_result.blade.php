@extends('layouts.app')

@section('title') Match Results - @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <h4 class="text-center">Match results</h4><hr>

            <table class="table text-white table-borderless table-striped table-dark">
                <tr>
                    <th>S.No.</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Match Date</th>
                    <th>Group/Level</th>
                    <th>Result</th>
                </tr>

                @foreach($matches as $k=>$match)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td><img class="mb-2" src="{{ $match->getTeam($match->team_one)->country_flag }}" alt="{{ $match->getTeam($match->team_one)->country_name }}"> {{ $match->getTeam($match->team_one)->country_name }}</td>
                        <td>vs</td>
                        <td><img class="mb-2" src="{{ $match->getTeam($match->team_two)->country_flag }}" alt="{{ $match->getTeam($match->team_two)->country_name }}"> {{ $match->getTeam($match->team_two)->country_name }}</td>
                        <td>{{ $match->match_date }}</td>
                        <td>{{ $match->group_level }}</td>
                        <td>
                            @if($match->winner($match->id) == 'draw')
                                <strong>DRAW</strong>
                            @elseif(is_string($match->winner($match->id)))
                                <img src="{{ $match->getTeam($match->winner($match->id))->country_flag }}" alt="{{ $match->getTeam($match->winner($match->id))->country_name }}"> {{ $match->getTeam($match->winner($match->id))->country_name }}
                            @else
                                <strong> - </strong>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>
</div>
@endsection