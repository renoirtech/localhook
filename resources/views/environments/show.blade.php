@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Environments details</div>
            <table class="table table-striped">
                <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $environment->uuid }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $environment->name }}</td>
                        </tr>
                        <tr>
                            <th>Owner</th>
                            <td>{{ $environment->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{ $environment->created_at }}</td>
                        </tr>
                </tbody>
            </table>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>
@endsection
