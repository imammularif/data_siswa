<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	public function index()
	{
		$data = array('title' => 'Halaman Dasbor Pustaka',
					  'isi'   => 'admin/dasbor/list' );
	    $this->load->view('admin/layout/wrapper', $data, FALSE);	
	}
}