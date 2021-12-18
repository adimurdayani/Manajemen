<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
  <div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10"><?= $judul ?></h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#!"><?= $judul ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <div class="card">

          <div class="card-header">
            <h5>Tabel <?= $judul ?></h5>
            <div class="card-header-right">
              <div class="btn-group card-option">
                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="feather icon-more-horizontal"></i>
                </button>
                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                  <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                        Restore</span></a></li>
                  <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i>
                        collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a>
                  </li>
                  <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-body table-border-style">
              <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-add"><i class="feather icon-plus"></i> Tambah</a>
              <?= $this->session->flashdata('msg') ?>
              <?= validation_errors(
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						',
                '</div>'
              ) ?>
              <div class="table-responsive">
                <table id="table" class="table">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">No. Rekam Medis</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Kelamin</th>
                      <th class="text-center">Phone</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Tanggal Berobat</th>
                      <th class="text-center">Penyakit</th>
                      <th class="text-center">Ruangan</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $no = 1;
                    foreach ($get_rj as $data) : ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $data['no_rekam_jalan'] ?></td>
                        <td><?= $data['nama_pasien'] ?></td>
                        <td><?= $data['kelamin'] ?></td>
                        <td><?= $data['phone'] ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td><?= $data['tgl_berobat'] ?></td>
                        <td><?= $data['nama_penyakit'] ?></td>
                        <td><?= $data['nama_ruangan'] ?></td>
                        <td class="text-center">
                          <a href="<?= base_url('backend/modul/detailrj/') .
                                      $data['id'] ?>" class="btn btn-success"><i class=" feather icon-eye"></i> Detail</a>
                          <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $data['id'] ?>"><i class=" feather icon-edit"></i> Edit</a>
                          <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus<?= $data['id'] ?>"><i class=" feather icon-trash"></i> Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach;
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
  </div>
</div>
<!-- [ Main Content ] end -->

<div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/modul') ?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Pasien Rawat Jalan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <center>
            <h5>DATA PASIEN</h5>
          </center>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="floating-label" for="no_rekam_jalan">No. Rekam Medis </label>
                <input type="text" class="form-control" id="no_rekam_jalan" name="no_rekam_jalan" value="N-<?= sprintf('%05s', $no_rekam) ?>RJ" readonly>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="nama_pasien">Nama</label>
            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= set_value('nama_pasien') ?>">
            <?= form_error(
              'nama_pasien',
              '<small class="text-danger">',
              '</small>'
            ) ?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="kelamin">Pilih Kelamin</label>
            <select name="kelamin" id="kelamin" class="form-control">
              <option value="Perempuan">Perempuan</option>
              <option value="Laki_laki">Laki_laki</option>
            </select>
          </div>

          <div class="form-group">
            <label class="floating-label" for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
            <?= form_error(
              'alamat',
              '<small class="text-danger">',
              '</small>'
            ) ?>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan') ?>">
                <?= form_error(
                  'pekerjaan',
                  '<small class="text-danger">',
                  '</small>'
                ) ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="phone">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone" value="<?= set_value(
                                                                                            'phone'
                                                                                          ) ?>">
                <?= form_error(
                  'phone',
                  '<small class="text-danger">',
                  '</small>'
                ) ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="umur">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur" value="<?= set_value(
                                                                                      'umur'
                                                                                    ) ?>">
            <?= form_error('umur', '<small class="text-danger">', '</small>') ?>
          </div>

          <div class="form-group">
            <label for="tgl_berobat">Tanggal Berobat</label>
            <input type="date" class="form-control" id="tgl_berobat" name="tgl_berobat" value="<?= set_value('tgl_berobat') ?>">
            <?= form_error(
              'tgl_berobat',
              '<small class="text-danger">',
              '</small>'
            ) ?>
          </div>

          <div class="form-group">
            <label for="nama_penyakit">Tanggal Berobat</label>
            <select name="nama_penyakit" id="nama_penyakit" class="form-control">
              <?php foreach ($get_penyakit as $penyakit) : ?>
                <option value="<?= $penyakit['id'] ?>"><?= $penyakit['nama_penyakit'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <center>
            <h5>DATA PENANGGUNG JAWAB</h5>
          </center>

          <div class="form-group">
            <label class="floating-label" for="p_jawab">Nama Penanggung Jawab</label>
            <input type="text" class="form-control" id="p_jawab" name="p_jawab" value="<?= set_value(
                                                                                          'p_jawab'
                                                                                        ) ?>">
            <?= form_error(
              'p_jawab',
              '<small class="text-danger">',
              '</small>'
            ) ?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="a_p_jawab">Alamat Penanggung Jawab</label>
            <textarea name="a_p_jawab" id="a_p_jawab" cols="30" rows="5" class="form-control"></textarea>
            <?= form_error(
              'a_p_jawab',
              '<small class="text-danger">',
              '</small>'
            ) ?>
          </div>

          <div class="row">
            <div class="col md-6">
              <div class="form-group">
                <label class="floating-label" for="phone_p_jawab">Phone Penanggung Jawab</label>
                <input type="number" class="form-control" id="phone_p_jawab" name="phone_p_jawab" value="<?= set_value('phone_p_jawab') ?>">
                <?= form_error(
                  'phone_p_jawab',
                  '<small class="text-danger">',
                  '</small>'
                ) ?>
              </div>
            </div>
            <div class="col md-6">
              <div class="form-group">
                <label class="floating-label" for="pekerjaan_p_jawab">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan_p_jawab" name="pekerjaan_p_jawab" value="<?= set_value('pekerjaan_p_jawab') ?>">
                <?= form_error(
                  'pekerjaan_p_jawab',
                  '<small class="text-danger">',
                  '</small>'
                ) ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"></textarea>
            <?= form_error(
              'keterangan',
              '<small class="text-danger">',
              '</small>'
            ) ?>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn  btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($get_rj as $edit) : ?>
  <div id="modal-edit<?= $edit['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form action="<?= base_url('backend/modul/edit') ?>" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLiveLabel">Edit Pasien Rawat Jalan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">

            <input type="hidden" name="id" value="<?= $edit['id'] ?>">
            <center>
              <h5>DATA PASIEN</h5>
            </center>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="floating-label" for="no_rekam_jalan">No. Rekam Medis </label>
                  <input type="text" class="form-control" id="no_rekam_jalan" name="no_rekam_jalan" readonly value="<?= $edit['no_rekam_jalan'] ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="floating-label" for="nama_pasien">Nama</label>
              <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $edit['nama_pasien'] ?>">
              <?= form_error(
                'nama_pasien',
                '<small class="text-danger">',
                '</small>'
              ) ?>
            </div>

            <div class="form-group">
              <label class="floating-label" for="kelamin">Pilih Kelamin</label>
              <select name="kelamin" id="kelamin" class="form-control">
                <option value="Perempuan" <?php if (
                                            $edit['kelamin'] != 'Perempuan'
                                          ) : ?> <?php else : ?> selected <?php endif; ?>>Perempuan</option>
                <option value="Laki-laki" <?php if (
                                            $edit['kelamin'] != 'Laki-laki'
                                          ) : ?> <?php else : ?> selected <?php endif; ?>>Laki_laki</option>
              </select>
            </div>

            <div class="form-group">
              <label class="floating-label" for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?= $edit['alamat'] ?></textarea>
              <?= form_error(
                'alamat',
                '<small class="text-danger">',
                '</small>'
              ) ?>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label" for="pekerjaan">Pekerjaan</label>
                  <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $edit['pekerjaan'] ?>">
                  <?= form_error(
                    'pekerjaan',
                    '<small class="text-danger">',
                    '</small>'
                  ) ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label" for="phone">Phone</label>
                  <input type="number" class="form-control" id="phone" name="phone" value="<?= $edit['phone'] ?>">
                  <?= form_error(
                    'phone',
                    '<small class="text-danger">',
                    '</small>'
                  ) ?>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="floating-label" for="umur">Umur</label>
              <input type="number" class="form-control" id="umur" name="umur" value="<?= $edit['umur'] ?>">
              <?= form_error('umur', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="form-group">
              <label for="tgl_berobat">Tanggal Berobat</label>
              <input type="date" class="form-control" id="tgl_berobat" name="tgl_berobat" value="<?= $edit['tgl_berobat'] ?>">
              <?= form_error(
                'tgl_berobat',
                '<small class="text-danger">',
                '</small>'
              ) ?>
            </div>

            <div class="form-group">
              <label for="nama_penyakit">Tanggal Berobat</label>
              <select name="nama_penyakit" id="nama_penyakit" class="form-control">
                <?php foreach ($get_penyakit as $penyakit) : ?>
                  <option value="<?= $penyakit['id'] ?>"><?= $penyakit['nama_penyakit'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <center>
              <h5>DATA PENANGGUNG JAWAB</h5>
            </center>

            <div class="form-group">
              <label class="floating-label" for="p_jawab">Nama Penanggung Jawab</label>
              <input type="text" class="form-control" id="p_jawab" name="p_jawab" value="<?= $edit['p_jawab'] ?>">
              <?= form_error(
                'p_jawab',
                '<small class="text-danger">',
                '</small>'
              ) ?>
            </div>

            <div class="form-group">
              <label class="floating-label" for="a_p_jawab">Alamat Penanggung Jawab</label>
              <textarea name="a_p_jawab" id="a_p_jawab" cols="30" rows="5" class="form-control"><?= $edit['a_p_jawab'] ?></textarea>
              <?= form_error(
                'a_p_jawab',
                '<small class="text-danger">',
                '</small>'
              ) ?>
            </div>

            <div class="row">
              <div class="col md-6">
                <div class="form-group">
                  <label class="floating-label" for="phone_p_jawab">Phone Penanggung Jawab</label>
                  <input type="number" class="form-control" id="phone_p_jawab" name="phone_p_jawab" value="<?= $edit['phone_p_jawab'] ?>">
                  <?= form_error(
                    'phone_p_jawab',
                    '<small class="text-danger">',
                    '</small>'
                  ) ?>
                </div>
              </div>
              <div class="col md-6">
                <div class="form-group">
                  <label class="floating-label" for="pekerjaan_p_jawab">Pekerjaan</label>
                  <input type="text" class="form-control" id="pekerjaan_p_jawab" name="pekerjaan_p_jawab" value="<?= $edit['pekerjaan_p_jawab'] ?>">
                  <?= form_error(
                    'pekerjaan_p_jawab',
                    '<small class="text-danger">',
                    '</small>'
                  ) ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="floating-label" for="keterangan">Keterangan</label>
              <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"><?= $edit['keterangan'] ?></textarea>
              <?= form_error(
                'keterangan',
                '<small class="text-danger">',
                '</small>'
              ) ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn  btn-warning">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php foreach ($get_rj as $hapus) : ?>
  <div id="modal-hapus<?= $hapus['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Hapus Pasien Rawat Jalan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="id" value="<?= $hapus['id'] ?>">

          <p>
            Apakah anda yakin ingin menghapus data <b><?= $hapus['nama_pasien'] ?></b>?
          </p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
          <a href="<?= base_url('backend/modul/hapus/') .
                      $hapus['id'] ?>" class="btn  btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>