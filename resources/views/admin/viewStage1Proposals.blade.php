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

                                @foreach($stage1Proposal as $Stage_1)
                                <tr>
                                <td>{{$Stage_1->id}}</td>
                                <td>{{$Stage_1->title}}</td>
                                <td>{{$Stage_1->organization_name}}</td>
                                 <td>{{$Stage_1->email}}</td>
                                 <td>{{$Stage_1->Status}}</td>

                                <td>
                                    <a class="btn btn-info" href="{{ route('admin. showStage1Proposal',$Stage_1->id) }}">Show</a>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                        <div class="text-center" >
                            {!!$stage1Proposal->links();!!}
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
