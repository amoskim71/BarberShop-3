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

</style>

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Barbershop Queue</div>

        <div class="panel-body">

          @if (isset($customers) && $customers->count() > 0)
              @foreach ($customers as $customer )
                  <div class="customer">
                      <h3>{{ $customer->name }}</h3>
                      <p>({{ $customer->request }})</p>
                      @if ($customer->status == "in progress")
                        <p>In Progress</p>
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
          @endguest
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
