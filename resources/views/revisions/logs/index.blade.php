@extends('layouts.master')

@section('content')
  <h1>{{ $revision->id }} Logs</h1>
  <div class="row">
    <div class="col-sm-10"></div>
    <div class="offset-col-sm-10 col-sm-2">
      @if (Auth::check())
        <a
          class="btn btn-success"
          href="/revisions/{{ $revision->id }}/logs/create"
        >
          Submit Log
        </a>
      @else
        Want to submit a log? <a href="/auth/login">login or register</a> first.
      @endif
    </div>
  </div>
  <hr />
  <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Log</th>
          <th>Submitter</th>
          <th>Submitted</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($logs as $log)
          <tr>
            <td>
              <a href="/revisions/{{ $revision->id }}/logs/{{ $log->id }}">
                View #{{ $log->id }}
              </a>
            </td>
            <td>
              <a href="/users/{{ $log->user->id }}">
                {{ $log->user->username }}
              </a>
            </td>
            <td>
              {{ $log->updated_at->diffForHumans() }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@stop
