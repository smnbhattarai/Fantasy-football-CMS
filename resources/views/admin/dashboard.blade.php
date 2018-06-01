@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-4 mb-3">
                <div class="card card-body">
                    <a href="{{ route('team.index') }}">Teams</a>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card card-body">
                    <a href="#">Add Team</a>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card card-body">
                    <a href="#">Add Team</a>
                </div>
            </div>

        </div>
    </div>


    @endsection