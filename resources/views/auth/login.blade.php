@extends('layouts.access')

@section('title')
    Login
@endsection

@section('content')
    <div class="content">
        @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('status') }} status-box">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{ Session::get('message') }}
            </div>
        @endif

        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{url('/login')}}" method="post">
            {{ csrf_field() }}
            <h3 class="form-title">Login to your account</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter any username and password. </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9{{ $errors->has('email') ? ' has-error' : '' }}">Email</label>
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <input class="form-control placeholder-no-fix" type="text" name="email" placeholder="Email" value="{{old('email')}}" />
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9{{ $errors->has('password') ? ' has-error' : '' }}">Password</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" />
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-actions">
                <label class="checkbox">
                    <input type="checkbox" name="remember" value="1" /> Remember me </label>
                <button type="submit" class="btn green pull-right"> Login </button>
            </div>
            <div class="login-options">
                <h4>Or login with</h4>
                <ul class="social-icons">
                    <li>
                        <a class="facebook" data-original-title="facebook" href="{{url('/social/facebook')}}"> </a>
                    </li>
                    <li>
                        <a class="twitter" data-original-title="Twitter" href="{{url('/social/twitter')}}"> </a>
                    </li>
                    <li>
                        <a class="googleplus" data-original-title="Goole Plus" href="{{url('/social/google')}}"> </a>
                    </li>
                    <li>
                        <a class="linkedin" data-original-title="Linkedin" href="{{url('/social/linkedin')}}"> </a>
                    </li>
                </ul>
            </div>
            <div class="forget-password">
                <h4>Forgot your password ?</h4>
                <p> no worries, click
                    <a href="{{url('/password/reset')}}" id="forget-password" style="color: #AFEEEE"> here </a> to reset your password. </p>
            </div>
            <div class="create-account">
                <p> Don't have an account yet ?&nbsp;
                    <a href="{{url('/register')}}" id="register-btn" style="color: #AFEEEE"> Create an account </a>
                </p>
            </div>
        </form>
        <!-- END LOGIN FORM -->
    </div>
@endsection
