@extends('layouts.master')

@section('content')
  <h1>{{ $user->username }} Detail</h1>
  <hr />
  <h2>Logs</h2>
  <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Revision</th>
          <th>Link</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user->logs as $log)
          <tr>
            <td>
              <a href="/revisions/{{ $log->revision_id }}/logs">
                Show {{ $log->revision_id }}
              </a>
            </td>
            <td>
              <a href="/revisions/{{ $log->revision_id }}/logs/{{ $log->id }}">
                View #{{ $log->id }}
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@stop
