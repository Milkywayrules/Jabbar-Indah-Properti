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
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Dasar User</h6>
                    <div class="row justify-content-center">
                      <?php if ($user->isDeleted == 0): // jika aktif?>
                        <a href="#" class="btn btn-sm btn-danger px-5 mx-3" data-toggle="modal" data-target="#hapusModal">
                          Hapus data
                        </a>
                      <?php else:  // jika tidak aktif?>
                        <a href="#" class="btn btn-sm btn-success px-5 mx-3" data-toggle="modal" data-target="#hapusModal">
                          Aktifkan data
                        </a>
                      <?php endif; ?>
                    </div>
                  </div>
                  <!-- Card Body -->
                  <!-- open form -->
                  <form method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="row justify-content-center py-3 px-5">
                            <img src=<?php echo base_url("assets/img/avatar/{$user->avatar}") ?> alt="Avatar" width="150px">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <table>
                            <tbody>
                              <!-- 0 -->
                              <input hidden type="text" id='edit-id' name="edit-id" value="<?php echo $user->id ?>">
                              <!-- 1 -->
                              <tr>
                                <td>Username</td>
                                <td class="text-center px-2">:</td>
                                <td>
                                  <input type="text" id='edit-username'
                                    name="edit-username" placeholder="Username"
                                    class="form-control <?php if(form_error('edit-username') !== ''){ echo 'is-invalid'; } ?>"
                                    value="<?php echo (set_value('edit-username'))?(set_value('edit-username')):($user->username); ?>">
                                  <sub class="form-text text-danger text-nowrap"> <?php echo form_error('edit-username') ?> </sub>
                                </td>
                              </tr>
                              <!-- 2 -->
                              <tr>
                                <td>E-mail</td>
                                <td class="text-center">:</td>
                                <td>
                                  <input type="text" id='edit-email'
                                  name="edit-email" placeholder="E-mail"
                                  class="form-control <?php if(form_error('edit-email') !== ''){ echo 'is-invalid'; } ?>"
                                  value="<?php echo (set_value('edit-email'))?(set_value('edit-email')):($user->email); ?>">
                                  <sub class="form-text text-danger text-nowrap"> <?php echo form_error('edit-email') ?> </sub>
                                </td>
                              </tr>
                              <!-- 3 -->
                              <tr>
                                <td>Nama Depan</td>
                                <td class="text-center">:</td>
                                <td>
                                  <input type="text" id='edit-firstName'
                                    name="edit-firstName" placeholder="Nama Depan"
                                    class="form-control <?php if(form_error('edit-firstName') !== ''){ echo 'is-invalid'; } ?>"
                                    value="<?php echo (set_value('edit-firstName'))?(set_value('edit-firstName')):($user->firstName); ?>">
                                  <sub class="form-text text-danger text-nowrap"> <?php echo form_error('edit-firstName') ?> </sub>
                                </td>
                              </tr>
                              <!-- 4 -->
                              <tr>
                                <td>Nama Belakang</td>
                                <td class="text-center">:</td>
                                <td>
                                  <input type="text" id='edit-lastName'
                                    name="edit-lastName" placeholder="Nama Belakang"
                                    class="form-control <?php if(form_error('edit-lastName') !== ''){ echo 'is-invalid'; } ?>"
                                    value="<?php echo (set_value('edit-lastName'))?(set_value('edit-lastName')):($user->lastName); ?>">
                                  <sub class="form-text text-danger text-nowrap"> <?php echo form_error('edit-lastName') ?> </sub>
                                </td>
                              </tr>
                              <!-- 5 -->
                              <tr>
                                <td>No Handphone</td>
                                <td class="text-center">:</td>
                                <td>
                                  <input type="number" id='edit-phone'
                                    name="edit-phone" placeholder="No Telepon"
                                    class="form-control <?php if(form_error('edit-phone') !== ''){ echo 'is-invalid'; } ?>"
                                    value="<?php echo (set_value('edit-phone'))?(set_value('edit-phone')):($user->phone); ?>">
                                  <sub class="form-text text-danger text-nowrap"> <?php echo form_error('edit-phone') ?> </sub>
                                </td>
                              </tr>
                              <!-- 6 -->
                              <tr>
                                <td>Alamat</td>
                                <td class="text-center">:</td>
                                <td>
                                  <textarea name="edit-address" placeholder="Alamat lengkap" rows="3" cols="35"
                                  class="form-control"><?php echo (set_value('edit-address'))?(set_value('edit-address')):($user->address); ?></textarea>
                                  <sub class="form-text text-danger text-nowrap"> <?php echo form_error('edit-address') ?> </sub>
                                </td>
                              </tr>
                              <!-- 7 -->
                              <tr>
                                <td>Gender</td>
                                <td class="text-center">:</td>
                                <td>
                                  <div class="form-group row">
                                    <div class="col-lg-8">
                                      <div class="form-row my-1 mx-1">
                                        <div class="custom-control custom-checkbox form-check form-check-inline">
                                          <input type="radio" id="editGenderM" name="edit-gender"
                                            class="custom-control-input"
                                            value="M" <?php echo ($user->gender != 'M')?:('checked') ?>>
                                          <label class="custom-control-label" for="editGenderM">Male</label>
                                        </div>
                                        <div class="custom-control custom-checkbox form-check form-check-inline">
                                          <input type="radio" id="editGenderF" name="edit-gender"
                                            class="custom-control-input"
                                            value="F" <?php echo ($user->gender != 'F')?:('checked') ?>>
                                          <label class="custom-control-label" for="editGenderF">Female</label>
                                        </div>
                                      </div>
                                      <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-gender') ?> </sub>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <!-- 8 -->
                              <tr>
                                <td>User Role</td>
                                <td class="text-center">:</td>
                                <td>
                                  <div class="form-group">
                                    <select class="form-control" name="edit-roleName">
                                      <option disabled selected>Pilih user role</option>
                                      <?php foreach ($roles as $role): ?>
                                        <option value=<?php echo "{$role->roleName}" ?> <?php echo ($user->roleName == $role->roleName)?('selected'):('') ?>>
                                           <?php echo "{$role->roleName}" ?>
                                         </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </td>
                              </tr>
                              <!-- 9 -->
                              <!-- <tr>
                                <td>Status akun</td>
                                <td class="text-center">:</td>
                                <td>
                                  <div class="btn-group btn-group-toggle my-1" data-toggle="buttons">
                                    <label class="btn btn-sm btn-<?php echo ($user->isDeleted==1)?('danger active'):('secondary'); ?> px-3">
                                      <input type="radio" name="edit-isDeleted" id="option1" value=1 <?php echo ($user->isDeleted==1)?('checked'):(''); ?>>
                                      <i class="fa fa-times"></i> Tidak aktif
                                    </label>
                                    <label class="btn btn-sm btn-<?php echo ($user->isDeleted==0)?('success active'):('secondary'); ?> px-3">
                                      <input type="radio" name="edit-isDeleted" id="option2" value=0 <?php echo ($user->isDeleted==0)?('checked'):(''); ?>>
                                      <i class="fa fa-check"></i> Aktif
                                    </label>
                                  </div>
                                </td>
                              </tr> -->
                              <!-- 10 -->
                              <tr>
                                <td>Bergabung sejak</td>
                                <td class="text-center">:</td>
                                <?php $user->createdAt = explode(' ', $user->createdAt); ?>
                                <td class="py-2"> <?php echo $user->createdAt[0] ?> </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <hr>
                      <div class="row justify-content-center">
                        <a href=<?php echo base_url("{$modules}/manage/users") ?> class="btn btn-secondary mx-1">Kembali</a>
                        <button type="submit" class="btn btn-success mx-1" >Simpan</button>
                      </div>
                    </div>
                  </form>
                  <!-- close form -->
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
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin <?php echo ($user->isDeleted == 0)? 'hapus': 'aktifasi'; ?> data?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body my-2">
                  <center>
                    Username : <b><?php echo "{$user->username}" ?></b>
                    <br>
                    Nama lengkap : <b><?php echo "{$user->firstName} {$user->lastName}" ?></b>
                  </center>
                  <hr class="my-4" width='70%'>
                  <?php if ($user->isDeleted == 0): // jika user aktif ?>
                    Tekan "Hapus" di bawah, jika kamu yakin ingin hapus data di atas.
                  <?php else: // jika user tidak aktif?>
                    Tekan "Aktifkan" di bawah, jika kamu yakin ingin aktifkan kembali data di atas.
                  <?php endif; ?>
                </div>
                <div class="modal-footer">
                  <?php if ($user->isDeleted == 0): // jika user aktif?>
                    <form method="post" action=<?php echo base_url("{$modules}/manage/users/hapus/{$user->id}") ?>>
                      <button class="btn btn-danger" type="submit" name="Hapus">Hapus</button>
                    </form>
                  <?php else: //jika user tidak aktif?>
                    <form method="post" action=<?php echo base_url("{$modules}/manage/users/aktifkan/{$user->id}") ?>>
                      <button class="btn btn-success" type="submit" name="Aktifkan">Aktifkan</button>
                    </form>
                  <?php endif; ?>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div>
          </div>
          <!-- end: hapus modal -->

<?php //<!-- =================================== end: MODALS =================================== --> ?>

<!-- =================================== end: content =================================== -->
