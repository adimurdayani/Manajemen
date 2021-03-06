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
                            <li class="breadcrumb-item"><a href="<?= base_url(
                                'backend/modul'
                            ) ?>">Pasien Rawat Inap</a></li>
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
                        <div class="badge badge-info">Tanggal Masuk: <?= $get_id_ri[
                            'tgl_masuk'
                        ] ?></div>
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
                                        <h5 class="card-title"><?= $get_id_ri[
                                            'nama_pasien'
                                        ] ?></h5>
                                        <p class="card-text">
                                            <?= $get_id_ri['keterangan'] ?>
                                        </p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Jenis Kelamin: <?= $get_id_ri[
                                            'kelamin'
                                        ] ?></li>
                                        <li class="list-group-item">Umur: <?= $get_id_ri[
                                            'umur'
                                        ] ?> <br></li>
                                        <li class="list-group-item">Phone: <?= $get_id_ri[
                                            'phone'
                                        ] ?> <br></li>
                                        <li class="list-group-item">Pekerjaan: <?= $get_id_ri[
                                            'pekerjaan'
                                        ] ?> <br></li>
                                        <li class="list-group-item">Keterangan: <?= $get_id_ri[
                                            'alamat'
                                        ] ?> <br></li>
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
                                        <h5 class="card-title"><?= $get_id_ri[
                                            'p_jawab'
                                        ] ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Pekerjaan: <?= $get_id_ri[
                                            'pekerjaan_p_jawab'
                                        ] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->