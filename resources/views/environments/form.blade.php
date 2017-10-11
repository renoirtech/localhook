<form action="{{ route('environments.store') }}" method="post">
    <div class="panel-body">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            <label for="url" class="control-label">URL</label>
            <input id="url" type="url" class="form-control" name="url" value="{{ old('url') }}" required>
            @if ($errors->has('url'))
            <span class="help-block">
                <strong>{{ $errors->first('url') }}</strong>
            </span>
            @endif
        </div>

        {{ csrf_field() }}
    </div>
    <div class="panel-footer">
        <button type="submit" class="btn btn-success">Create environment</button>
    </div>
</form>
