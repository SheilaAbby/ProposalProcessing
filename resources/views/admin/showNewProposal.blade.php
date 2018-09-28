@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 margin-tb">
            <div class="panel panel-default float-left">
                <div class="panel-heading"><b>Proposal</b></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                     <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal"><b>Organization Name:{{$proposal->organization_name}}</b></h4>
          </div>
          <div class="card-body">
           <center>
               <h3><b>Proposal Summary<b></h3><br>
               {{$proposal->summary}}
               <h3><b>Proposal budget</b></h3><br>
               {{$proposal->budget}}<br><br>




            <form class="form-horizontal" action="{{route('admin.proposalUpdates',$proposal->id) }}"  method="POST">
                 {{ csrf_field() }}

                <input type="hidden" id="Status" name="Status" value="{{ old('Status') }}">

             <button class="btn btn-primary" type="submit"  name="statusButton" value="move_to_stage1">Move To Stage1</button>
            &nbsp; &nbsp; &nbsp;
        <button type="submit" name="statusButton"  class="btn btn-primary btn-danger" value="reject">Reject</button>
    </form>
     
             </center>
          </div>
        </div>

        </div>

                                               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
