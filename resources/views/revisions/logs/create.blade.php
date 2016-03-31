@extends('layouts.master')

@section('content')
  <h1>Submit Updater Log</h1>
  <hr />
  <div class="row">
    <form
      method="POST"
      class="form-horizontal"
      action="/revisions/{{ $revision->id }}/logs"
    >
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class="form-group">
        <label for="revision_id" class="col-sm-2 control-label">
          Revision
        </label>
        <div class="col-sm-10">
          <select name="revision_id" class="form-control">
            <option selected value="{{ $revision->id }}">{{ $revision->id }}</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="body" class="col-sm-2 control-label">
          Log Output
        </label>
        <div class="col-sm-10">
          <textarea
            class="form-control"
            name="body"
            placeholder="Paste updater log here"
            rows="16"
          ></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
@stop
