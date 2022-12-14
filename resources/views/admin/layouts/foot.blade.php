<!--begin::Javascript-->
<script>var hostUrl = "{{asset('assets/admin/')}}";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/admin/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/jquery-3.5.1.js')}}"></script>

<script>
    toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toastr-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
@if(session('success'))
toastr.success("{{trans(session('success'))}}");
@endif
@if(session('failed'))
toastr.success("{{trans(session('failed'))}}");
@endif
@if(session('issue_message'))
toastr.error("{{trans(session('issue_message'))}}");
@endif
</script>


@stack('js')
