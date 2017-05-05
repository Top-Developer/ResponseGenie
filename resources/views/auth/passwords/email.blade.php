@extends('layouts.access')

<!-- Main Content -->
@section('content')

    <div class="content">
        <!-- BEGIN FORGOT PASSWORD FORM -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="forget-form" action="{{ url('/password/email') }}" method="post">
            {{ csrf_field() }}
            <h3>Forget Password ?</h3>
            <p> Enter your e-mail address below to reset your password. </p>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <input class="form-control placeholder-no-fix {{ $errors->has('email') ? ' has-error' : '' }}" type="text" name="email" value="{{ $email or old('email')}}" />
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-actions">
                <a href="{{url('/login')}}" type="button" id="back-btn" class="btn red btn-outline">Back </a>
                <button type="submit" class="btn green pull-right"> Submit </button>
            </div>

        </form>
        <!-- END FORGOT PASSWORD FORM -->
    </div>

@endsection
