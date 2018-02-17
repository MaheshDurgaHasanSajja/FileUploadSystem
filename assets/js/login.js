/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {
    init();
});
function init() {
    initLoginFormValidation();
    initRegisterFormValidation();
    initMultipleSelect();
    initLectureFormValidation();
}

/**
 * Function to load mutliple text field
 * 
 * @returns {undefined}
 */
function initMultipleSelect() {
    $(".js-source-states-2").select2();
}

/**
* Function to intialize login form validation
*/
function initLoginFormValidation() {
	$('#login_form').validate({
        errorElement: 'label',
        errorClass: 'error',
        focusInvalid: false,
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Email is required",
                email: "Enter valid email address"
            },
            password: {
                required: "Password is required"
            },
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-danger', $('#login_form')).show();
        },
        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },
        unhighlight: function (element) { // <-- fires when element is valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-info');
        },
        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
            $(e).remove();
        }
    });
}

/**
* Function to intialize registeration form
*/
function initRegisterFormValidation() {
    $('#register_form').validate({
        ignore: "",
        errorElement: 'label',
        errorClass: 'error',
        focusInvalid: false,
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
            passconf: {
                equalTo: "#password"
            },
            'semister_id[]': {
                required: true,
            },
            'year[]': {
                required: true,
            }
        },
        messages: {
            email: {
                required: "Email is required",
                email: "Enter valid email address"
            },
            password: {
                required: "Password is required"
            },
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-danger', $('#register_form')).show();
        },
        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },
        unhighlight: function (element) { // <-- fires when element is valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-info');
        },
        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
            $(e).remove();
        },
        errorPlacement: function (error, element) {
            if (element.is(':radio')) {
                error.insertAfter(element.parent().parent());
            }else if (element.is(":checkbox")) {
                error.insertAfter(element.parent().parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
}

/**
* Function to initialize lecturer form validation
*/
function initLectureFormValidation() {
    $('#lecturer_register_form').validate({
        ignore: "",
        errorElement: 'label',
        errorClass: 'error',
        focusInvalid: false,
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
            passconf: {
                equalTo: "#password"
            },
        },
        messages: {
            email: {
                required: "Email is required",
                email: "Enter valid email address"
            },
            password: {
                required: "Password is required"
            },
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-danger', $('#lecturer_register_form')).show();
        },
        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },
        unhighlight: function (element) { // <-- fires when element is valid
            $(element).closest('.form-group').removeClass('has-error').addClass('has-info');
        },
        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error').addClass('has-info');
            $(e).remove();
        },
        errorPlacement: function (error, element) {
            if (element.is(':radio')) {
                error.insertAfter(element.parent().parent());
            }else if (element.is(":checkbox")) {
                error.insertAfter(element.parent().parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
}