@extends('components.layout')

@section('content')

    @foreach($articles as $article)

        <article>
            {!! $article !!}
        </article>

    @endforeach

@endsection
