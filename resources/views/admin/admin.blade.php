@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 margin-tb">

            <div  id="sidebar">
                    <ul>
            <li><a href="{{route('admin.newProposals')}}"><button>See New Proposals</button></a></a>&nbsp;&nbsp;&nbsp;
             <a href="{{route('admin.Stage_1_Proposals')}}"><button>See Stage 1 Proposals</button></a>&nbsp;&nbsp;&nbsp;
             <a href="{{route('admin.Stage_2_Proposals')}}"><button>See Stage 2 Proposals</button></a>&nbsp;&nbsp;&nbsp;
             <a href="{{route('admin.AcceptedProposals')}}"><button>See Accepted Proposals</button></a>&nbsp;&nbsp;&nbsp;
             <a href="{{route('admin.RejectedProposals')}}"><button>See Rejected Proposals</button></a>&nbsp;&nbsp;&nbsp;
            </div><br>
        </ul>
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
