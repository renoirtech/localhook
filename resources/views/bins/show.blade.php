@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Bin details</div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $bin->uuid }}</td>
                    </tr>
                    <tr>
                        <th>Owner</th>
                        <td>{{ $bin->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Created at</th>
                        <td>{{ $bin->created_at }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="panel-footer">
                <div class="form-group">
                    <label for="url">Send your requests to:</label>
                    <input type="url" name="url" value="{{ route('requests.receive', ['uuid' => $bin->uuid]) }}" class="form-control input-lg" readonly>
                </div>
            </div>
        </div>

        @foreach($bin->requests->sortByDesc() as $request)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8">
                        {{ $request->name }}
                    </div>
                    <div class="col-md-4 text-right">
                        <span class="label label-primary">{{ $request->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Method</th>
                        <td>{{ $request->method }}</td>
                    </tr>
                    <tr>
                        <th>Content Type</th>
                        <td>{{ $request->content_type}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="panel-body">
                <pre>
                    {{ json_encode(json_decode($request->body), JSON_PRETTY_PRINT) }}
                </pre>
            </div>
            <div class="panel-footer">
                <form method="post" onsubmit="redirectController.redirect(event)">
                    <div class="input-group">
                        <select class="form-control" name="environment">
                            @foreach(auth()->user()->environments as $env)
                            <option value="{{ $env->uuid }}">{{ $env->name }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">Redirect to environment</button>
                        </span>
                    </div><!-- /input-group -->
                    <input type="hidden" name="request" value="{{ $request->uuid }}">
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ URL::to('js/controllers/RedirectController.js') }}" charset="utf-8"></script>
<script src="{{ URL::to('js/classes/Redirect.js') }}" charset="utf-8"></script>
<script type="text/javascript">
    let host = '{{ config('app.url') }}';
    let bin = '{{ $bin->uuid }}';
    let redirectController = new RedirectController(host, bin);
</script>
@endsection
