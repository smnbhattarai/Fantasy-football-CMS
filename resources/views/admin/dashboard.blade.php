@extends('layouts.app')

@section('title') Admin Dashboard - @endsection

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-sm-12 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <h2>{{ $users->count() }}</h2>
                        @foreach($users as $user)
                        <small> {{ $user->name }} ({{ $user->email }}) | </small>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-secondary">
                    <div class="card-header">Total Team</div>
                    <div class="card-body">
                        <h2>{{ $teams }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-header">Total Matches</div>
                    <div class="card-body">
                        <h2>{{ $matches }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-danger">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-warning">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-info">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card bg-light">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-dark">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-secondary">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-danger">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-warning">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-info">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card bg-light">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4">
                <div class="card text-white bg-dark">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @endsection