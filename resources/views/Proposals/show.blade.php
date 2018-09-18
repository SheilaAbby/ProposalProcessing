@extends('layouts.app')

@section('content')
<div class="container" float="left">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


                <div class="panel-body" >
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                 <h4 class="my-0 font-weight-normal">{{$proposal->title}}</h4>
                </div>
                <div class="card-body">
                 <h1 class="card-title pricing-card-title">Organisation Name<small class="text-muted">{{$proposal->organisation_name}}</small></h1>
                <p>{{$proposal->summary}}</p>
            <button type="button" class="btn btn-primary">Download Budget</button><br></br>
            <button type="button" class="btn btn-primary">Move to Stage1</button>
            <button type="button" class="btn btn-danger btn-primary">Reject</button>

            </div>
            </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
