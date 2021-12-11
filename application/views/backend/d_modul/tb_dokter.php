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
                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
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
              <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-add"><i
                  class="feather icon-plus"></i> Tambah</a>
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
                      <th class="text-center">Nama Dokter</th>
                      <th class="text-center">Jenis Kelamin</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Phone</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $no = 1;
                    foreach ($get_dokter as $data): ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td><?= $data['nama_dokter'] ?></td>
                      <td><?= $data['kelamin'] ?></td>
                      <td><?= $data['alamat'] ?></td>
                      <td><?= $data['phone'] ?></td>
                      <td class="text-center">
                        <a href="" class="btn btn-warning" data-toggle="modal"
                          data-target="#modal-edit<?= $data[
                              'id'
                          ] ?>"><i class=" feather icon-edit"></i> Edit</a>
                        <a href="" class="btn btn-danger" data-toggle="modal"
                          data-target="#modal-hapus<?= $data[
                              'id'
                          ] ?>"><i class=" feather icon-trash"></i> Hapus</a>
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

<div id="modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/modul/dokter') ?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Data Dokter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="floating-label" for="nama_dokter">Nama Dokter</label>
                <input type="text" class="form-control" id="nama_dokter" name="nama_dokter"
                  value="<?= set_value('nama_dokter') ?>">
                <?= form_error(
                    'nama_dokter',
                    '<small class="text-danger">',
                    '</small>'
                ) ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="kelamin">Jenis Kelamin</label>
            <select name="kelamin" id="kelamin" class="form-control">
              <option value="Perempuan">Perempuan</option>
              <option value="Laki-laki">Laki-laki</option>
            </select>
          </div>

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

          <div class="form-group">
            <label class="floating-label" for="spesialis">Spesialis</label>
            <input type="text" class="form-control" id="spesialis" name="spesialis"
              value="<?= set_value('spesialis') ?>">
            <?= form_error(
                'spesialis',
                '<small class="text-danger">',
                '</small>'
            ) ?>
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

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn  btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($get_dokter as $edit): ?>
<div id="modal-edit<?= $edit[
    'id'
] ?>" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/modul/dokter_edit') ?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Edit Data Dokter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="id" value="<?= $edit['id'] ?>">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="floating-label" for="nama_dokter">Nama Dokter</label>
                <input type="text" class="form-control" id="nama_dokter" name="nama_dokter"
                  value="<?= $edit['nama_dokter'] ?>">
                <?= form_error(
                    'nama_dokter',
                    '<small class="text-danger">',
                    '</small>'
                ) ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="kelamin">Jenis Kelamin</label>
            <select name="kelamin" id="kelamin" class="form-control">
              <option value="Perempuan">Perempuan</option>
              <option value="Laki-laki">Laki-laki</option>
            </select>
          </div>

          <div class="form-group">
            <label class="floating-label" for="phone">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" value="<?= $edit[
                'phone'
            ] ?>">
            <?= form_error(
                'phone',
                '<small class="text-danger">',
                '</small>'
            ) ?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="spesialis">Spesialis</label>
            <input type="text" class="form-control" id="spesialis" name="spesialis" value="<?= $edit[
                'spesialis'
            ] ?>">
            <?= form_error(
                'spesialis',
                '<small class="text-danger">',
                '</small>'
            ) ?>
          </div>

          <div class="form-group">
            <label class="floating-label" for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?= $edit[
                'alamat'
            ] ?></textarea>
            <?= form_error(
                'alamat',
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

<?php foreach ($get_dokter as $hapus): ?>
<div id="modal-hapus<?= $hapus[
    'id'
] ?>" class="modal fade" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLiveLabel">Hapus Data Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <input type="hidden" name="id" value="<?= $hapus['id'] ?>">

        <p>
          Apakah anda yakin ingin menghapus data <b><?= $hapus[
              'nama_dokter'
          ] ?></b>?
        </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('backend/modul/dokter_hapus/') .
            $hapus['id'] ?>" class="btn  btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
