@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="row">
            <div class="col-md-12">

                <div class="card card-body">

                    <h4>Add Matches</h4><hr>

                    @if($errors->any())
                        <small class="text-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </small>
                    @endif

                    <form action="{{ route('match.store') }}" method="post">
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">First Team</label>
                                    <select name="team_one" id="team_one" class="form-control">
                                        <option value="">Select team</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->country_name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Second Team</label>
                                    <select name="team_two" id="team_two" class="form-control" disabled>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Match date</label>
                                    <input type="text" name="match_date" id="match_date" value="{{ old('match_date') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Match time</label>
                                    <input type="text" name="match_time" value="{{ old('match_time') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Match Location</label>
                                    <input type="text" name="match_location" value="{{ old('match_location') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Group/Level</label>
                                    <select name="group_level" class="form-control">
                                        <option value="{{ old('group_level') }}">{{ ucwords(str_replace('-', ' ', old('group_level', 'Select One'))) }}</option>
                                        <option value="group-a">Group A</option>
                                        <option value="group-b">Group B</option>
                                        <option value="group-c">Group C</option>
                                        <option value="group-d">Group D</option>
                                        <option value="group-e">Group E</option>
                                        <option value="group-f">Group F</option>
                                        <option value="group-g">Group G</option>
                                        <option value="group-h">Group H</option>
                                        <option value="knockout">Knockout</option>
                                        <option value="quarter-final">Quarter Final</option>
                                        <option value="semi-final">Semi Final</option>
                                        <option value="third-place">Third place playoff</option>
                                        <option value="final">Final</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-warning">Add Match</button>
                        @csrf
                        
                    </form>


                </div>

            </div>
        </div>





        <div class="row">
            <div class="col-md-12">
                <div class="card card-body mt-3">
                    <h4 class="text-center">All Matches</h4><hr>

                    <table class="table table-borderless">

                        <tr>
                            <th>S.No.</th>
                            <th>Teams</th>
                            <th>Match Date</th>
                            <th>Match Time</th>
                            <th>Match location</th>
                            <th>Group/Level</th>
                        </tr>

                        @foreach($matches as $k=>$match)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>
                                <input type="radio" data-match-id="{{ $match->id }}" class="winner-select form-check-input" name="winner{{ $match->id }}" value="{{ $match->getTeam($match->team_one)->id }}" {{ ($match->winner($match->id) == $match->team_one) ? 'checked="checked"' : "" }}>
                                <img class="mb-2" src="{{ $match->getTeam($match->team_one)->country_flag }}" alt="{{ $match->getTeam($match->team_one)->country_name }}"> {{ $match->getTeam($match->team_one)->country_name }} <br>
                                <input type="radio" data-match-id="{{ $match->id }}" class="winner-select form-check-input" name="winner{{ $match->id }}" value="{{ $match->getTeam($match->team_two)->id }}" {{ ($match->winner($match->id) == $match->team_two) ? 'checked="checked"' : "" }}>
                                <img class="mb-2" src="{{ $match->getTeam($match->team_two)->country_flag }}" alt="{{ $match->getTeam($match->team_two)->country_name }}"> {{ $match->getTeam($match->team_two)->country_name }} <br>
                                <input type="radio" data-match-id="{{ $match->id }}" class="winner-select form-check-input" name="winner{{ $match->id }}" value="draw" {{ ($match->winner($match->id) == "draw") ? 'checked="checked"' : "" }}>
                                <label class="form-check-label">Match Draw</label>
                            </td>
                            <td>{{ $match->match_date }}</td>
                            <td>{{ $match->match_time }}</td>
                            <td>{{ $match->match_location }}</td>
                            <td>{{ $match->group_level }}</td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>


    </div>

    @endsection

@section('script')
    <script>
        $('#team_one').change(function(e){
            $('#team_two').attr('disabled', true);
            var id = $(this).find("option:selected").attr("value");
            $.ajax({
                url: "{{ action('TeamController@getTeamAjax') }}",
                type: "post",
                data: { id: id },
                success: function(teams){
                    let options = '';
                    $.each(teams, function(i, v){
                        options += '<option value="'+ v.id +'">'+ v.country_name +'</option>';
                    });
                    $('#team_two').attr('disabled', false).children().remove().end().append(options);
                }
            });
        });


        $('#match_date').datepicker({
            dateFormat: "yy-mm-dd"
        });



        $('.winner-select').change(function(e){
            let winner = ($(this).attr('value'));
            let match = $(this).data('match-id');
            $.ajax({
                url: "{{ action('WinnerController@addWinner') }}",
                type: "POST",
                data: { winner: winner, match_id: match },
                success: function(data) {
                    toastr.success(data);
                }
            });
        });
    </script>
    @endsection