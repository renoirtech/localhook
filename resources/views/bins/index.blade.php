@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Bins</div>
            <div class="panel-body">
                <a href="{{ route('bins.create') }}" class="btn btn-primary">Create bin</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Created at</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bins as $bin)
                        <tr>
                            <td>{{ $bin->uuid }}</td>
                            <td>{{ $bin->user->name }}</td>
                            <td>{{ $bin->created_at }}</td>
                            <td>
                                <a href="{{ route('bins.show', ['bin' => $bin->id]) }}">Show details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="panel-footer">
                {{ $bins->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
