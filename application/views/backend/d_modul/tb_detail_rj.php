<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10"><?= $judul; ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url(
                                                                        'backend/modul'
                                                                    ) ?>">Pasien Rawat Jalan</a></li>
                            <li class="breadcrumb-item"><a href="#!"><?= $judul ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Typography ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Detail Data <?= $judul ?></h5>
                        Tanggal Berobat: <div class="badge badge-info"><?= $get_id_rj['tgl_berobat'] ?></div>
                        Nama Penyakit: <div class="badge badge-info"><?= $get_id_rj['nama_penyakit'] ?></div>
                        Nama Ruangan: <div class="badge badge-info"><?= $get_id_rj['nama_ruangan'] ?></div>
                        <a href="" class="btn btn-outline-warning float-right" data-target="#modal-tgl" data-toggle="modal"><i class="feather icon-calendar"></i> Atur Jadwal Berobat</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="width: 18rem;">
                                    <h5 class="text-center mt-2">Data Pasien</h5>
                                    <center><img src="<?= base_url(
                                                            'assets/images/user.png'
                                                        ) ?>" class="card-img-top" alt="..." style="width: 100px;"></center>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $get_id_rj['nama_pasien'] ?></h5>
                                        <p class="card-text">
                                            <?= $get_id_rj['keterangan'] ?>
                                        </p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Jenis Kelamin: <?= $get_id_rj['kelamin'] ?></li>
                                        <li class="list-group-item">Umur: <?= $get_id_rj['umur'] ?> <br></li>
                                        <li class="list-group-item">Phone: <?= $get_id_rj['phone'] ?> <br></li>
                                        <li class="list-group-item">Pekerjaan: <?= $get_id_rj['pekerjaan'] ?> <br></li>
                                        <li class="list-group-item">Keterangan: <?= $get_id_rj['alamat'] ?> <br></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="width: 18rem;">
                                    <h5 class="text-center mt-2">Data Penanggung Jawab</h5>
                                    <center><img src="<?= base_url(
                                                            'assets/images/user.png'
                                                        ) ?>" class="card-img-top" alt="..." style="width: 100px;"></center>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $get_id_rj['p_jawab'] ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Jenis Kelamin: <?= $get_id_rj['phone_p_jawab'] ?></li>
                                        <li class="list-group-item">Pekerjaan: <?= $get_id_rj['pekerjaan_p_jawab'] ?></li>
                                        <li class="list-group-item">Alamat: <?= $get_id_rj['a_p_jawab'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->

        <div id="modal-tgl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLiveLabel">Atur Jadwal Berobat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            <input type="hidden" name="id" value="<?= $get_id_rj['id'] ?>">
                            <input type="hidden" name="user_id" value="<?= $get_id_rj['user_id'] ?>">

                            <div class="form-group">
                                <label for="tgl_berobat">Tanggal Berobat</label>
                                <input type="date" class="form-control" id="tgl_berobat" name="tgl_berobat">
                                <?= form_error(
                                    'tgl_berobat',
                                    '<small class="text-danger">',
                                    '</small>'
                                ) ?>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn  btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>