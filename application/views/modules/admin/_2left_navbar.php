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
      <li class="nav-item <?php if ($sidebarActive == 'kelolaUser') { echo "active"; } ?>">
        <a class="nav-link " href="<?php echo base_url("{$modules}/manage/users") ?>">
          <i class="fas fa-fw fa-id-card"></i>
          <span>Kelola Users</span>
        </a>
      </li>
      <li class="nav-item <?php if ($sidebarActive == 'kelolaSiswa') { echo "active"; } ?>">
        <a class="nav-link " href="<?php echo base_url("{$modules}/manage/siswa") ?>">
          <i class="fas fa-fw fa-child"></i>
          <span>Kelola Siswa</span>
        </a>
      </li>
      <li class="nav-item <?php if ($sidebarActive == 'kelolaDepartment') { echo "active"; } ?>">
        <a class="nav-link " href="<?php echo base_url("{$modules}/manage/department") ?>">
          <i class="fas fa-fw fa-sitemap"></i>
          <span>Kelola Department</span>
        </a>
      </li>
      <li class="nav-item <?php if ($sidebarActive == 'kelolaKelas') { echo "active"; } ?>">
        <a class="nav-link " href="<?php echo base_url("{$modules}/manage/kelas") ?>">
          <i class="fas fa-fw fa-school"></i>
          <span>Kelola Kelas</span>
        </a>
      </li>
      <li class="nav-item <?php if ($sidebarActive == 'uploadFile') { echo "active"; } ?>">
        <a class="nav-link " href="<?php echo base_url("{$modules}/manage-file/hub") ?>">
          <i class="fas fa-fw fa-file-upload"></i>
          <span>Manage File Hub</span>
        </a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

<!-- =================================== end: left_navbar =================================== -->
