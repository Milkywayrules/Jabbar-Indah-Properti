<!-- =================================== start: footer =================================== -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
						<strong>Copyright &copy; 2020 <a href="http://ringkes.in" target="_blank">Chocobabana Admin</a>.</strong>
						All rights reserved.
						<div class="float-right d-none d-sm-inline-block">
							<b>Version</b> <?php echo DEV_VERSION ?>
						</div>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body my-2">
          Tekan "Logout" di bawah, jika kamu yakin ingin mengakhiri sesi sekarang ini.
        </div>
        <div class="modal-footer">
          <button class="btn btn-sm py-2 px-3 btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-sm py-2 px-3 btn-danger" href=<?php echo "#" ?>>Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End logout modal -->

  <!-- sweetalert modal notification -->
  <?php if ($this->session->userdata('success_message')): ?>
    <script>
    swal({
      title: "<?php echo $this->session->userdata('title'); ?>",
      text: "<?php echo $this->session->userdata('text'); ?>",
      timer: 3000,
      button: false,
      icon: 'success'
    });
    </script>
  <?php endif; ?>
  <?php if ($this->session->userdata('failed_message')): ?>
    <script>
      swal({
         title: "<?php echo $this->session->title; ?>",
         text: "<?php echo $this->session->text; ?>",
         timer: 3000,
         button: false,
         icon: 'error'
      });
    </script>
  <?php endif; ?>
  <!-- sweetalert end -->

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/template/sbadmin/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/template/sbadmin/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/template/sbadmin/js/sb-admin-2.min.js')?>"></script>
  <?php if ( isset($chart) ): ?>
    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/template/sbadmin/vendor/chart.js/Chart.min.js')?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/template/sbadmin/js/demo/chart-area-demo.js')?>"></script>
    <script src="<?php echo base_url('assets/template/sbadmin/js/demo/chart-pie-demo.js')?>"></script>
    <script src="<?php echo base_url('assets/template/sbadmin/js/demo/chart-bar-demo.js') ?>"></script>
  <?php endif; ?>

  <?php if ( isset($dataTables) ): ?>
    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/template/sbadmin/vendor/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/template/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/template/sbadmin/js/demo/datatables-demo.js')?>"></script>
  <?php endif; ?>

<!-- =================================== end: footer =================================== -->
