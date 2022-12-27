<!--begin::Javascript-->
        <script src="{{asset('assets/website/js/jquery-3.6.0.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/website/js/slick.min.js')}}"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('assets/website/js/scripts.js')}}"></script>
        <!--<script src="js/scrollingMagic.js"></script>-->
    <script>
        $(function () {
            $('.pop').on('click', function () {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');
            });
        })

    </script>
    <script>
        $(function () {
            $('.closeitem').on('click', function () {
                $('#imagemodal').toggle();
                $('.modal-backdrop').toggle();


            });
            $('.myImg').on('click', function () {
                $('#imagemodal').toggle();
                $('.modal-backdrop').toggle();


            });

        })

    </script>

@stack('js')
