<!-- =================================== start: content =================================== -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800"><?php echo $subTitle ?></h1>
            </div>

            <div class="row justify-content-center">

              <div class="col-lg-10">

                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Dasar Kelas</h6>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                    </div>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="row justify-content-center">
                      <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-4">
                        <table>
                          <tbody>
                            <tr>
                              <td>Kelas ID</td>
                              <td width='10%' class="text-center">:</td>
                              <td> <?php echo $user->id ?> </td>
                            </tr>
                            <tr>
                              <td>Nama Kelas</td>
                              <td width='10%' class="text-center">:</td>
                              <td> <?php echo $user->className ?> </td>
                            </tr>
                            <tr>
                              <td>Nama Pelatih/Pengajar</td>
                              <td width='10%' class="text-center">:</td>
                              <td> <?php echo "{$user->nip} - {$staff->fullname}" ?> </td>
                            </tr>
                            <tr>
                              <td>Status kelas</td>
                              <td class="text-center">:</td>
                              <td> <i class="fa fa-<?php echo ($user->isActive==1)?('check'):('times'); ?> mt-2"></i> </td>
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
                      <a href=<?php echo base_url("{$modules}/manage/department") ?> class="btn btn-secondary">Kembali</a>
                      <a href=<?php echo base_url("{$modules}/manage/department/edit/{$user->id}") ?> class="btn btn-info mx-1">Ubah</a>
                    </div>
                  </div>
                </div>

              </div>

            </div>

          </div>
          <!-- /.container-fluid -->

<!-- =================================== end: content =================================== -->
