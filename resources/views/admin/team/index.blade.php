@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-body mb-4">
                    <h4>Add Team</h4><hr class="mb-4">

                    @if($errors->any())
                        <small class="text-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }} <br>
                                @endforeach
                        </small>
                        @endif

                    <form action="{{ route('team.store') }}" class="form-inline" method="post">
                        <input type="text" class="form-control mb-2 mr-sm-2" name="country_code" value="{{ old('country_code') }}" placeholder="Country Code">
                        <input type="text" class="form-control mb-2 mr-sm-2" name="country_name" value="{{ old('country_name') }}" placeholder="Country Name">
                        <input type="text" class="form-control mb-2 mr-sm-2" name="country_flag" value="{{ old('country_flag') }}" placeholder="Country Flag (Image URL)">
                        <button type="submit" class="btn btn-primary mb-2">Add country</button>
                        {{ csrf_field() }}
                    </form>
                </div>


                <div class="card card-body">
                    <h4>Added Teams</h4><hr class="mb-4">
                    <table class="table table-borderless">
                        <tr>
                            <th>S.No.</th>
                            <th>Country</th>
                            <th>Flag</th>
                            <th>Code</th>
                            <!--<th></th>-->
                        </tr>

                        @foreach($teams as $k=>$team)
                        <tr>
                            <td>{{ $k + 1 }}</td>
                            <td>{{ $team->country_name }}</td>
                            <td><img src="{{ $team->country_flag }}" alt="{{ $team->country_name }}"></td>
                            <td>{{ $team->country_code }}</td>
                            <!--<td>
                                <a href="{{ route('team.edit', $team->id) }}" class="btn btn-dark btn-sm">Edit</a>
                                <a href="{{ route('team.destroy', $team->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>-->
                        </tr>
                        @endforeach

                    </table>
                </div>

            </div>
        </div>
    </div>

    @endsection