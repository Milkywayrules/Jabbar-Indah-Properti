<!-- =================================== start: content =================================== -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800"><?php echo $tabTitle ?></h1>
            </div>

            <div class="row justify-content-center">

              <div class="col-lg-10">

                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $subTitle ?></h6>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                    </div>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="row justify-content-center my-3">
                      <div class="col-10 col-md-8">
                        <form method="POST" enctype="multipart/form-data" class="form">
                          <span style="color:red;"><sup><i>*only admin and higher privileges can import to database.</i></sup></span>
                          <br>
                          <span style="color:red;"><sup><i>**first row on file must have the exact value with the database table's column name.</i></sup></span>
                          <input type="text" name="table-name" placeholder="Nama Tabel" class="form-control col-8" autofocus>
                          <div><?php echo form_error('table-name') ?></div>
                          <input type="file" name="excelFile" class="my-2">
                          <div><?php echo form_error('excelFile') ?></div>
                          <input type="submit" name="submit" class="btn btn-sm btn-success my-2 px-3">
                          <a href=<?php echo base_url("{$modules}/upload-file/hub") ?> class="btn btn-sm btn-secondary mx-1 px-3">Kembali</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>

          </div>
          <!-- /.container-fluid -->

<!-- =================================== end: content =================================== -->
