<!-- jQuery  -->
        <script src="styleAdmin/js/jquery.min.js"></script>
        <script src="styleAdmin/js/popper.min.js"></script>
        <script src="styleAdmin/js/bootstrap.min.js"></script>
        <script src="styleAdmin/js/metisMenu.min.js"></script>
        <script src="styleAdmin/js/waves.js"></script>
        <script src="styleAdmin/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="styleAdmin/js/jquery.core.js"></script>
        <script src="styleAdmin/js/jquery.app.js"></script>
        <script src="styleAdmin/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="styleAdmin/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="styleAdmin/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="styleAdmin/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="styleAdmin/plugins/datatables/jszip.min.js"></script>
        <script src="styleAdmin/plugins/datatables/pdfmake.min.js"></script>
        <script src="styleAdmin/plugins/datatables/vfs_fonts.js"></script>
        <script src="styleAdmin/plugins/datatables/buttons.html5.min.js"></script>
        <script src="styleAdmin/plugins/datatables/buttons.print.min.js"></script>
        <!-- Responsive examples -->
        <script src="styleAdmin/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="styleAdmin/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- App js -->
        <script src="styleAdmin/js/jquery.core.js"></script>
        <script src="styleAdmin/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>