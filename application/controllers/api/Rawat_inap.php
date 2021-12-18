<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Rawat_inap extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_data');
  }

  public function index_get()
  {
    $id = $this->get('id');

    if ($id === null) {
      $data = $this->m_data->get_all_ri();
    } else {
      $data = $this->m_data->get_id_ri($id);
    }

    if ($data) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $data,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);
    } else {
      # response laporan jika laporan tidak ada
      $this->response([
        'status'  => false,
        'message' => 'data tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function index_post()
  {
    $getnorekammedis = $this->m_data->getnorekammedikri();
    $nourut = substr($getnorekammedis, 3, 4);
    $norekammedis = $nourut + 1;

    $this->form_validation->set_rules('nama_pasien', 'nama pasien', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('phone', 'phone', 'trim|required');
    $this->form_validation->set_rules('umur', 'umur', 'trim|required');
    $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');

    if ($this->form_validation->run() == FALSE) {

      # response ketika username sudah digunakan 
      $this->response([
        'status' => false,
        'message' => validation_errors()
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      # inisial data yang akan di input kedalam database
      $data = [
        'no_rekam_inap' => "N-" . sprintf("%05s", $norekammedis) . "RJ",
        'nama_pasien' => $this->input->post('nama_pasien'),
        'kelamin' => $this->input->post('kelamin'),
        'alamat' => $this->input->post('alamat'),
        'phone' => $this->input->post('phone'),
        'umur' => $this->input->post('umur'),
        'pekerjaan' => $this->input->post('pekerjaan'),
        'tgl_masuk' => $this->input->post('tgl_masuk'),
        'p_jawab' => $this->input->post('p_jawab'),
        'pekerjaan_p_jawab' => $this->input->post('pekerjaan_p_jawab'),
        'keterangan' => $this->input->post('keterangan'),
        'nama_penyakit' => $this->input->post('nama_penyakit'),
      ];

      $output = $this->db->insert('tb_pasien_rawat_inap', $data);

      if ($output == 0) {
        // response ketika data gagal di simpan
        $this->response([
          'status' => false,
          'message' => 'Data gagal di simpan'
        ], REST_Controller::HTTP_NOT_FOUND);
      } else {
        // response ketika data berhasil disimpan
        $this->response([
          'status' => true,
          'message' => 'Data berhasil di simpan',
          'data' => $data
        ], REST_Controller::HTTP_OK);
      }
    }
  }
}

/* End of file Rawat_jalan.php */