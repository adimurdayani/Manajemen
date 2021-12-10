<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

  public function __construct()
  {
    parent::__construct();  
    is_logged_in();
    $this->load->model('m_data');
    
  }

  public function index()
  {
    $getnorekam = $this->m_data->getnorekammedikrj();
    $nourut = substr($getnorekam, 3, 4);
    $norekam = $nourut + 1;
    $data = array('no_rekam' => $norekam);

    $data['judul'] = 'Data Pasien Rawat Jalan';
    $data['get_rj'] = $this->db->get('tb_pasien_rawat_jalan')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_pasien', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('alamat', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('phone', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('umur', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('pekerjaan', 'jumlah pinjaman', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/d_modul/tb_rj', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'no_rekam_jalan' => $this->input->post('no_rekam_jalan'),
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

      $this->db->insert('tb_pasien_rawat_jalan', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul');
    }
    
  }

  public function edit()
  {
    $data['judul'] = 'Data Pasien Rawat Jalan';
    $data['get_rj'] = $this->db->get('tb_pasien_rawat_jalan')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_pasien', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('alamat', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('phone', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('umur', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('pekerjaan', 'jumlah pinjaman', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/d_modul/tb_rj', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'no_rekam_jalan' => $this->input->post('no_rekam_jalan'),
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

      $this->db->where('id', $id);      
      $this->db->update('tb_pasien_rawat_jalan', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terupdate.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul');
    }
    
  }

  public function hapus($id)
  {
    $this->db->delete('tb_pasien_rawat_jalan', ['id' =>$id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> data anda telah terhapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
    redirect('backend/modul');
  }

  public function pasienri()
  {
    $getnorekammedis = $this->m_data->getnorekammedikri();
    $nourut = substr($getnorekammedis, 3, 4);
    $norekammedis = $nourut + 1;
    $data = array('no_rekammedis' => $norekammedis);

    $data['judul'] = 'Data Pasien Rawat Inap';
    $data['get_ri'] = $this->db->get('tb_pasien_rawat_inap')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_pasien', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('alamat', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('phone', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('umur', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('pekerjaan', 'jumlah pinjaman', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/d_modul/tb_ri', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'no_rekam_inap' => $this->input->post('no_rekam_inap'),
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
      ];
      $this->db->insert('tb_pasien_rawat_inap', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/pasienri');
    }
    
  }

  public function pasienri_edit()
  {
    $data['judul'] = 'Data Pasien Rawat Inap';
    $data['get_ri'] = $this->db->get('tb_pasien_rawat_inap')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_pasien', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('alamat', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('phone', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('umur', 'jumlah pinjaman', 'trim|required');
    $this->form_validation->set_rules('pekerjaan', 'jumlah pinjaman', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/d_modul/tb_ri', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'no_rekam_inap' => $this->input->post('no_rekam_inap'),
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
      ];
      $this->db->where('id', $id);
      
      $this->db->update('tb_pasien_rawat_inap', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terupdate.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/pasienri');
    }
    
  }

  public function pasienri_hapus($id)
  {
    $this->db->delete('tb_pasien_rawat_inap', ['id' =>$id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> data anda telah terhapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
      redirect('backend/modul/pasienri');
  }

  public function ruangan()
  {
    $data['judul'] = 'Data Ruangan';
    $data['get_ruangan'] = $this->db->get('tb_ruangan')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_ruangan', 'nama ruangan', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/d_modul/tb_ruangan', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'nama_ruangan' => $this->input->post('nama_ruangan'),
        'alamat' => $this->input->post('alamat')
      ];
      $this->db->insert('tb_ruangan', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/ruangan');
    }
    
  }

  public function ruangan_edit()
  {
    $data['judul'] = 'Data Ruangan';
    $data['get_ruangan'] = $this->db->get('tb_ruangan')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_ruangan', 'nama ruangan', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/d_modul/tb_ruangan', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'nama_ruangan' => $this->input->post('nama_ruangan'),
        'alamat' => $this->input->post('alamat')
      ];
      
      $this->db->where('id', $id);
      
      $this->db->update('tb_ruangan', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terupdate.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/ruangan');
    }
  }

  public function ruangan_hapus($id)
  {
    $this->db->delete('tb_ruangan', ['id' =>$id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> data anda telah terhapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
      redirect('backend/modul/ruangan');
  }

  public function dokter()
  {

    $data['judul'] = 'Data Dokter';
    $data['get_dokter'] = $this->db->get('tb_dokter')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_dokter', 'nama dokter', 'trim|required');
    $this->form_validation->set_rules('spesialis', 'spesialis', 'trim|required');
    $this->form_validation->set_rules('phone', 'phone', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/d_modul/tb_dokter', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'nama_dokter' => $this->input->post('nama_dokter'),
        'alamat' => $this->input->post('alamat'),
        'kelamin' => $this->input->post('kelamin'),
        'spesialis' => $this->input->post('spesialis'),
        'phone' => $this->input->post('phone')
      ];
      $this->db->insert('tb_dokter', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/dokter');
    }
    
  }

  public function dokter_edit()
  {

    $data['judul'] = 'Data Dokter';
    $data['get_dokter'] = $this->db->get('tb_dokter')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_dokter', 'nama dokter', 'trim|required');
    $this->form_validation->set_rules('spesialis', 'spesialis', 'trim|required');
    $this->form_validation->set_rules('phone', 'phone', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/d_modul/tb_dokter', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id  = $this->input->post('id');
      
      $data = [
        'nama_dokter' => $this->input->post('nama_dokter'),
        'alamat' => $this->input->post('alamat'),
        'kelamin' => $this->input->post('kelamin'),
        'spesialis' => $this->input->post('spesialis'),
        'phone' => $this->input->post('phone')
      ];

      $this->db->where('id', $id);
      
      $this->db->update('tb_dokter', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terupdate.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/dokter');
    }
    
  }

  public function dokter_hapus($id)
  {
    $this->db->delete('tb_dokter', ['id' =>$id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> data anda telah terhapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
      redirect('backend/modul/dokter');
  }

  public function penyakit()
  {

    $data['judul'] = 'Data Penyakit';
    $data['get_penyakit'] = $this->db->get('tb_penyakit')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_penyakit', 'nama penyakit', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/d_modul/tb_penyakit', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'nama_penyakit' => $this->input->post('nama_penyakit')
      ];
      $this->db->insert('tb_penyakit', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/penyakit');
    }
    
  }

  public function penyakit_edit()
  {

    $data['judul'] = 'Data Penyakit';
    $data['get_penyakit'] = $this->db->get('tb_penyakit')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_penyakit', 'nama penyakit', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/d_modul/tb_penyakit', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'nama_penyakit' => $this->input->post('nama_penyakit')
      ];
      $this->db->where('id', $id);
      
      $this->db->update('tb_penyakit', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terupdate.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/penyakit');
    }
    
  }

  public function penyakit_hapus($id)
  {
    $this->db->delete('tb_penyakit', ['id' =>$id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> data anda telah terhapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
      redirect('backend/modul/penyakit');
  }

}

/* End of file Modeul.php */