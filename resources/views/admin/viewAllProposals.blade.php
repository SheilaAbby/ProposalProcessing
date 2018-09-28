@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 margin-tb">
            <div class="panel panel-default float-left">
                <div class="panel-heading"><b>All Proposals</b></div>

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

                                @foreach($sentProposals as $sentProposal)
                                <tr>
                                <td>{{$sentProposal->id}}</td>
                                <td>{{$sentProposal->title}}</td>
                                <td>{{$sentProposal->organization_name}}</td>
                                 <td>{{$sentProposal->email}}</td>
                                 <td>{{$sentProposal->Status}}</td>

                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.showProposal',$sentProposal->id) }}">Show</a>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                        <div class="text-center" >
                            {!!$sentProposals->links();!!}
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
