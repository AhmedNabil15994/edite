<style type="text/css" media="screen">
    div.toast-title{
        color: #FFF !important;
    }
</style>
<script>
    @if(Session::has('success'))
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
        toastr.success('', "{{ Session::get('success') }}" );
    @endif
    @if(Session::has('error'))
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
        toastr.error('', "{{ Session::get('error') }}" );
    @endif
</script>
