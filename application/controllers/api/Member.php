<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Member extends BD_Controller
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
      $data = $this->db->get('tb_member')->result_array();
    } else {
      $data = $this->db->get_where('tb_member', ['id' => $id])->row_array();
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

    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('t_lahir', 't_lahir', 'trim|required');
    $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');

    if ($this->form_validation->run() == FALSE) {

      $this->response([
        'status' => false,
        'message' => validation_errors()
      ], REST_Controller::HTTP_BAD_REQUEST);
    } else {
      # inisial data yang akan di input kedalam database
      $id = $this->input->post('member_id');

      $data = [
        'nik' => $this->input->post('nik'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'kelamin' => $this->input->post('kelamin'),
        'gol_darah' => $this->input->post('gol_darah'),
        'agama' => $this->input->post('agama'),
        'pekerjaan' => $this->input->post('pekerjaan'),
        'alamat' => $this->input->post('alamat'),
        't_lahir' => $this->input->post('t_lahir'),
        'created_at' => date("d M Y")
      ];
      $this->db->where('member_id', $id);
      $output = $this->db->update('tb_member', $data);

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

  public function namamember_post()
  {

    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required');
    $this->form_validation->set_rules('username', 'username', 'trim|required');

    if ($this->form_validation->run() == FALSE) {

      if (validation_errors() == true) {

        # response ketika username sudah digunakan 
        $this->response([
          'status' => false,
          'message' => 'data yang diinput salah'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    } else {
      # inisial data yang akan di input kedalam database
      $id = $this->input->post('id_m');

      $data = [
        'nama' => $this->input->post('nama'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
        'created_at' => date("d M Y")
      ];

      $this->db->where('id_m', $id);
      $output = $this->db->update('tb_member', $data);

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

  public function password_post()
  {
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');

    if ($this->form_validation->run() == FALSE) {

      if (validation_errors() == true) {

        # response ketika username sudah digunakan 
        $this->response([
          'status' => false,
          'message' => 'data yang diinput salah'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    } else {
      # inisial data yang akan di input kedalam database
      $id = $this->input->post('id_m');

      $data = [
        'password' => sha1($this->input->post('password')),
        'created_at' => date("d M Y H:i")
      ];
      $this->db->where('id_m', $id);
      $output = $this->db->update('tb_member', $data);

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

  public function gambar_get()
  {
    $id = $this->get('id_m');
    if ($id === null) {
      $data = $this->db->get('tb_member')->result_array();
    } else {
      $data = $this->db->get_where('tb_member',  ['id_m' => $id])->row_array();
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

  public function gambar_post()
  {
    $id = $this->input->post('id_m');

    $config['upload_path']    = './assets/images/uploads/';
    $config['allowed_types']  = 'jpg|png|jpeg';
    $config['max_size']       = '1024';
    $config['encrypt_name']    = TRUE;

    $this->load->library('upload', $config);

    if (!empty($_FILES['image'])) {
      # code...
      $this->upload->do_upload('image');
      $image = $this->upload->data();
      $file_image = $image['file_name'];
    } else {
      // response ketika gambar bermasalah
      $this->response([
        'status'  => false,
        'message' => 'file tidak terupload'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }

    $data = [
      'created_at' => date("d M Y"),
      'image' => $file_image
    ];

    $this->db->where('id_m', $id);
    $output = $this->db->update('tb_member', $data);

    if ($output == 0) {
      // response ketika data gagal di simpan
      $this->response([
        'status' => false,
        'message' => 'Gambar gagal disimpan'
      ], REST_Controller::HTTP_NOT_FOUND);
    } else {
      // response ketika data berhasil disimpan
      $this->response([
        'status' => true,
        'message' => 'Gambar berhasil disimpan',
        'data' => $data
      ], REST_Controller::HTTP_OK);
    }
  }
}

/* End of file User.php */