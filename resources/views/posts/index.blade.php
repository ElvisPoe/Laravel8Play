@extends('app.layout')

@section('content')

    <div class="container pt-5">

        <div class="row mb-5">
            <div class="col-6">
                <h2>Posts</h2>
            </div>
            <div class="col-3 text-center">
                <x-dropdown>
                    <x-slot name="all_selection">
                        <option value="all">All</option>
                    </x-slot>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}"
                            {{ isset($currentCategory) && $currentCategory->is($category) ? 'selected' : '' }}>
                            {{ ucfirst($category->name) }}
                        </option>
                    @endforeach
                </x-dropdown>
            </div>

            <div class="col-3 text-center">
                <div>

                </div>
            </div>
        </div>

        <div class="row">

            @foreach($posts as $post)

                <div class="col-12 col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://picsum.photos/600/300" alt="Card image cap">
                        <div class="card-body">
                            <h3>
                                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                                <small>in</small>
                                <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                            </h3>
                            <p>{{ $post->excerpt }}</p>
                            <p><small>By: <a href="/author/posts/{{ $post->author->username }}">{{ $post->author->name }}</a></small></p>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>


@endsection
