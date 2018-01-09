@extends('layouts.app')

<style>

  h2, p {
    display: inline;
  }

  .alert {
    margin-bottom: 0 !important;
  }

</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                @if(Session::has('flash_message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{!! session('flash_message') !!}</strong>
                </div>
                @endif

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>{{ Auth::user()->name }}</h2>
                    ({{ Auth::user()->email }})
                    <h4>{{ Auth::user()->bio }}</h4>

                    <a href='/home/edit'>
                        <button type="submit" name="edit" class="btn btn-primary">Edit Profile</button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
