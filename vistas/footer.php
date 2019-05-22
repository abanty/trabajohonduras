    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2019 <a href="">Tte Nav C.G. Hector Mercadal</a>.</strong> All rights reserved.
    </footer>
    <!-- jQuery -->
    <script src="../public/js/jquery-3.1.1.min.js"></script>
    <script>
    $(document).ready(function() {
        var url = window.location;
        var element = $('ul.sidebar-menu a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0; }).parent().addClass('active');
        if (element.is('li')) {
             element.addClass('active').parent().parent('li').addClass('active')
        }
    });
  </script>
    <script src="../public/maskmoney/jquery.maskMoney.js" type="text/javascript"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!-- Bootstrap 3.3.5 -->
    <script src="../public/js/bootstrap.min.js"></script>
    <!-- Librerias Alertas: NOTIFY-->

    <!-- AdminLTE App -->
    <script src="../public/js/app.min.js"></script>
    <script type="text/javascript"   src="../public/js/sweetalert2.js"></script>
    <script src="../public/js/waves.js"></script>
    <!-- DATATABLES -->
    <script src="../public/datatables/jquery.dataTables.min.js"></script>
    <script src="../public/datatables/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
    <script src="../public/raphael/raphael.min.js"></script>
    <script src="../public//morris.js/morris.min.js"></script>

    <script src="../public/datatables/buttons.html5.min.js"></script>
    <script src="../public/datatables/buttons.colVis.min.js"></script>
    <script src="../public/datatables/jszip.min.js"></script>
    <script src="../public/datatables/pdfmake.min.js"></script>
    <script src="../public/datatables/vfs_fonts.js"></script>

    <script src="../public/js/bootbox.min.js"></script>
      <script src="../public/js/notify.min.js"></script>
    <script src="../public/js/bootstrap-select.min.js"></script>
  </body>
</html>
