/**
 * Notification JS
 */


function successNotification(message) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": true,
        "newestOnTop": true,
        "positionClass": "toast-top-left",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "1000",
        // "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "icon" : false,
    };
    toastr.success('', message);
}

function errorNotification(message) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": true,
        "newestOnTop": true,
        "positionClass": "toast-top-left",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "1000",
        // "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "icon" : false,
    };
    toastr.error('', message);
}
