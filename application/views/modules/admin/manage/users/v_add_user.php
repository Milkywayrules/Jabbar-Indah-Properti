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
                        <div class="col-7 col-sm-6 col-md-5 col-lg-6 my-5">
                          <form method="post">
                            <!-- 1 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" for="add-firstName">Nama Depan</label>
                              <div class="col-lg-8">
                                <input type="text" id="add-firstName"
                                  name="add-firstName" placeholder="Nama depan"
                                  class="form-control <?php if(form_error('add-firstName') !== ''){ echo 'is-invalid'; } ?>"
                                  value=<?php echo set_value('add-firstName') ?>>
                                <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-firstName') ?> </sub>
                              </div>
                            </div>
                            <!-- 2 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" for="add-lastName">Nama Belakang</label>
                              <div class="col-lg-8">
                                <input type="text" id="add-lastName"
                                  name="add-lastName" placeholder="Nama belakang"
                                  class="form-control <?php if(form_error('add-lastName') !== ''){ echo 'is-invalid'; } ?>"
                                  value=<?php echo set_value('add-lastName') ?>>
                                <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-lastName') ?> </sub>
                              </div>
                            </div>
                            <!-- 3 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" for="add-phone">No Handphone</label>
                              <div class="col-lg-8">
                                <input type="tel" id="add-phone"
                                  name="add-phone" placeholder="cth: 087718237102"
                                  class="form-control <?php if(form_error('add-phone') !== ''){ echo 'is-invalid'; } ?>"
                                  value=<?php echo set_value('add-phone') ?>>
                                <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-phone') ?> </sub>
                              </div>
                            </div>
                            <!-- 4 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" for="add-gender">Gender</label>
                              <div class="col-lg-8">
                                <div class="form-row my-1 mx-1">
                                  <div class="custom-control custom-checkbox form-check form-check-inline">
                                    <input type="radio" class="custom-control-input" id="inputGenderM" name="add-gender" value="M">
                                    <label class="custom-control-label" for="inputGenderM">Male</label>
                                  </div>
                                  <div class="custom-control custom-checkbox form-check form-check-inline">
                                    <input type="radio" class="custom-control-input" id="inputGenderF" name="add-gender" value="F">
                                    <label class="custom-control-label" for="inputGenderF">Female</label>
                                  </div>
                                </div>
                              <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-gender') ?> </sub>
                              </div>
                            </div>
                            <!-- 5 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" for="add-roleName">User Role</label>
                              <div class="col-lg-8">
                                <div class="form-group">
                                  <select class="form-control" name="add-roleName">
                                    <?php foreach ($roles as $role): ?>
                                      <option value=<?php echo "{$role->roleName}" ?>>
                                         <?php echo "{$role->roleName}" ?>
                                       </option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                                <sub class="form-text text-danger"> <?php echo form_error('add-roleId') ?> </sub>
                              </div>
                            </div>

                            <hr style="margin-bottom:2rem;">

                            <!-- 7 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" for="add-username">Username</label>
                              <div class="col-lg-8">
                                <input type="text" id="add-username"
                                  name="add-username" placeholder="Username"
                                  class="form-control <?php if(form_error('add-username') !== ''){ echo 'is-invalid'; } ?>"
                                  value=<?php echo set_value('add-username') ?>>
                                <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-username') ?> </sub>
                              </div>
                            </div>
                            <!-- 8 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" >E-mail</label>
                              <div class="col-lg-8">
                                <input type="email" id="add-email"
                                  name="add-email" placeholder="E-mail"
                                  class="form-control <?php if(form_error('add-email') !== ''){ echo 'is-invalid'; } ?>"
                                  value=<?php echo set_value('add-email') ?>>
                                <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-email') ?> </sub>
                              </div>
                            </div>
                            <!-- 9 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" >Password</label>
                              <div class="col-lg-8">
                                <input type="password" id="add-password"
                                  name="add-password" placeholder="Password"
                                  class="form-control <?php if(form_error('add-password') !== ''){ echo 'is-invalid'; } ?>">
                                <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-password') ?> </sub>
                              </div>
                            </div>
                            <!-- 10 -->
                            <div class="form-group row">
                              <label class="col-lg-4 col-form-label" >Ulangi Password</label>
                              <div class="col-lg-8">
                                <input type="password" id="add-verPassword"
                                  name="add-verPassword" placeholder="Ulangi untuk konfirmasi"
                                  class="form-control <?php if(form_error('add-verPassword') !== ''){ echo 'is-invalid'; } ?>">
                                <!-- <div class="text-wrap"> -->
                                  <sub class="form-text text-danger text-nowrap"> <?php echo form_error('add-verPassword') ?> </sub>
                                <!-- </div> -->
                              </div>
                            </div>


                            <!-- 11 -->
                            <div class="row justify-content-center">
                              <div class="col-lg-12">
                                <br>
                                <button type="submit" class="btn btn-success text-black btn-lg btn-block" >Simpan</button>
                                <a href=<?php echo base_url("{$modules}/manage/users") ?> class="btn btn-secondary text-black btn-lg btn-block">Batal</a>
                              </div>
                            </div>
                          </form>
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
