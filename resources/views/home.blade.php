@extends('main')

@section('content')

<div class="container col-md-6 col-md-offset-3">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
