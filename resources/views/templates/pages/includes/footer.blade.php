<!-- General JS Scripts -->
<script src={{ asset('assets/js/app.min.js') }}></script>
<!-- JS Libraies -->
<script src={{ asset('assets/bundles/datatables/datatables.min.js') }}></script>
<script src={{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}></script>
<script src={{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}></script>
<script src={{ asset('assets/bundles/summernote/summernote-bs4.js') }}></script>
<script src={{ asset('assets/bundles/codemirror/lib/codemirror.js') }}></script>
<script src={{ asset('assets/bundles/codemirror/mode/javascript/javascript.js') }}></script>
<script src={{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.js') }}></script>
<script src={{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}></script>
<script src={{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js') }}></script>
<script src={{ asset('assets/bundles/ckeditor/ckeditor.js') }}></script>
<script src={{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}></script>
<script src={{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}></script>
<script src={{ asset('assets/bundles/lightgallery/dist/js/lightgallery-all.js')}}></script>

<!-- Page Specific JS File -->
<script src={{ asset('assets/js/page/sweetalert.js') }}></script>
<script src={{ asset('assets/js/page/datatables.js') }}></script>
<script src={{ asset('assets/js/page/ckeditor.js') }}></script>
<script src={{ asset('assets/bundles/prism/prism.js') }}></script>
<script src={{ asset('assets/js/page/toastr.js') }}></script>
<script src={{ asset('assets/js/page/light-gallery.js')}}></script>

<!-- Template JS File -->
<script src={{ asset('assets/js/scripts.js') }}></script>
<!-- Custom JS File -->
<script src={{ asset('assets/js/custom.js') }}></script>

<script>
    @if (Session::has('message'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
