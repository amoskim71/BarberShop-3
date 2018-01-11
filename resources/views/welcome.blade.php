@extends('layouts.app')

<style>

input, button {
  display: inline !important;
}
</style>

@section('content')
@guest

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Barbershop Queue</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="/">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" placeholder="Enter Name" required autofocus>

                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Get in Line
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endguest

@endsection
