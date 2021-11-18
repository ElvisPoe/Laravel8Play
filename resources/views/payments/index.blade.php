@extends('app.layout')

@section('content')

    <div class="container pt-5">

        <div class="row mb-5">
            <div class="col-6">
                <h2><a href="/payments">Payments</a></h2>
            </div>
            <div class="col-6 text-right">
                <form action="/payments" method="GET">
                    <label for="datefrom">
                        <input type="date" name="datefrom" id="datefrom" class="form-control" placeholder="datefrom" value="{{ request('datefrom') }}">
                    </label>
                    <label for="dateto">
                        <input type="date" name="dateto" id="dateto" class="form-control" placeholder="dateto" value="{{ request('dateto') }}">
                    </label>
                    <input type="submit" class="btn btn-info">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                            <tr class="text-center">
                                <th scope="row">{{ $payment->id }}</th>
                                <td><a href="/users/{{ $payment->client->username }}">{{ $payment->client->name }}</a></td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
