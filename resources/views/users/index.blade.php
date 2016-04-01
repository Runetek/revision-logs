@extends('layouts.master')

@section('content')
  <h1>Users List</h1>
  <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Username</th>
          <th>Log Count</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>
              <a href="/users/{{ $user->id }}">
                {{ $user->username }}
              </a>
            </td>
            <td>
              {{ $user->logs->count() }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@stop
