<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
    //Date picker
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy'
    });
    $('.fileinput.image').on('change.bs.fileinput', function (e) {
        var control = document.getElementById("image");
        var files = control.files;
        if (files[0].type != "image/png" && files[0].type != "image/jpeg") {
            console.log("imagen no permitida");
            $.notify({
                // options
                message: 'Debe seleccionar una Imagen válida'
            }, {
                // settings
                type: 'danger',
                delay: 2000
            });
            console.log('change');
            $('.fileinput.image').fileinput("clear");

            reloadPlaceholderImage();
        }
    }).on('clear.bs.fileinput', function (e) {
                console.log('clear');
                reloadPlaceholderImage();
            })
            .fileinput();

    function reloadPlaceholderImage() {
        $('.fileinput-preview.thumbnail').html('<img src="{{asset('images/placeholder-image.png')}}"/>');
    }

</script>
