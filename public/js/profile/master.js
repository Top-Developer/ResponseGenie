$(function () {
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
    
    var index = 0; // Declaring global values.

    // Dynamically add new image box every time new button clicked    
    $('#add_more').on('click', function() {
        index ++;
        var imageblock = '<img class="img-preview" src="http://www.placehold.it/150x150/EFEFEF/AAAAAA&amp;text=Click+Me">' + 
                         '<input type="file" name="file[]" id="file"/>';
        $('#filediv').after($("<div/>", {id: 'filediv', class:'col-sm-2 filediv'}).fadeIn('slow').append(imageblock));
        if(index == 4) $('#add_more').fadeOut(500, function() { $(this).attr('disabled', true); });
    });

    //Preview portfolio
    $('body').on('change', '#file', function() {
        var imageprev = $(this).siblings(".img-preview");
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

    //Preview Avatar image
    $('body').on('change', '#file_avatar', function() {
        var imageprev = $(".img-avatar-preview");
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
    
    //When mouse clicks a legion box, remember its id.
    $('.m-heading-1').on('click', function() {
        $(this).css('background', 'rgb(197, 244, 248)');
        $(this).siblings().css('background', '#fff');
        $("input[name='legionindex']").val($(this).attr('id'));
    });    

    $('.button-next').on('click', function() {
        $('#header-statement').fadeOut(500);
    });
    
});