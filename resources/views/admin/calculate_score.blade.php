@extends('layouts.app')

@section('title') Calculate Score - @endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col">
                <form action="{{ route('admin.calculate.score') }}" method="post">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Calculate Score</button>
                    @csrf
                </form>
                @if(isset($time))
                    <p class="text-dark mt-3">Time taken for prediction calculation: <strong>{{ $time }}</strong></p>
                @endif
            </div>

            <div class="col">
                <form action="{{ route('admin.calculate.user.score') }}" method="post">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block">Calculate User Score</button>
                    @csrf
                </form>
                @if(isset($scoretime))
                    <p class="text-dark mt-3">Time taken for user score calculation: <strong>{{ $scoretime }}</strong></p>
                @endif
            </div>

        </div>
    </div>
@endsection