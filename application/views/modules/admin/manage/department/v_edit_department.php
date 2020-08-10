<!-- =================================== start: content =================================== -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800"><?php echo $subTitle ?></h1>
            </div>

            <div class="row justify-content-center">

              <div class="col-lg-10">

                <!-- Dropdown Card -->
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Dasar Staff</h6>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapusModal">Hapus</a>
                      </div>
                    </div>
                  </div>
                  <!-- Card Body -->
                  <!-- open form -->
                  <form method="post">
                    <div class="card-body">
                      <div class="row justify-content-center">
                        <div class="col-11 col-sm-9 col-md-8 col-lg-7 col-xl-6">
                          <table>
                            <tbody>
                              <input type="hidden" name="ori-id" value="<?php echo $user->id ?>">
                              <tr>
                                <td>Department ID</td>
                                <td width='10%' class="text-center">:</td>
                                <td>
                                  <input type="text" id='edit-id'
                                    name="edit-id" placeholder="ID unik department"
                                    class="form-control <?php if(form_error('edit-id') !== ''){ echo 'is-invalid'; } ?>"
                                    value="<?php echo $user->id ?>">
                                  <sub class="form-text text-danger text-nowrap"> <?php echo form_error('edit-id') ?> </sub>
                                </td>
                              </tr>
                              <tr>
                                <td>Nama Department</td>
                                <td class="text-center">:</td>
                                <td>
                                  <input type="text" id='edit-department'
                                    name="edit-department" placeholder="Nama Department"
                                    class="form-control <?php if(form_error('edit-department') !== ''){ echo 'is-invalid'; } ?>"
                                    value="<?php echo (set_value('edit-department'))?(set_value('edit-department')):($user->deptName); ?>">
                                  <sub class="form-text text-danger text-nowrap"> <?php echo form_error('edit-department') ?> </sub>
                                </td>
                              </tr>
                              <tr>
                                <td>Status aktif</td>
                                <td class="text-center">:</td>
                                <td>
                                  <div class="btn-group btn-group-toggle my-1" data-toggle="buttons">
                                    <label class="btn btn-sm btn-<?php echo ($user->isActive==0)?('danger active'):('secondary '); ?>">
                                      <input type="radio" name="edit-statusAktif" id="option1" value=0> <i class="fa fa-times my-1 mx-2"></i>
                                    </label>
                                    <label class="btn btn-sm btn-<?php echo ($user->isActive==1)?('success active'):('secondary'); ?>">
                                      <input type="radio" name="edit-statusAktif" id="option2" value=1> <i class="fa fa-check my-1 mx-2"></i>
                                    </label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Terdaftar sejak</td>
                                <td class="text-center">:</td>
                                <?php $user->createdAt = explode(' ', $user->createdAt); ?>
                                <td> <?php echo $user->createdAt[0] ?> </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <hr>
                      <div class="row justify-content-center">
                        <a href=<?php echo base_url("{$modules}/manage/department") ?> class="btn btn-secondary mx-1">Kembali</a>
                        <button type="submit" class="btn btn-success mx-1" >Simpan</button>
                      </div>
                    </div>
                  </form>
                  <!-- close form -->
                </div>

              </div>

            </div>

          </div>
          <!-- /.container-fluid -->

<?php //<!-- =================================== start: MODALS =================================== --> ?>

          <!-- start: Hapus Modal-->
          <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin hapus data?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <center>
                    Department ID : <?php echo "{$user->id}" ?>
                    <br>
                    Nama Department : <?php echo "{$user->deptName}" ?>
                  </center>
                  <hr width='80%'>
                  Tekan "Hapus" dibawah jika kamu yakin ingin hapus data di atas
                </div>
                <div class="modal-footer">
                  <form method="post" action=<?php echo base_url("{$modules}/manage/department/hapus/{$user->id}") ?>>
                    <button class="btn btn-danger" type="submit" name="Hapus">Hapus</button>
                  </form>
                  <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div>
          </div>
          <!-- end: hapus modal -->

<?php //<!-- =================================== end: MODALS =================================== --> ?>

<!-- =================================== end: content =================================== -->
