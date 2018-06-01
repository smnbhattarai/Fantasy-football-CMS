@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-body">

                    @if(isset($time))
                    <p class="text-dark text-center">Time taken for prediction calculation: <strong>{{ $time }}</strong></p>
                    @endif

                    <form action="{{ route('admin.calculate.score') }}" method="post">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Calculate Score</button>
                        @csrf
                    </form>


                    @if(isset($scoretime))
                    <p class="text-dark text-center mt-5">Time taken for user score calculation: <strong>{{ $scoretime }}</strong></p>
                    @endif

                    <form action="{{ route('admin.calculate.user.score') }}" method="post" class="mt-5">
                        <button type="submit" class="btn btn-secondary btn-lg btn-block">Calculate User Score</button>
                        @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection