@extends('app.layout')

@section('content')

    <article>

        <div class="col-12 col-md-4 offset-md-4">
            <div class="card">
                <img class="card-img-top" src="https://picsum.photos/600/300" alt="Card image cap">
                <div class="card-body">
                    {!! $article !!}
                </div>
            </div>
        </div>

    </article>

@endsection
