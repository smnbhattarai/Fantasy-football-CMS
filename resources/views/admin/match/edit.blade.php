@extends('layouts.app')

@section('title') Match - @endsection

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

                    <form action="{{ route('match.update', $match->id) }}" method="post">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">First Team</label>
                                    <select name="team_one" id="team_one" class="form-control">
                                        <option value="{{ $match->team_one }}">{{ $match->getTeam($match->team_one)->country_name }}</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Second Team</label>
                                    <select name="team_two" id="team_two" class="form-control">
                                    <option value="{{ $match->team_two }}">{{ $match->getTeam($match->team_two)->country_name }}</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->country_name }}</option>
                                    @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="match_date">Match date</label>
                                    <input type="text" name="match_date" id="match_date" value="{{ old('match_date', $match->match_date) }}" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="match_time">Match time</label>
                                    <input type="text" id="match_time" name="match_time" value="{{ old('match_time', $match->match_time) }}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Match Location</label>
                                    <input type="text" id="match_location" name="match_location" value="{{ old('match_location', $match->match_location) }}" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Group/Level</label>
                                    <select name="group_level" class="form-control">
                                        <option value="{{ old('group_level', $match->group_level) }}">{{ ucwords(str_replace('-', ' ', old('group_level', $match->group_level))) }}</option>
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

                        <button type="submit" class="btn btn-block btn-warning">Update Match</button>
                        @csrf
                        {{ method_field('PUT') }}

                    </form>


                </div>

            </div>
        </div>


    </div>

@endsection

@section('script')
    <script>

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



        $('#match_time').autocomplete({
            source: '{{ route('admin.match.time') }}',
            minLength: 1,
            select: function(e, ui){
                $('#match_time').val(ui.item.value);
            }
        });


        $('#match_location').autocomplete({
            source: '{{ route('admin.match.location') }}',
            minLength: 1,
            select: function(e, ui){
                $('#match_location').val(ui.item.value);
            }
        });



    </script>
@endsection