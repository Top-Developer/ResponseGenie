@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    <img src="images/{{ Session::get('image') }}">
@endif
<form class = "form-horizontal" action = "{{url('/event/configure')}}" method = "post" enctype = 'multipart/form-data'>
    <input type = 'hidden' name = 'active_tab' value = 'tab_2_3'>
    {{csrf_field()}}
    <h1 style="text-align: center;">
        Configure event
    </h1>
    <div class = "row">
        <div class = "col-md-6">
            <div class="row form-group">
                <label class="col-md-4 control-label" for = "event_name">Event Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Event Name" id = "event_name" name = "event_name" value = "{{ $event -> name }}">
                </div>
            </div>
        </div>
        <div class = "col-md-6">
            <div class="row form-group">
                <label class="col-md-4 control-label" for = "event_slug">Event Slug</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Evnt Slug" id = "event_slug" name = "event_slug" value = "{{ $event -> slug }}">
                </div>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="form-group">
            <label class="col-md-2 control-label" for = "event_desc_pub">Event Description<br>( Public )</label>
            <div class="col-md-9">
                <textarea class="form-control" rows = "5" placeholder="Event Description" id = "event_desc_pub" name = "event_desc_pub">{{ $event -> description }}</textarea>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="form-group">
            <label class="col-md-2 control-label" for = "event_desc_prv">Event Description<br>( Members Only )</label>
            <div class="col-md-9">
                <textarea class="form-control" rows = "5" placeholder="Event Description" id = "event_desc_prv" name = "event_desc_prv">{{ $event -> short_description }}</textarea>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="form-group">
            <label class="col-md-2 control-label" for = "event_logo">event Logo</label>
            <div class = "col-md-3">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;">
                        <img src = '{{$event -> logo_path}}'>
                    </div>
                    <div>
                                                                    <span class="btn red btn-outline btn-file">
                                                                        <span class="fileinput-new"> Change image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="cevent_logo"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                    </div>
                </div>
            </div>
            <div class = 'col-md-6'>
                <div class = "row form-group">
                    <label class="col-md-4 control-label" for = "zip_code">Zip Code</label>
                    <div class = "col-md-4">
                        <input type="text" class="form-control" placeholder="Zip Code" id = "zip_code"  name = "zip_code" value = "{{ $theContact -> zipcode }}">
                    </div>
                </div>
                <div class = "row form-group">
                    <label class="col-md-4 control-label" for = "event_access">Event Access</label>
                    <div class = "col-md-4">
                        <select type="text" class="form-control" id = "event_access"  name = "event_access">
                            <option @if($event -> access == 'Public'){{'selected'}}@endif>Public</option>
                            <option @if($event -> access == 'Members Only'){{'selected'}}@endif>Members Only</option>
                            <option @if($event -> access == 'Private'){{'selected'}}@endif>Private</option>
                        </select>
                    </div>
                    <div class = "col-md-4">
                        <button type="submit" class="btn green" style = 'float:right; margin-right:30px;'>Submit</button>
                    </div>
                </div>
                <div class = "row form-group">
                    <div class = "col-md-offset-4 col-md-8">
                        <input type="checkbox" id = "display_guest" name = "dg">
                        <label for = "display_guest">Display guest list to all guests?</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>