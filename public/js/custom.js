/* Theme Name: The Project - Responsive Website Template
 * Author:HtmlCoder
 * Author URI:http://www.htmlcoder.me
 * Author e-mail:htmlcoder.me@gmail.com
 * Version:1.1.0
 * Created:March 2015
 * License URI:http://support.wrapbootstrap.com/
 * File Description: Place here your custom scripts
 */


$(function () {
    var file;

    if ($('#datetimepicker1').length > 0)
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    if ($('#datetimepicker2').length > 0)
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    if ($('#datetimepicker3').length > 0)
        $('#datetimepicker3').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    if ($('#datetimepicker4').length > 0)
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    // if ($('#datetimepicker6').length > 0)
    //     $('#datetimepicker6').datetimepicker({
    //         format: 'LT'
    //     });


    //$('#signupsubscribe').hide();
    $('.subscribe').on('click',(function(){
    	$('#signupchoose').hide('slide', {direction: 'left'}, 1000);
    	$('#signupsubscribe').show('slide', {direction: 'right'}, 1000);
    }));

    $.uploadPreview({
        input_field: "#image-upload",
        preview_box: "#image-preview",
        label_field: "#image-label"
    });

    $('#btnUpload').on("click", function() {
        file = $('#image-upload')[0].files[0];
        var formdata = new FormData();
        var reader = new FileReader();
        reader.onloadend = function(e) {
            $('#btnUpload').val('Wait...');
            formdata.append("_token", $('meta[name="csrf-token"]').attr("content"));
            formdata.append("image", file);

            $.ajax({
                url: $("#image_upload_url").val(),
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data == 'fail') {
                        alert("Failed to upload image.");
                        $('#btnUpload').val('Failed Upload!');
                    } else {
                        $('input[name="image"]').val(data);
                        $('#btnUpload').val('Success!');
                        $('#btnUpload').addClass('btn-success');
                    }
                }
            });
        };
        reader.readAsDataURL(file);
    });

    
});

