<div class="note note-info">
    <h4 style="text-align:center;">Club Name : {{$theClub -> name}}</h4>
    <div class="row">
        <div class = "col-md-6">
            <img src="/../storage/app/{{$theClub -> logo_path}}" class="card-body-image">
        </div>
        <div class = "col-md-6">
            Club Description :<br>{{ $theClub -> description }}
        </div>
    </div>
</div>

<div class="note note-info">
    <div class = "row">
        @if( $theUserRole == 'owner' || $theUserRole == 'admin' )
            <div style="float:right;">
                <a type="button" class="btn btn-danger"  data-toggle="modal" href="#edit_contact_info"> Edit contact information </a>
            </div>
        @endif
        <h3 style="text-align:center;">Location and Contact Information</h3>
    </div>
    <div class="row">
        <div class="col-md-3">
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-twitter tooltips" data-original-title="Twitter"></a>
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-yellow font-white bg-hover-grey-salsa socicon-facebook tooltips" data-original-title="Facebook"></a>
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-google tooltips" data-original-title="Google"></a>
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-twitter tooltips" data-original-title="Twitter"></a>
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-yellow font-white bg-hover-grey-salsa socicon-facebook tooltips" data-original-title="Facebook"></a>
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-google tooltips" data-original-title="Google"></a>
        </div>
        <div class="col-md-3">
            <div id="gmap_basic" class="gmaps"> </div>
        </div>
        <div class="col-md-3">
            <h1>City : {{ $theContact -> city }}</h1><br>
            <h1>State : {{ $theContact -> state }}</h1><br>
            <h1>Country : {{ $theContact -> country }}</h1>
        </div>
        @if( $thePCM || $theSCM )
            <div class="col-md-3">
                @if($thePCM)
                    <div class = "row">
                        <div class = "col-md-6 contact-member">
                            @if( $thePCM -> profile_image != '')
                                <img src="/../storage/app/{{ $thePCM -> profile_image }}">
                            @else
                                <img src="/uploads/images/users/0.png">
                            @endif
                        </div>
                        <div class = "col-md-6">
                            <h4>
                                {{$thePCM -> first_name}} {{$thePCM -> last_name}}
                            </h4>
                            <h4>
                                {{$thePCMRole}}
                            </h4>
                            <h4>
                                {{$thePCM -> email}}
                            </h4>
                        </div>

                    </div>
                @endif
                @if($theSCM)
                    <div class = "row">
                        <div class = "col-md-6 contact-member">
                            @if( $theSCM -> profile_image != '')
                                <img src="/{{ $theSCM -> profile_image }}">
                            @else
                                <img src="/uploads/images/users/0.png">
                            @endif
                        </div>
                        <div class = "col-md-6">
                            <h4>
                                {{$theSCM -> first_name}} {{$theSCM -> last_name}}
                            </h4>
                            <h4>
                                {{$theSCMRole}}
                            </h4>
                            <h4>
                                {{$theSCM -> email}}
                            </h4>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>