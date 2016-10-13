<!-- jQuery 2.1.4 -->
<script src="{{ asset('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('assets/admin/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('assets/admin/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/admin/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('assets/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/admin/plugins/fastclick/fastclick.min.js') }}"></script>
<!-- fileinput -->
<script src="{{asset('assets/admin/plugins/fileinput/fileinput.min.js') }}"></script>
<!-- Bootstrap Notify -->
<script src="{{asset('assets/admin/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/app.min.js') }}"></script>
<!-- Vue.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.20/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
<!-- Datatables.js -->
<script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- Tuny MCE -->
<script type="text/javascript" src="{{ asset('/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/tinymce/tinymce_editor.js') }}"></script>
<!-- Selectize -->
<script src="{{ asset('assets/admin/dist/js/selectize.min.js') }}"></script>
<!-- Pace -->
<script src="{{ asset('assets/admin/plugins/pace/pace.js') }}"></script>
<!-- SweetAlert -->
<script src="{{ asset('assets/admin/plugins/bootstrap-sweetalert/lib/sweet-alert.js') }}"></script>
<!-- JQueryCookie -->
<script src="{{ asset('assets/admin/plugins/js-cookie/src/js.cookie.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/admin/plugins/select2/select2.full.min.js') }}"></script>

<script type="text/javascript">
    editor_config.selector = ".textarea";
    editor_config.path_absolute = "/";
    tinymce.init(editor_config);
    editor_config.relative_urls = false;
    editor_config.remove_script_host = false;
    editor_config.convert_urls = true;
</script>