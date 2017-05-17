<h1 style = "text-align: center;">
    club name : {{ $theClub -> name }}
</h1>
<h2 style = "text-align: center;">
    club description : {{ $theClub -> description }}
</h2>
@if( $theUserRole == 'owner' || $theUserRole == 'admin' )
    <div class = "row">
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn blue btn-outline" data-toggle="modal" href="#invite"> Invite </button>
        </div>
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn green btn-outline" data-toggle="modal" href="#import"> Import </button>
        </div>
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn yellow btn-outline"> Spreadsheet View </button>
        </div>
    </div>
@endif

@foreach( $theClubUsers as $aUser )
    <div class = "note note-info">
        <div class = "row">
            <div class = "col-md-2">
                {{$aUser -> profile_image}}
                @if( $aUser -> profile_image != '')
                    <img src="/{{ $theSCM -> profile_image }}">
                @else
                    <img src="/uploads/images/users/0.png">
                @endif
            </div>
            <div class = "col-md-4">
                <h4>
                    {{ $aUser -> first_name }} {{ $aUser -> last_name }}
                </h4>
                <h4>
                    @if( 'special' == App\Role::find( App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> role_id ) -> role_description)
                        special
                    @else
                        {{App\Role::find( App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> role_id ) -> role_description}}
                    @endif

                </h4>
            </div>
            <div class = "col-md-6">

            </div>
        </div>
    </div>
@endforeach