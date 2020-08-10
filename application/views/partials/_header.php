<!-- =================================== start: header =================================== -->

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Chocobabana Admin Template">
  <meta name="author" content="Dio Ilham Djatiadi">

  <!-- Icon and title -->
  <link rel="icon" href="<?php echo base_url( SITE_ICON ) ?>">
  <title><?php echo $tabTitle.' | '.SITE_NAME ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('assets/template/sbadmin/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('assets/template/sbadmin/css/sb-admin-2.css') ?>" rel="stylesheet">

	<!-- Sweetalert JS -->
	<script src=<?php echo base_url('assets/js/plugins/sweetalert2/sweetalert.min.js') ?>></script>

	<?php if ( isset($dataTables) ): ?>
		<!-- Custom styles for this page -->
		<link href="<?php echo base_url('assets/template/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
	<?php endif; ?>

<!-- =================================== end: header =================================== -->
