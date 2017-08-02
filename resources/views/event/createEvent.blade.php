@extends('layouts.hometemplate')

@section('title')
    Create a New Event
@endsection

@push('asset')

<!-- File Input -->
<link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />


<style type="text/css">
    .plan-body h3{
        font-size: 60px;
        font-weight: 500;
        color: rgb(3, 153, 221);
        position: relative;
    }
    .page-title{
        margin: 50px auto 20px;
    }
    div.has-error input ~ span.help-block, div.has-error select ~ span.help-block, div.has-error textarea ~ span.help-block{
        opacity: 0 !important;
    }

    div.has-error input + span.help-block, div.has-error select + span.help-block, div.has-error textarea + span.help-block{
        opacity:1 !important;
        color:#e73d4a !important;
    }

    textarea {
        resize: none;
    }

</style>

@endpush

@section('content')
    <div class="container" style = 'margin-bottom:30px;'>
        <div class="row">
            <div class="col-md-12">

                @if(Session::has('message'))
                    <div class="alert alert-{{ Session::get('status') }} status-box"  style = 'text-align:center;'>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ Session::get('message') }}
                    </div>
                @endif

                <h1 class="space-top page-title text-center">Create a New Event</h1>
                <section class="space-top space-bottom">

                    <form class="create-event-form" action="{{url('/event/create')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class = "row">
                            <div class="col-xs-12 col-sm-offset-2 col-sm-3">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="form_control_event_name" name = "event_name">
                                    <label for="form_control_event_name">Event Name</label>
                                    <span class="help-block">The name of the event</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-offset-2 col-sm-3">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="form_control_event_slug" name = "event_slug">
                                    <label for="form_control_event_slug">Event Slug</label>
                                    <span class="help-block">Short name of the event</span>
                                </div>
                            </div>
                        </div>

                        <div class = "row">
                            <div class = "col-xs-12 col-sm-offset-2 col-sm-8">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control" rows="3" id ="form_control_event_description" name ="event_description"></textarea>
                                    <label for="form_control_event_description">Event Description</label>
                                    <span class="help-block">Public description of the event</span>
                                </div>
                            </div>
                        </div>

                        <div class = "row">
                            <div class = "col-xs-12 col-sm-offset-2 col-sm-8">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control" rows="2" id ="form_control_event_short_description" name ="event_short_description"></textarea>
                                    <label for="form_control_event_short_description">Event Short Description</label>
                                    <span class="help-block">Private description for members only</span>
                                </div>
                            </div>
                        </div>

                        <div class = "row">
                            <div class="col-xs-12 col-sm-offset-2 col-sm-3">
                                <label style="color: #888;">Event Logo</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"> </div>
                                    <div>
                                            <span class="btn green btn-outline btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="event_logo">
                                            </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class = 'row'>
                            <div class = 'col-xs-12 col-sm-offset-2 col-sm-3'>
                                <div class="form-group">
                                    <div >
                                        <label class="control-label">Start Date/Time</label>
                                    </div>
                                    <div>
                                        <div class = 'datetimepicker start' data-date-format = 'yyyy-MM-dd hh:mm-ss'></div>
                                    </div>
                                </div>
                            </div>
                            <div class = 'col-xs-12 col-sm-offset-2 col-sm-3'>
                                <div class="form-group">
                                    <div>
                                        <label class="control-label">End Date/Time</label>
                                    </div>
                                    <div>
                                        <div class = 'datetimepicker end' data-date-format = 'yyyy-MM-dd hh:mm-ss'> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class = "row">
                            <div class="col-xs-12 col-sm-offset-2 col-sm-2">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="form_control_event_addr" name ="event_addr">
                                    <label for="form_control_event_addr">Address</label>
                                    <span class="help-block">The address of the event</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-offset-1 col-sm-2">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="form_control_event_city" name ="event_city">
                                    <label for="form_control_event_city">City</label>
                                    <span class="help-block">The city of the event</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-offset-1 col-sm-2">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="form_control_event_stat" name ="event_state">
                                    <label for="form_control_event_stat">State</label>
                                    <span class="help-block">The state of the event</span>
                                </div>
                            </div>
                        </div>

                        <div class = "row">
                            <div class = "col-xs-12 col-sm-offset-2 col-sm-2">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <select class="form-control" id="form_control_event_access"  name = "event_access">
                                        <option value="" selected></option>
                                        <option value="Ivite Only">Invite Only</option>
                                        <option value="Members Only">Members Only</option>
                                        <option value="Public">Public</option>
                                    </select>
                                    <label for="form_control_event_access">Event Access</label>
                                    <span class="help-block">Access of the Event</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-offset-1 col-sm-2">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="form_control_event_zcod" name = "event_zipcode">
                                    <label for="form_control_event_zcod">Zip Code</label>
                                    <span class="help-block">The zip code of the event</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-offset-1 col-sm-2">
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <input type="text" class="form-control" id="form_control_event_mlim" name ="event_memberlimit">
                                    <label for="form_control_event_mlim">Member Limit</label>
                                    <span class="help-block">The limit of members</span>
                                </div>
                            </div>
                        </div>

                        <div class = 'row'>
                            <div class="col-xs-12 col-sm-offset-2 col-sm-10">
                                <input name='disp_guest' type="checkbox" checked> Display guest list to all guests?
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn green pull-right"> Event Create </button>
                        </div>
                        <input type = 'hidden' name = 'event_start'>
                        <input type = 'hidden' name = 'event_end'>
                    </form>
                </section>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('script')

<script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

<script type="text/javascript">
    var click = false;
    $(function() {
        //Preview Avatar image
        $('body').on('change', '#clublogo', function() {
            var imageprev = $(".img-preview");
            if (this.files && this.files[0]) {
                //validation
                var ext = $(this).val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    alert("Invalid Image Format");
                    return;
                }

                //Image preview
                var reader = new FileReader();
                reader.onload = function(e) {
                    imageprev.attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    $(function() {
        $('.datetimepicker').datetimepicker({
            format: "yyyy-mm-ddThh:ii:ss"
        });
    });
    $(function(){
        $('.create-event-form').on('submit', function(e){
            var start = $('.datetimepicker.start').data('datetimepicker');
            var end = $('.datetimepicker.end').data('datetimepicker');
            var start_iso = start.date.toISOString();
            var start_date = start_iso.substring(0, start_iso.length-5).replace('T', ' ');
            var end_iso = end.date.toISOString();
            var end_date = end_iso.substring(0, end_iso.length-5).replace('T', ' ');

            $('input[name="event_start"]').val(start_date);
            $('input[name="event_end"]').val(end_date);
        })
    });

</script>
<script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="/js/event/create-event.js" type="text/javascript"></script>

@endpush