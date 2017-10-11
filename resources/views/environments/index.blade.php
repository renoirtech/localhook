@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Environments</div>
            <div class="panel-body">
                <a href="{{ route('environments.create') }}" class="btn btn-primary">Create environment</a>
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

                </tbody>
            </table>
            <div class="panel-footer">
                
            </div>
        </div>
    </div>
</div>
@endsection
