<!-- jQuery  -->
        <script src="{{url('styleAdmin/js/jquery.min.js')}}"></script>
        <script src="{{url('styleAdmin/js/popper.min.js')}}"></script>
        <script src="{{url('styleAdmin/js/bootstrap.min.js')}}"></script>
        <script src="{{url('styleAdmin/js/metisMenu.min.js')}}"></script>
        <script src="{{url('styleAdmin/js/waves.js')}}"></script>
        <script src="{{url('styleAdmin/js/jquery.slimscroll.js')}}"></script>

        <!-- App js -->
        <script src="{{url('styleAdmin/js/jquery.core.js')}}"></script>
        <script src="{{url('styleAdmin/js/jquery.app.js')}}"></script>
        <script src="{{url('styleAdmin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('styleAdmin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{url('styleAdmin/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('styleAdmin/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('styleAdmin/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{url('styleAdmin/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{url('styleAdmin/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{url('styleAdmin/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{url('styleAdmin/plugins/datatables/buttons.print.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{url('styleAdmin/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('styleAdmin/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- App js -->
        <script src="{{url('styleAdmin/js/jquery.core.js')}}"></script>
        <script src="{{url('styleAdmin/js/jquery.app.js')}}"></script>

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