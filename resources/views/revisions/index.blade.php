@extends('layouts.master')

@section('content')
  <h1>Revisions</h1>
  <hr />
  <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Revision</th>
          <th>Logs Submitted</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($revisions as $revision)
          <tr>
            <td>
              <a href="/revisions/{{ $revision->id }}/logs">
                {{ $revision->id }}
              </a>
            </td>
            <td>
              {{ $revision->logs->count() }}
            </td>
            <td>
              {{ $revision->created_at->format('Y-m-d') }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@stop
