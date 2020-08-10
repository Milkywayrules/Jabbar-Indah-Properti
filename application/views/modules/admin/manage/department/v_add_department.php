<!-- =================================== start: content =================================== -->

          <!-- Begin Page Content -->
          <!-- <div class="container-fluid"> -->
            <!-- start row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="block">
                  <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">
                        <?php echo $subTitle ?>
                      </a>
                    </li>
                  </ul>
                  <div class="block-content tab-content pb-30">
                    <div class="tab-pane active" id="info-umum" role="tabpanel">
                      <div class="row justify-content-center">
                        <div class="col-7 col-sm-7 col-md-7 col-lg-5 mt-5">
                          <form method="post">
                            <!-- 1 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" for="add-id">ID</label>
                              <div class="col-lg-8">
                                <input type="text" id="add-id" autofocus
                                  name="add-id" placeholder="Department ID"
                                  class="form-control <?php if(form_error('add-id') !== ''){ echo 'is-invalid'; } ?>"
                                  value=<?php echo set_value('add-id') ?>>
                                <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-id') ?> </sub>
                              </div>
                            </div>
                            <!-- 2 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" for="add-deptName">Nama Department</label>
                              <div class="col-lg-8">
                                <input type="text" id="add-deptName"
                                  name="add-deptName" placeholder="Nama Department"
                                  class="form-control <?php if(form_error('add-deptName') !== ''){ echo 'is-invalid'; } ?>"
                                  value=<?php echo set_value('add-deptName') ?>>
                                <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-deptName') ?> </sub>
                              </div>
                            </div>

                            <hr>

                            <!-- 3 -->
                            <div class="row justify-content-center">
                              <div class="col-lg-12">
                                <button type="submit" class="btn btn-success text-black btn-lg btn-block" >Simpan</button>
                              </div>
                            </div>
                          </form>
                        </div>

                        <div class="col-10 col-sm-10 col-md-11 col-lg-9 mt-5">
                          <div class="card-body">
                            <center> <h3>List departement yang sudah&nbsp;terdaftar:</h3> </center>
                            <div class="table-responsive px-3">
                              <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0" align='center'>
                                <thead>
                                  <tr>
                                    <th>Department ID</th>
                                    <th>Nama Departement</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php if ($totDepartment != FALSE) { ?>
                                    <?php foreach ($totDepartment as $row): ?>
                                      <tr>
                                        <td><?php echo $row->id ?></td>
                                        <td><?php echo $row->deptName ?></td>
                                      </tr>
                                      <?php endforeach; ?>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end row -->

          <!-- </div> -->
          <!-- /.container-fluid -->

<!-- =================================== end: content =================================== -->
