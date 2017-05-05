@extends('layouts.access')

@section('title')
    SignUp
@endsection

@section('content')
    <div class="content">

        <!-- BEGIN REGISTRATION FORM -->
        <form class="reg-form" action="{{url('/register')}}" method="post">
            {{ csrf_field() }}
            <h3>Sign Up</h3>
            <p> Enter your personal details below: </p>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="control-label visible-ie8 visible-ie9">Full Name</label>
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input class="form-control placeholder-no-fix {{ $errors->has('first_name') ? ' has-error' : '' }}" type="text" name="first_name" placeholder="First Name" value="{{old('first_name')}}"/>
                    </div>
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix {{ $errors->has('last_name') ? ' has-error' : '' }}" type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}"/>
                    </div>
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Address</label>
                <div class="input-icon">
                    <i class="fa fa-check"></i>
                    <input class="form-control placeholder-no-fix {{ $errors->has('address') ? ' has-error' : '' }}" type="text" name="address" placeholder="Address" value="{{old('address')}}"/>
                </div>
                @if ($errors->has('address'))
                    <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="control-label visible-ie8 visible-ie9">City/Town</label>
                    <div class="input-icon">
                        <i class="fa fa-location-arrow"></i>
                        <input class="form-control placeholder-no-fix {{ $errors->has('city') ? ' has-error' : '' }}" type="text" name="city" placeholder="City/Town" value="{{old('city')}}"/>
                    </div>
                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <label class="control-label visible-ie8 visible-ie9">State</label>
                    <select name="state" id="state_list" class="select2 form-control" value="{{old('state')}}>
                        <option value=""></option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="control-label visible-ie8 visible-ie9">Zip code</label>
                    <div class="input-icon">
                        <i class="fa fa-globe"></i>
                        <input class="form-control placeholder-no-fix {{ $errors->has('zip') ? ' has-error' : '' }}" type="text" name="zip" placeholder="Zip Code" value="{{old('zip')}}"/>
                    </div>
                    @if ($errors->has('zip'))
                        <span class="help-block">
                            <strong>{{ $errors->first('zip') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-sm-6">
                    <label class="control-label visible-ie8 visible-ie9">Phone Number</label>
                    <div class="input-icon">
                        <i class="fa fa-phone"></i>
                        <input class="form-control placeholder-no-fix {{ $errors->has('phone') ? ' has-error' : '' }}" type="text" name="phone" placeholder="Phone Number" value="{{old('phone')}}"/>
                    </div>
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <p> Enter your account details below: </p>

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

            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9{{ $errors->has('confirm_password') ? ' has-error' : '' }}">Re-type Your Password</label>
                <div class="controls">
                    <div class="input-icon">
                        <i class="fa fa-check"></i>
                        <input class="form-control placeholder-no-fix" type="password" name="password_confirmation" placeholder="Confirm Password" />
                    </div>
                </div>
                @if ($errors->has('confirm_password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('confirm_password') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="tnc" /> I agree to the
                    <a href="javascript:;" style="color: #AFEEEE"> Terms of Service </a> and
                    <a href="javascript:;" style="color: #AFEEEE"> Privacy Policy </a>
                </label>
                <div id="register_tnc_error"> </div>
            </div>
            <a href="{{url('/login')}}" style="color: #AFEEEE">I already have a account</a>
            <div class="form-actions">
                <a href="{{url('/')}}" class="btn red btn-outline"> Home </a>
                <button type="submit" id="register-submit-btn" class="btn green pull-right"> Sign Up </button>
            </div>
        </form>
        <!-- END REGISTRATION FORM -->
    </div>
    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <div class="copyright"> 2017 &copy; Rosterfi - Club Membership Subscription. </div>

@endsection