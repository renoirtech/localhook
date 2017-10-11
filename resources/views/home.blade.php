@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Your bins</div>
            <div class="panel-body">
                <a href="{{ route('bins.create') }}" class="btn btn-primary">Create new bin</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Owner</th>
                        <th>Created at</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(auth()->user()->bins as $bin)
                        <tr>
                            <td>{{ $bin->user->name }}</td>
                            <td>{{ $bin->created_at }}</td>
                            <td>
                                <a href="{{ route('bins.show', ['uuid' => $bin->uuid]) }}">Show details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Your environments</div>
            <div class="panel-body">
                <a href="{{ route('environments.create') }}" class="btn btn-primary">Create new environment</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(auth()->user()->environments as $environment)
                        <tr>
                            <td>{{ $environment->name }}</td>
                            <td>{{ $environment->created_at }}</td>
                            <td>
                                <a href="{{ route('environments.show', ['uuid' => $environment->uuid]) }}">Show details</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="4">No environments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
