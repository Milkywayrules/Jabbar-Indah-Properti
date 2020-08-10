<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @chocobabana
 *
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("partials/_header", $view_hub); ?>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-purple-dark sidebar sidebar-dark accordion" id="accordionSidebar">
      <?php $this->load->view("modules/{$view_hub->modules}/_2left_navbar", $view_hub); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <?php $this->load->view("modules/{$view_hub->modules}/_3top_navbar", $view_hub); ?>
        <!-- Begin Page Content -->
        <!-- <div class="container-fluid px-5"> -->
          <?php $this->load->view("modules/{$view_hub->modules}/{$view_hub->contentViewFile}", $view_hub); ?>
        <!-- </div> -->
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <?php $this->load->view("partials/_footer", $view_hub); ?>
</body>
</html>
