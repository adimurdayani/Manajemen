<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Rawat_jalan extends BD_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_data');
  }

  public function index_get()
  {
    $id = $this->get('id');

    if ($id === null) {
      $data = $this->db->get('tb_pasien_rawat_jalan')->result_array();
    }else{
      $data = $this->db->get_where('tb_pasien_rawat_jalan', ['id' => $id])->row_array();
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

  public function index_post()
  {
    $getnorekam = $this->m_data->getnorekammedikrj();
    $nourut = substr($getnorekam, 3, 4);
    $norekam = $nourut + 1;

    $this->form_validation->set_rules('nama_pasien', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('alamat', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('phone', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('umur', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('pekerjaan', 'jumlah pinjaman', 'trim|required');

    if ($this->form_validation->run() == FALSE) {

      # response ketika username sudah digunakan 
      $this->response([
        'status' => false,
        'message' => validation_errors()
      ], REST_Controller::HTTP_BAD_REQUEST);   

    } else {
      # inisial data yang akan di input kedalam database
      $data = [
        'no_rekam_jalan' => "N-".sprintf("%05s", $norekam)."RI",
        'nama_pasien' => $this->input->post('nama_pasien'),
        'kelamin' => $this->input->post('kelamin'),
        'alamat' => $this->input->post('alamat'),
        'phone' => $this->input->post('phone'),
        'umur' => $this->input->post('umur'),
        'pekerjaan' => $this->input->post('pekerjaan'),
        'tgl_berobat' => $this->input->post('tgl_berobat'),
        'p_jawab' => $this->input->post('p_jawab'),
        'a_p_jawab' => $this->input->post('a_p_jawab'),
        'phone_p_jawab' => $this->input->post('phone_p_jawab'),
        'pekerjaan_p_jawab' => $this->input->post('pekerjaan_p_jawab'),
        'keterangan' => $this->input->post('keterangan'),
      ];

      $output = $this->db->insert('tb_pasien_rawat_jalan', $data);

      if ($output == 0) {
      // response ketika data gagal di simpan
        $this->response([
          'status' => false,
          'message' => 'Data gagal di simpan'
        ], REST_Controller::HTTP_NOT_FOUND);

      }else {
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