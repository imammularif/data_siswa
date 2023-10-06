<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
    {
            $data = array('title'  => 'Halaman Dashboard',
              'isi'  => 'admin/dasbor');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
