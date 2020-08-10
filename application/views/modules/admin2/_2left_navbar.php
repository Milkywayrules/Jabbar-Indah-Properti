<!-- =================================== start: left_navbar =================================== -->

      <!-- Sidebar - Brand -->
      <a class="d-flex align-items-center justify-content-center" href="<?php echo base_url("{$modules}") ?>">
        <div class="sidebar-brand-icon my-2 col-md-6 col-10">
          <img class="" src=<?php echo base_url("assets/img/logo/mainicon-tr.png") ?> width="100%;">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if ($sidebarActive == 'dashboard') { echo "active"; } ?>">
        <a class="nav-link" href=<?php echo base_url("{$modules}") ?>>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading 2 -->
      <div class="sidebar-heading">
        Data Management
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if ($sidebarActive == '') { echo "active"; } ?>">
        <a class="nav-link " href="<?php echo base_url("{$modules}/") ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Kelola Staff</span>
        </a>
      </li>
      <li class="nav-item <?php if ($sidebarActive == '') { echo "active"; } ?>">
        <a class="nav-link " href="<?php echo base_url("{$modules}/") ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Kelola Member</span>
        </a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

<!-- =================================== end: left_navbar =================================== -->
