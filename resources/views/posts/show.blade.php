@extends('app.layout')

@section('content')

    <article>

        <div class="col-12 col-md-4 offset-md-4">
            <div class="card">
                <img class="card-img-top" src="https://picsum.photos/600/300" alt="Card image cap">
                <div class="card-body">

                    <h3>
                        {{ $post->title }}
                        <small>in</small>
                        <a href="/categories/{{ $post->category->slug }}">
                            {{ $post->category->name }}
                        </a>
                    </h3>

                    <p>{{ $post->body }}</p>

                    <p>
                        <small>By: <a href="/author/posts/{{ $post->author->username }}">
                                {{ $post->author->name }}</a>
                        </small>
                    </p>

                </div>
            </div>
        </div>

    </article>

@endsection
