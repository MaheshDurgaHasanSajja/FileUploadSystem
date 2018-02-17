/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {
    init();
});
function init() {
    initJqueryValidation();
    initJqueryDataTable();
    initValidators();
    initYesNoAlert();
    initSetupSemisterValidation();
    initIndividualDelete();
    initSetupGroupValidation();
    initSetupSubjectValidation();
    initFileuploadDataTable();
    initUserLIstOfFilesDataTable();
    initLecturerDataTables();
    initLecturerUploads();
}

/**
* Function to initialize list of users files
*
* return void
*/
function initUserLIstOfFilesDataTable() {
    $("#list_of_user_files").DataTable();
}

function initValidators() {
    jQuery.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9\s-&!@#$%^&*().,<>?:;'"]+$/.test(value);
    }); 
}

function initJqueryValidation() {
    $(".validate-form").validate();
}

function initLecturerDataTables() {
    $(".lecturer-data-table-grid").each(function() {
        var ajaxUrl = $(this).data("href");
        var dataTableId = $(this).attr('id');
        $("#"+dataTableId).DataTable({
            "oTableTools": {
                "sSwfPath": SITEURL + "assets/admin/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": []
            },
            "processing": true,
            "serverSide": true,
            "lengthMenu": [10, 25, 50, 75, 100],
            "bFilter": true,
            "aoColumns": [null, null, {"bVisible": false}],
            "bOrderable": false,
            "aaSorting": [[0, "desc"]],
            "destroy": true,
            "ajax": {
                "url": ajaxUrl
            },
            "fnDrawCallback": function () {
            }
        });
    });
}

/**
* Function to intialize class data table
*
* return void
*/
function initJqueryDataTable() {
    $('.data-table-grid').each(function() {
        var ajaxUrl = $(this).data("href");
        var dataTableId = $(this).attr('id');
        $("#"+dataTableId).DataTable({
            "oTableTools": {
                "sSwfPath": SITEURL + "assets/admin/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": []
            },
            "processing": true,
            "serverSide": true,
            "lengthMenu": [10, 25, 50, 75, 100],
            "bFilter": true,
            "aoColumns": [null, null, {"bSortable": false}],
            "bOrderable": false,
            "aaSorting": [[0, "desc"]],
            "destroy": true,
            "ajax": {
                "url": ajaxUrl
            },
            "fnDrawCallback": function () {
                initIndividualDelete();
            }
        });
    });
}

/**
* Function to initalize yes no alert
*
* return void
*/
function initYesNoAlert() {
    $(".yes-no-alert").on('click', function() {
        var ajaxUrl = $(this).data('href');
        var confirmText = $(this).data('confirm-text');
        swal({
            text: confirmText,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-primary",
            titleClass: "mine",
            confirmButtonText: "Yes, I'm sure.",
            cancelButtonClass: "btn btn-default",
            closeOnConfirm: false,
            allowOutsideClick: false
        }, function () {
            location.href = ajaxUrl;
        });
    });
}

/**
* Function to set up a class validation
*
* return void
*/
function initSetupSemisterValidation() {
    $('#setup_semister').validate({
        errorElement: 'label',
        errorClass: 'error',
        focusInvalid: false,
        rules: {
            semister_name: {
                required: true,
                alphanumeric: true
            },
        },
        messages: {
            "semister_name": {
                "alphanumeric": "Enter valid semister name."
            },
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-danger', $('#setup_semister')).show();
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
* Function to delete individual row
* 
* return void
*/
function initIndividualDelete() {
    $(".delete-individual").each(function () {
        $(this).click(function () {
            var deleteUrl = $(this).attr('data-href');
            var deleteMessage = $(this).attr("data-message");
            var deleteDesc = $(this).attr("data-desc");
            var tableId = $(this).data("table-id");
            var id = $(this).data("record-id");
            var pageLoad = $(this).data("page-load");
            var userCount = $(this).data("user-count");
            
                swal({
                    title: deleteMessage,
                    text: deleteDesc,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete",
                    cancelButtonText: "No, cancel",
                    confirmButtonClass: "btn btn-primary",
                    cancelButtonClass: "btn btn-default",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.ajax(
                                {
                                    url: deleteUrl,
                                    type: 'POST',
                                    data: {"id": id},
                                    cache: false,
                                    success: function (data) {
                                    }
                                }
                        )
                                .done(function (data) {
                                    var isJSON = true;
                                    try {
                                        var jsonData = $.parseJSON(data);
                                    } catch (err) {
                                        isJSON = false;
                                    }
                                    if (isJSON) {
                                        if (typeof (jsonData.status) != 'undefined' && jsonData.status == 'success') {
                                            var message = jsonData.message;
                                            if (typeof (jsonData.message) != 'undefined') {
                                                swal({
                                                    title: "Deleted",
                                                    text: message,
                                                    type: "success",
                                                    showCancelButton: false,
                                                    confirmButtonText: "Ok",
                                                    confirmButtonClass: "yesok-btn",
                                                },
                                                        function (e) {
                                                            $("#" + tableId).DataTable().draw();
                                                        });
                                            }
                                        }
                                        if (typeof (jsonData.status) != 'undefined' && jsonData.status == 'failure') {
                                            var message = jsonData.message;
                                            if (typeof (jsonData.message) != 'undefined') {
                                                swal({
                                                    title: "Failed",
                                                    text: message,
                                                    type: "error",
                                                    confirmButtonText: "Ok",
                                                    confirmButtonClass: "yescancel-btn",
                                                });
                                            }
                                        }
                                    } else {
                                        swal({
                                            title: "Failed!",
                                            text: "Something went wrong. Please try again!",
                                            type: "error",
                                            confirmButtonText: "Ok",
                                            confirmButtonClass: "yescancel-btn",
                                        });
                                    }
                                })
                                .error(function (data) {
                                    swal({
                                        title: "Failed!",
                                        text: "Something went wrong. Please try again!",
                                        type: "error",
                                        confirmButtonText: "Ok",
                                        confirmButtonClass: "yescancel-btn",
                                    });
                                });
                    } else {
                        swal({
                            title: "Cancelled",
                            text: "The action has been cancelled.",
                            type: "error",
                            confirmButtonText: "Ok",
                            confirmButtonClass: "yescancel-btn",
                        })
                    }
                });
        });
    });
}

/**
* Function to intialize question form validation
*
* return coid
*/
function initSetupGroupValidation() {
    $('#setup_group').validate({
        errorElement: 'label',
        errorClass: 'error',
        focusInvalid: false,
        rules: {
            group_name: {
                required: true,
                alphanumeric: true
            },
        },
        messages: {
            "group_name": {
                "alphanumeric": "Enter valid group name."
            },
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-danger', $('#setup_group')).show();
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
* Function to intialize question form validation
*
* return coid
*/
function initSetupSubjectValidation() {
    $('#setup_subject').validate({
        errorElement: 'label',
        errorClass: 'error',
        focusInvalid: false,
        rules: {
            subject_name: {
                required: true,
                alphanumeric: true
            },
        },
        messages: {
            "subject_name": {
                "alphanumeric": "Enter valid subject name."
            },
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-danger', $('#setup_subject')).show();
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
* Function to load dile upload data table
*
* return void
*/
function initFileuploadDataTable() {
    var ajaxUrl = $("#list_of_user_uploads").data("href");
    $("#list_of_user_uploads").DataTable({
            "oTableTools": {
                "sSwfPath": SITEURL + "assets/admin/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": []
            },
            "processing": true,
            "serverSide": true,
            "lengthMenu": [10, 25, 50, 75, 100],
            "bFilter": true,
            "aoColumns": [null, null,null,null,null,null, {"bSortable": false}],
            "bOrderable": false,
            "aaSorting": [[0, "desc"]],
            "destroy": true,
            "ajax": {
                "url": ajaxUrl
            },
            "fnDrawCallback": function () {
                initIndividualDelete();
            }
        });
}

function initLecturerUploads() {
    var ajaxUrl = $("#list_of_lecturer_user_uploads").data("href");
    $("#list_of_lecturer_user_uploads").DataTable({
            "oTableTools": {
                "sSwfPath": SITEURL + "assets/admin/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": []
            },
            "processing": true,
            "serverSide": true,
            "lengthMenu": [10, 25, 50, 75, 100],
            "bFilter": true,
            "aoColumns": [null, null,null,null,null,null, {"bVisible": false}],
            "bOrderable": false,
            "aaSorting": [[0, "desc"]],
            "destroy": true,
            "ajax": {
                "url": ajaxUrl
            },
            "fnDrawCallback": function () {
            }
        });
}