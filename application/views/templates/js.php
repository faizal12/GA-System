<script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- Select 2 -->
<script src="<?=base_url('assets/plugins/select2/js/select2.full.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?=base_url('assets/plugins/chart.js/Chart.min.js')?>"></script>
<!-- date-range-picker -->
<script src="<?=base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<!-- JQVMap -->
<script src="<?=base_url('assets/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?=base_url('assets/plugins/moment/moment.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Summernote -->
<script src="<?=base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- DataTables -->
<script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>	
<script src="<?=base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/jszip/jszip.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/pdfmake/pdfmake.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/pdfmake/vfs_fonts.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
<!-- FixedColoumn (Frezee pane) -->
<script src="<?=base_url('assets/plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js')?>"></script> 
<!-- FixedHeader (Frezee pane) -->
<script src="<?=base_url('assets/plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js')?>"></script> 
<!-- Rowgroup -->
<script src="<?=base_url('assets/plugins/datatables-rowsgroup-master/dataTables.rowsGroup.js')?>"></script> 
<!-- Toastr -->
<script src="<?=base_url('assets/plugins/toastr/toastr.min.js')?>"></script>
<!-- bs-custom-file-input -->
<script src="<?=base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/dist/js/adminlte.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?=base_url('assets/dist/js/pages/dashboard.js')?>"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/dist/js/demo.js')?>"></script>
<!-- jquery-validation -->
<script src="<?=base_url('assets/plugins/jquery-validation/jquery.validate.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/jquery-validation/additional-methods.min.js')?>"></script>
<!-- InputMask -->
<script src="<?=base_url('assets/plugins/moment/moment.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/inputmask/jquery.inputmask.min.js')?>"></script>
<!-- HighCharts -->
<script src="<?=base_url('assets/plugins/highcharts/highcharts.js')?>"></script>
<script src="<?=base_url('assets/plugins/highcharts/exporting.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script> -->
<!-- File Input -->
<script src="<?php echo base_url('assets/plugins/fileinput/fileinput.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.js')?>"></script>
<script>
  $(function () {
 
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

    $(document).ready(function () {
      bsCustomFileInput.init();
    });

    jam();
  });
function jam() {
  var e = document.getElementById('jam'),
  d = new Date(), h, m, s;
  h = d.getHours();
  m = set(d.getMinutes());
  s = set(d.getSeconds());

  e.innerHTML = h +':'+ m +':'+ s;

  setTimeout('jam()', 1000);
}

function set(e) {
  e = e < 10 ? '0'+ e : e;
  return e;
}


</script>

</body>

