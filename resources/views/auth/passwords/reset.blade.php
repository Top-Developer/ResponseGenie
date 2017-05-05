@extends('layouts.access')

@section('title')
    Reset Password
@endsection

@section('content')
<div class="content" id="login-form">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h2>Reset Password</h2>
        <br>
        <form class="forget-form" role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <input id="email" type="email" placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ $email or old('email') }}" autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>

            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Reset Password</button>
        </form>

</div>
@endsection

