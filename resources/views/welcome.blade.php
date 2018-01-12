@extends('layouts.app')

<style>

input, button {
  display: inline !important;
}

h3, p {
  display: inline !important;
}

.customer {
  border: 1px solid lightgrey;
  border-radius: 4px;
  margin: 4px 0 4px 0;
  padding: 4px;
}

.type {
  display: inline;
  border: 1px solid lightgrey;
  border-radius: 4px;
  margin: 5px 0 5px 0;
  padding: 4px;
}

input {
  margin-bottom: 5px !important;
}

.customer#no-1 {
  background-color: #f1f8e9;
  border-color: rgb(51,176,124);
  color: rgb(51,176,124);
}

form {
  display: inline;
}

.clock, .panel-heading {
  display: inline-block;
}

.panel-heading {
  background-color: #f1f8e9 !important;
}

.clock {
  color: rgb(51,176,124);
  font-size: 1.5em;
}

</style>

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Estimated Time Remaining:</div>
        <div class="clock">
          {{$clock}} minutes
        </div>

        <div class="panel-body">

          @if (isset($customers) && $customers->count() > 0)
              @foreach ($customers as $customer )
                  <div class="customer" id="no-{{ $loop->iteration }}">
                      {{$loop->iteration}}
                      <h3>{{ $customer->name }}</h3>
                      @if ($loop->iteration == 1)
                          <p>is currently getting: {{ $customer->type }}</p>
                          @auth
                            <form method="POST" action="/">
                              <button type="submit" name="complete" class="btn btn-success">Complete</button>
                              {{ csrf_field() }}
                            </form>
                          @endauth
                      @else
                          <p>is waiting for: {{ $customer->type }}</p>
                      @endif
                  </div>
              @endforeach
          @else
              <p>There are currently no customers in line</p>
          @endif

          @guest
          <form class="form-horizontal" method="POST" action="/">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

              <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="name" placeholder="Enter Name" required autofocus>
                <div class="type">
                  <label for="haircut">Haircut</label>
                  <input id="haircut" type="radio" value="haircut" name="type" checked="checked">
                </div>
                <div class="type">
                  <label for="haircut">Shave</label>
                  <input id="shave" type="radio" value="shave" name="type">
                </div>
                <div class="type">
                  <label for="haircut">Both</label>
                  <input id="both" type="radio" value="both" name="type">
                </div>
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
          @endguest
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
