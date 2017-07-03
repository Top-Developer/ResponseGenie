$(function(){
    $('.md-input.form-control').on('change', function(){
        if( '' != $(this).val() ){
            if( !$(this).hasClass('edited') )
                $(this).addClass('edited');
        }
        if( '' == $(this).val() ){
            if( $(this).hasClass('edited') )
                $(this).removeClass('edited');
        }
    });
});
var Login = function () {

    var handleLogin = function() {
        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true
                },
                remember: {
                    required: false
                }
            },

            messages: {
                username: {
                    required: "Email is required."
                },
                password: {
                    required: "Password is required."
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function (form) {
                form.submit();
            }
        });

        $('.login-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit();
                }
                return false;
            }
        });
    }

    var handleForgetPassword = function () {
        $('.forget-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },

            messages: {
                email: {
                    required: "Email is required."
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit

            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function (form) {
                form.submit();
            }
        });

        $('.forget-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        // jQuery('#forget-password').click(function () {
        //     jQuery('.login-form').hide();
        //     jQuery('.forget-form').show();
        // });
        //
        // jQuery('#back-btn').click(function () {
        //     jQuery('.login-form').show();
        //     jQuery('.forget-form').hide();
        // });

    }

    jQuery.validator.addMethod("zipcode", function(value, element) {
        return this.optional(element) || /^\d{5}(?:-\d{4})?$/.test(value);
    }, "Please provide a valid zipcode.");

    var handleRegister = function () {

        $('.create-event-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                event_name: {
                    required: true
                },
                event_slug: {
                    required: true
                },
                event_description: {
                    required: true
                },
                event_short_description: {
                    required: true
                },
                event_memberlimit: {
                    number: true
                },
                event_zipcode: {
                    required: true,
                    zipcode: true
                },
                event_type: {
                    required: true
                }
            },

            messages: { // custom messages for radio buttons and checkboxes
            },

            invalidHandler: function (event, validator) { //display error alert on form submit

            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                if (element.attr("name") == "tnc") { // insert checkbox errors after the container
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                form.submit();
            }
        });

        $('.create-event-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.create-event-form').validate().form()) {
                    $('.create-event-form').submit();
                }
                return false;
            }
        });

        // jQuery('#register-btn').click(function () {
        //     jQuery('.login-form').hide();
        //     jQuery('.register-form').show();
        // });
        //
        // jQuery('#register-back-btn').click(function () {
        //     jQuery('.login-form').show();
        //     jQuery('.register-form').hide();
        // });
    }

    var handleUpdateMessage = function () {

        $('.message-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                club_message: {
                    required: true
                },
                club_renewal_message: {
                    required: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit

            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                if (element.attr("name") == "tnc") { // insert checkbox errors after the container
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                form.submit();
            }
        });

        $('.message-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.message-form').validate().form()) {
                    $('.message-form').submit();
                }
                return false;
            }
        });

        // jQuery('#register-btn').click(function () {
        //     jQuery('.login-form').hide();
        //     jQuery('.register-form').show();
        // });
        //
        // jQuery('#register-back-btn').click(function () {
        //     jQuery('.login-form').show();
        //     jQuery('.register-form').hide();
        // });
    }

    return {
        //main function to initiate the module
        init: function () {

            handleLogin();
            handleForgetPassword();
            handleRegister();
            handleUpdateMessage();

        }
    };

}();

jQuery(document).ready(function() {
    Login.init();
});

