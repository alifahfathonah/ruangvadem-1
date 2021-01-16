<?php defined('BASEPATH') OR exit('No direct script access allowed');

$alsite 			= current_url();
$alamat_kunjungan 	= str_replace('index.php/','',$alsite);
$this->kunjungan->counter($alamat_kunjungan);

require_once('header.php');
require_once('konten.php');
require_once('footer.php');