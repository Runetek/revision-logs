@extends('layouts.master')

@section('content')
  <h1>
    <a href="/users/{{ $log->user->id }}">{{ $log->user->username }}</a>'s
    Updater Log for
    <a href="/revisions/{{ $revision->id }}/logs">
      #{{ $revision->id }}
    </a>
  </h1>
  <hr />
  <div class="row">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="revision_id" class="col-sm-2 control-label">
          Revision
        </label>
        <div class="col-sm-10">
          <select name="revision_id" class="form-control">
            @foreach ($log->user->logs as $log)
              <option selected value="{{ $log->revision_id }}">{{ $log->revision_id }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="body" class="col-sm-2 control-label">
          Log Output
        </label>
        <div class="col-sm-10">
          <pre>{{ $log->body }}</pre>
        </div>
      </div>
    </form>
  </div>
@stop
