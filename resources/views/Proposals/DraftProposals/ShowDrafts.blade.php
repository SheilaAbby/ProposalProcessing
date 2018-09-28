@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 margin-tb">
            <div class="panel panel-default float-left">
                <div class="panel-heading"><b>Saved Drafts</b></div>

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
                                    <th>Proposal Summary</th>
                                     <th>Time Created</th>
                                    <th>Actions</th>
                                </tr>
                    
                            </thead>

                                @foreach($proposal as $draft)
                                <tr>
                                <td>{{$draft->id}}</td>
                                <td>{{$draft->title}}</td>
                                <td>{{$draft->summary}}</td>
                                 <td>{{$draft->created_at}}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('EditDraft',$draft->id) }}">Edit</a>
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
</div>
@endsection
