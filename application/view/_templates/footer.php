
    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- define la URL del proyecto (para hacer posible las llamadas AJAX, incluso cuando se usa en subcarpetas, etc.) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/jquery-3.3.1.js"></script>
    <script src="<?php echo URL; ?>js/parsley.min.js"></script>
    <script src="<?php echo URL; ?>js/sweetalert.js"></script>
    <script src="<?php echo URL; ?>js/datatables.js"></script>
    <script src="<?php echo URL; ?>js/bootstrap.js"></script>
    <script src="<?php echo URL; ?>js/application.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Se cargan los estilos para las tablas (DataTables) -->
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script>
</body>
</html>
