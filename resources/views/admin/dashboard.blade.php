@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="panel panel-default pull-left">
                <div class="panel-heading">Admin's  Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Proposal Title</th>
                                    <th>Organisation Name</th>
                                    <th>Actions</th>
                                </tr>
                            
                            </thead>

                                @foreach($proposals as $proposal)
                                <tr>
                                <td>{{++$i}}</td>
                                <td>{{$proposal->title}}</td>
                                <td>{{$proposal->organisation_name}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('proposals.show',$proposal->id) }}">Show</a>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
