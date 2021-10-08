@extends('app.layout')

@section('content')

    <div class="container pt-5">

        <div class="row">

            @foreach($articles as $article)

                <div class="col-12 col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://picsum.photos/600/300" alt="Card image cap">
                        <div class="card-body">
                            {!! $article !!}
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

@endsection
