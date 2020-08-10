<?php
	// inisialisasi $CI yang fungsinya sama dengan $this
	$CI =& get_instance();
	if( ! isset($CI))
	{
	    $CI = new CI_Controller();
	}
	$CI->load->helper('url');

// below here base_url(), site_url() will work
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Chocobabana Admin Template">
  <meta name="author" content="Dio Ilham Djatiadi">

	<!-- Icon and title -->
	<link href="<?php echo base_url('assets/img/logo/logo-black.png')?>" rel="icon">
	<title>Page not found | <?php echo SITE_NAME ?></title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/template/sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content" class="my-5 py-5">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5" style="font-size:4em;">Page Not Found</p>
            <p class="text-gray-500 mb-0">
							It looks like you've entered an invalid URL
							or the page you are searching for might unavailable.
						</p>
						<p class="text-gray-500 mb-0"> Go back to Chocobabana Admin panel to find what you are looking for </p>
						<br>
            <a href=<?php echo base_url() ?>>&larr; Back to Chocobabana Admin panel</a>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

			<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
						<strong>Copyright &copy; 2020 <a href="http://ringkes.in" target="_blank">Chocobabana Admin</a>.</strong>
						All rights reserved.
						<div class="float-right d-none d-sm-inline-block">
							<b>Version</b> <?php echo DEV_VERSION ?>
						</div>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
</body>
</html>
