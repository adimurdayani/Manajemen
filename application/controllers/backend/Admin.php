<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_data');
    is_logged_in();
  }

  public function index()
  {
    $data['judul'] = 'Dashboard';
    $data['jml_menu'] = $this->db->get('tb_menu')->num_rows();
    $data['jml_sub_menu'] = $this->db->get('tb_sub_menu')->num_rows();
    $data['jml_user'] = $this->db->get('tb_user')->num_rows();
    $data['jml_grup'] = $this->db->get('tb_grup')->num_rows();
    $data['user_ses'] = $this->db
      ->get_where('tb_user', [
        'username' => $this->session->userdata('username'),
      ])
      ->row_array();
    $this->load->view('backend/layout/head', $data, false);
    $this->load->view('backend/layout/sidebar', $data, false);
    $this->load->view('backend/layout/header', $data, false);
    $this->load->view('backend/dashboard', $data, false);
    $this->load->view('backend/layout/footer', $data, false);
  }
}

/* End of file Dashboard.php */
