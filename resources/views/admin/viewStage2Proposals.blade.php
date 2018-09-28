@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 margin-tb">
            <div class="panel panel-default float-left">
                <div class="panel-heading"><b>Proposals Sent</b></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Proposal Title</th>
                                    <th>Organisation Name</th>
                                     <th>Organisation Name</th>
                                     <th>Proposal Status</th>
                                    <th>Actions</th>
                                </tr>
                            
                            </thead>

                                @foreach($stage2Proposal as $Stage_2)
                                <tr>
                                <td>{{$Stage_2->id}}</td>
                                <td>{{$Stage_2->title}}</td>
                                <td>{{$Stage_2->organization_name}}</td>
                                 <td>{{$Stage_2->email}}</td>
                                 <td>{{$Stage_2->Status}}</td>

                                <td>
                                    <a class="btn btn-info" href="{{ route('admin. showStage2Proposal',$Stage_2->id) }}">Show</a>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                        <div class="text-center" >
                            {!!$stage2Proposal->links();!!}
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
