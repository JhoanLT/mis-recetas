
    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- define la URL del proyecto (para hacer posible las llamadas AJAX, incluso cuando se usa en subcarpetas, etc.) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>
    <script src="<?php echo URL; ?>js/parsley.min.js"></script>
    <script src="<?php echo URL; ?>js/jquery-3.3.1.js"></script>
    <script src="<?php echo URL; ?>js/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- Se cargan los estilos para las tablas (DataTables) -->
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );

        Parsley.addMessages('es', {
        defaultMessage: "Este valor parece ser inválido.",
        type: {
            email:        "Este valor debe ser un correo válido.",
            url:          "Este valor debe ser una URL válida.",
            number:       "Este valor debe ser un número válido.",
            integer:      "Este valor debe ser un número válido.",
            digits:       "Este valor debe ser un dígito válido.",
            alphanum:     "Este valor debe ser alfanumérico."
        },
        notblank:       "Este valor no debe estar en blanco.",
        required:       "Este valor es requerido.",
        pattern:        "Este valor es incorrecto.",
        min:            "Este valor no debe ser menor que %s.",
        max:            "Este valor no debe ser mayor que %s.",
        range:          "Este valor debe estar entre %s y %s.",
        minlength:      "Este valor es muy corto. La longitud mínima es de %s caracteres.",
        maxlength:      "Este valor es muy largo. La longitud máxima es de %s caracteres.",
        length:         "La longitud de este valor debe estar entre %s y %s caracteres.",
        mincheck:       "Debe seleccionar al menos %s opciones.",
        maxcheck:       "Debe seleccionar %s opciones o menos.",
        check:          "Debe seleccionar entre %s y %s opciones.",
        equalto:        "Este valor debe ser idéntico."
        });
    </script>
</body>
</html>
