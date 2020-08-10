<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @chocobabana
 *
 * Struktur array pada tahap ini:
 *  $view = (object)array(
 *		'modules' 		=> 'admin',
 *		'tabTitle'		=> 'Dashboard',
 *		'content' 		=> 'v_main',
 *  );
 *
*/

// echo "<pre>";print_r($view);die();
$this->load->view("modules/{$view->modules}/_3top_navbar", $view);

?>
