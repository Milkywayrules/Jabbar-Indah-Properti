<!-- =================================== start: content =================================== -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800"><?php echo "Dashboard User" ?></h1>
              <button onclick="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Excel Report</button>
            </div>

            <!-- Content on 1st  Row -->
            <div class="row justify-content-center">
              <!-- welcome to Chocobabana Admin Card -->
              <div class="col-xl-10 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                          Welcome to <strong>Chocobabana</strong> Admin Panel
                        </div>
                        <div class="mb-0 text-gray-800">
                          Selamat datang di Chocobabana Admin panel oleh Dio Ilham Djatiadi powered by StartBootstrap&nbsp;Admin&nbsp;2,
                          silakan ubah sesuai kebutuhan teman-teman pada masing-masing folder 'modules' dalam folder 'controller' dan 'views'.
                          Terima kasih karena sudah menggunakan template ini. Enjoy the ride guys!
                          <br><br>
                          <small><i>
                            *Kartu ini dapat dihapus dan seluruh fitur dapat dikustomisasi sesuai kebutuhan aplikasi.
                          </i></small>
                        </div>
                      </div>
                      <div class="col-auto mx-3 my-2">
                        <i class="fas fa-info fa-3x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Content on 2nd  Row -->
            <div class="row">

              <!-- Total Staff Card -->
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo "#" ?>" style="text-decoration:none">
                  <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Staff</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "218" ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>

              <!-- Total Member Card -->
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo "#" ?>" style="text-decoration:none">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Member</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">1823</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>

              <!-- Total Transactions (Monthly) Card -->
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo "#" ?>" style="text-decoration:none">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Transactions (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "218" ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>

              <!-- Unopened Message(s) Card -->
              <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?php echo "#" ?>" style="text-decoration:none">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Unopened message(s)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>

          </div>
          <!-- /.container-fluid -->

<!-- =================================== end: content =================================== -->

<script type="text/javascript">
  function excel(){
    location.href='<?php echo base_url('report/excel'); ?>';
  }
  function pdf(){
    location.href='<?php echo base_url('report/pdf'); ?>';
  }
</script>
