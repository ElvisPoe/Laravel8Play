@extends('app.layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                        @foreach($users as $user)
                            <tr class="text-center">
                                <th scope="row">{{ $user->id }}</th>
                                <td><a href="/users/{{ $user->username }}">{{ $user->name }}</a></td>
                                <td><a href="/users/{{ $user->username }}">{{ $user->username }}</a></td>
                                <td>{{ $user->posts->count() }}</td>
                                <td>{{ $user->payments->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
