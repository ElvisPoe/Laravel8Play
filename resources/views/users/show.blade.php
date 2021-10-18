@extends('app.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h2>User</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Posts</th>
                            <th scope="col">Payments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <th scope="row">{{ $user->id }}</th>
                            <td><a href="/users/{{ $user->username }}">{{ $user->name }}</a></td>
                            <td><a href="/users/{{ $user->username }}">{{ $user->username }}</a></td>
                            <td>{{ $user->posts->count() }}</td>
                            <td>{{ $user->payments->count() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h2>Payments</h2>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Payed at</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($user->payments as $payment)
                            <tr class="text-center">
                                <th scope="row">{{ $payment->id }}</th>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 mt-5">
                <h2>Posts</h2>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Excerpt</th>
                        <th scope="col">View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->posts as $post)
                        <tr class="text-center">
                            <th scope="row">{{ $post->id }}</th>
                            <th>{{ $post->title }}</th>
                            <td>{{ $post->excerpt }}</td>
                            <td><a href="/posts/{{ $post->slug }}" class="btn btn-info">View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
