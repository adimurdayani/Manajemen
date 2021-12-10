<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Ruangan extends BD_Controller {

  public function index_get()
  {
    $id = $this->get('id');

    if ($id === null) {
      $data = $this->db->get('tb_ruangan')->result_array();
    }else{
      $data = $this->db->get_where('tb_ruangan', ['id' => $id])->row_array();
    }

    if ($data) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $data,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);

    }else {
      # response laporan jika laporan tidak ada
      $this->response([
        'status'  => false,
        'message' => 'data tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

}

/* End of file Rawat_jalan.php */