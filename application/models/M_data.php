<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{

  public function get_all_submenu()
  {
    $querysubmenu = "SELECT `tb_sub_menu`.*, `tb_menu`.`menu`
                      FROM `tb_sub_menu`
                      JOIN  `tb_menu` ON `tb_sub_menu`.`menu_id` = `tb_menu`.`id_menu`
                  ";
    return $this->db->query($querysubmenu)->result_array();
  }

  public function getnorekammedikrj()
  {
    $query = $this->db->query("SELECT MAX(no_rekam_jalan) as no_rekam FROM tb_pasien_rawat_jalan");
    $hasil = $query->row();
    return $hasil->no_rekam;
  }

  public function getnorekammedikri()
  {
    $query = $this->db->query("SELECT MAX(no_rekam_inap) as norekammedis FROM tb_pasien_rawat_inap");
    $hasil = $query->row();
    return $hasil->norekammedis;
  }

  public function cekidmember()
  {
    $query = $this->db->query("SELECT MAX(member_id) as member_id FROM tb_member");
    $hasil = $query->row();
    return $hasil->member_id;
  }

  public function get_all_penyakit()
  {
    $querysubmenu = "SELECT `tb_penyakit`.*, `tb_ruangan`.`nama_ruangan`
                      FROM `tb_penyakit`
                      JOIN  `tb_ruangan` ON `tb_penyakit`.`ruangan` = `tb_ruangan`.`id`
                  ";
    return $this->db->query($querysubmenu)->result_array();
  }

  public function get_all_rj()
  {
    $querysubmenu = "SELECT `tb_pasien_rawat_jalan`.*, `tb_penyakit`.`nama_penyakit`,`tb_ruangan`.`nama_ruangan`
                      FROM `tb_pasien_rawat_jalan`
                      JOIN  `tb_penyakit` ON `tb_pasien_rawat_jalan`.`penyakit_id` = `tb_penyakit`.`id`
                      JOIN  `tb_ruangan` ON `tb_penyakit`.`ruangan` = `tb_ruangan`.`id`
                      ORDER BY `tb_pasien_rawat_jalan`.`id`  DESC
                  ";
    return $this->db->query($querysubmenu)->result_array();
  }

  public function get_all_ri()
  {
    $querysubmenu = "SELECT `tb_pasien_rawat_inap`.*, `tb_penyakit`.`nama_penyakit`,`tb_ruangan`.`nama_ruangan`
                      FROM `tb_pasien_rawat_inap`
                      JOIN  `tb_penyakit` ON `tb_pasien_rawat_inap`.`nama_penyakit` = `tb_penyakit`.`id`
                      JOIN  `tb_ruangan` ON `tb_penyakit`.`ruangan` = `tb_ruangan`.`id`
                      ORDER BY `tb_pasien_rawat_inap`.`id`  DESC
                  ";
    return $this->db->query($querysubmenu)->result_array();
  }

  public function get_id_rj($id)
  {
    $querysubmenu = "SELECT `tb_pasien_rawat_jalan`.*, `tb_penyakit`.`nama_penyakit`,`tb_ruangan`.`nama_ruangan`
                      FROM `tb_pasien_rawat_jalan`
                      JOIN  `tb_penyakit` ON `tb_pasien_rawat_jalan`.`penyakit_id` = `tb_penyakit`.`id`
                      JOIN  `tb_ruangan` ON `tb_penyakit`.`ruangan` = `tb_ruangan`.`id`
                      WHERE `tb_pasien_rawat_jalan`.`id` = $id
                  ";
    return $this->db->query($querysubmenu)->row_array();
  }

  public function get_id_ri($id)
  {
    $querysubmenu = "SELECT `tb_pasien_rawat_inap`.*, `tb_penyakit`.`nama_penyakit`,`tb_ruangan`.`nama_ruangan`
                      FROM `tb_pasien_rawat_inap`
                      JOIN  `tb_penyakit` ON `tb_pasien_rawat_inap`.`nama_penyakit` = `tb_penyakit`.`id`
                      JOIN  `tb_ruangan` ON `tb_penyakit`.`ruangan` = `tb_ruangan`.`id`
                      WHERE `tb_pasien_rawat_inap`.`id` = $id
                  ";
    return $this->db->query($querysubmenu)->row_array();
  }
}

/* End of file M_data.php */