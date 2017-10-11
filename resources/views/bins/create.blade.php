@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('bins.store') }}" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">New bin confirmation</div>
                <div class="panel-body">
                    <p>Do you confirm that you wish to create a new bin?</p>
                    {{ csrf_field() }}
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-success">Confirm creation</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
