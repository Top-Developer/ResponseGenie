@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12  header-wrapper" >
            <h1 class="page-header">Account Settings</h1>
        </div>
    </div>
    <hr />

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="fa fa-gear icon"></span>Account Settings</a> </li>
                    <li class=""><a href="#transactions" data-toggle="tab" aria-expanded="false"> <span class="fa fa-user icon"></span>My Transactions</a> </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade padding active in" id="settings">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>My Information</h4>
                                <form role="form" action="/account/settings" method="post" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Profile Image</label>
                                        <input type="file" name="profile_image">
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control{{ $errors->has('first_name') ? ' has-error' : '' }}" name="first_name" value="{{ $user->first_name }}">
                                        @if ($errors->has('first_name'))
                                            <p class="help-block">{{ $errors->first('first_name') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control{{ $errors->has('last_name') ? ' has-error' : '' }}" name="last_name" value="{{ $user->last_name }}">
                                        @if ($errors->has('last_name'))
                                            <p class="help-block">{{ $errors->first('last_name') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ $user->email }}" disabled="disabled">
                                        @if ($errors->has('email'))
                                            <p class="help-block">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>ZIP</label>
                                        <input type="text" class="form-control{{ $errors->has('zip') ? ' has-error' : '' }}" name="zip" value="{{ $user->zip }}">
                                        @if ($errors->has('zip'))
                                            <p class="help-block">{{ $errors->first('zip') }}</p>
                                        @endif
                                    </div>


                                    <button type="submit" class="btn btn-default pull-right">Update Account</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <h4>Change Password</h4>
                                <form role="form" action="/account/changepassword" method="post">

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                        @if ($errors->has('old_password'))
                                            <p class="help-block">{{ $errors->first('old_password') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" class="form-control{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                        @if ($errors->has('new_password'))
                                            <p class="help-block">{{ $errors->first('new_password') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                        @if ($errors->has('confirm_password'))
                                            <p class="help-block">{{ $errors->first('confirm_password') }}</p>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-default pull-right">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade padding" id="transactions">
                        <p>
                            You currently have no transactions to display!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
