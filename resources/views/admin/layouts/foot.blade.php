<!--begin::Javascript-->
<script>var hostUrl = "{{asset('assets/admin/')}}";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/admin/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/jquery-3.5.1.js')}}"></script>

@stack('js')
