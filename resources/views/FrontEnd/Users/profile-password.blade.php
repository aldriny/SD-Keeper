
@extends('FrontEnd.Layouts.user-layout')
@section('title','Change Password')

@section('content')
<div class="container p-4 mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-orange">Change Password</div>
                <div class="card-body text-black-50">
                    <form method="POST" action="{{ route('user.change.password2') }}">
                        @csrf 
                        @if (session()->get('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                        @endif
                        @csrf 
                        @if (session()->get('fail'))
                        <div class="alert alert-danger">{{session()->get('fail')}}</div>
                        @endif
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">          
                            <strong>Sorry!</strong> There were a problem with changing your password.<br><br>         
                            <ul>         
                              @foreach ($errors->all() as $error)        
                                  <li>{{ $error }}</li>        
                              @endforeach        
                            </ul>         
                        </div>          
                        @endif
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn bg-orange">
                                    Update Password
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