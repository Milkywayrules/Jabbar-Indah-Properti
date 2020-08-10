<?php
$this->session->set_userdata('fullname', 'Dio Ilham Djatiadi');
$this->session->set_userdata('avatar', 'avatar-1.png');
 ?>
<!-- =================================== start: top_navbar =================================== -->

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo 'Halo, <strong>'.$this->session->userdata('fullname').'</strong>' ?></span>
                <img class="img-profile rounded-circle" src=<?php echo base_url("assets/img/avatar/{$this->session->userdata('avatar')}") ?>>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url() ?>">
                  <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                  Home
                </a>
                <a class="dropdown-item" href="<?php echo base_url("{$modules}/profile") ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="<?php echo base_url("{$modules}/inbox") ?>">
                  <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                  Inbox
                </a>
                <a class="dropdown-item" href="<?php echo base_url("{$modules}/settings") ?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('logout') ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

<!-- =================================== start: top_navbar =================================== -->
