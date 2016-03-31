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
          <select
            name="revision_id"
            class="form-control"
            onchange="document.location.href = '/revisions/' + this.value + '/logs?filter[user_id]={{ $log->user_id }}'"
          >
            @foreach ($log->user->logs as $revLog)
              <option
                {{ $log->id === $revLog->id ? 'selected ' : '' }}
                value="{{ $revLog->revision_id }}"
              >
                {{ $revLog->revision_id }}
              </option>
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
