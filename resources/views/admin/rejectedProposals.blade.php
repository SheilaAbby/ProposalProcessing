@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 margin-tb">
            <div class="panel panel-default float-left">
                <div class="panel-heading"><b>Accepted Proposals</b></div>

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
                                
                                </tr>
                            
                            </thead>

                                @foreach($rejected_Proposals as $rejected)
                                <tr>
                                <td>{{$rejected->id}}</td>
                                <td>{{$rejected->title}}</td>
                                <td>{{$rejected->organization_name}}</td>
                                 <td>{{$rejected->email}}</td>
                                 <td>{{$rejected->Status}}</td>

                                
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                        <div class="text-center" >
                            {!!$rejected_Proposals ->links();!!}
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
