@extends('app.layout')

@section('content')

    <div class="container pt-5">

        <div class="row mb-5">
            <div class="col-6">
                <h2><a href="/posts">Posts</a></h2>
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

            <div class="col-3 text-right">
                <form action="/posts" method="GET">
                    <label for="search">
                        <input type="search" name="search" id="search" class="form-control" placeholder="Search posts" value="{{ request('search') }}">
                    </label>
                </form>
            </div>
        </div>

        <div class="row">

            @forelse($posts as $post)

                <div class="col-12 col-md-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="https://i.pravatar.cc/400?u={{ $post->id }}" alt="Card image cap">
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

            @empty
                <div class="col-12">
                    <h4 class="text-center">No Posts</h4>
                </div>
            @endforelse

            <div class="col-12 text-center">
                {{ $posts->links() }}
            </div>

        </div>
    </div>

@endsection
