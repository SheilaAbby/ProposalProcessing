@extends('layouts.app')

@section('content')
<div class="container" float="left">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Applicant's Dashboard<b></div>

                <div class="panel-body" >
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                         <form class="form-horizontal" method="POST" action="{{ route('proposals.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Proposal Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus >

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('organization_name') ? ' has-error' : '' }}">
                            <label for="organization_name" class="col-md-4 control-label">Organization name</label>

                            <div class="col-md-6">
                                <input id="organization_name" type="text" class="form-control" name="organization_name" value="{{ old('organization_name') }}" required>

                                @if ($errors->has('organization_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organization_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('submitted_by_name') ? ' has-error' : '' }}">
                            <label for="submitted_by_name" class="col-md-4 control-label">submitted By</label>

                            <div class="col-md-6">
                                <input id="submitted_by_name" type="text" class="form-control" name="submitted_by_name" value="{{ old('submitted_by_name') }}" required>

                                @if ($errors->has('submitted_by_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('submitted_by_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                            <label for="summary" class="col-md-4 control-label">Summary</label>

                            <div class="col-md-6">
                                <textarea id="summary" type="text" class="form-control" name="summary" value="{{ old('summary') }}" required></textarea>

                                @if ($errors->has('summary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('summary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('background') ? ' has-error' : '' }}">
                            <label for="background" class="col-md-4 control-label">Background</label>

                            <div class="col-md-6">
                                <textarea id="background" type="text" class="form-control" name="background" value="{{ old('background') }}" required></textarea>

                                @if ($errors->has('background'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('background') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('activities') ? ' has-error' : '' }}">
                            <label for="activities" class="col-md-4 control-label">Activities</label>

                            <div class="col-md-6">
                                <textarea id="activities" type="text" class="form-control" name="activities" value="{{ old('activities') }}" required></textarea>

                                @if ($errors->has('activities'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('activities') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has(' budget') ? ' has-error' : '' }}">
                            <label for="budget" class="col-md-4 control-label">Budget</label>

                            <div class="col-md-6">
                                <input id="budget" type="file" class="form-control form-input form-style-base" name="budget" value="{{ old('budget') }}" required accept="application/pdf">
                                <h4>Upload Pdf</h4>

                                @if ($errors->has(''))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('budget') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Save as draft
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
