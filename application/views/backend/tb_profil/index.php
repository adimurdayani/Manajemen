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
              <li class="breadcrumb-item"><a href="<?= base_url('backend/modul') ?>"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#!"><?= $judul; ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-6">
        <div class="card">

          <div class="card-header">
            <h5>Profile</h5>
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
                  <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <?= $this->session->flashdata('msg'); ?>

            <div class="col-xl">
              <div class="card">
                <h5 class="card-header"><?= $user_ses['nama'] ?> </h5>

                <div class="card-body">
                  <form action="<?= base_url('backend/setting/edit') ?>" method="POST">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" name="nama" id="nama" class="form-control" value="<?= $user_ses['nama'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" class="form-control" id="email" value="<?= $user_ses['email'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" name="username" id="username" class="form-control" value="<?= $user_ses['username'] ?>" readonly>
                    </div>

                    <input type="hidden" name="user_active" id="user_active" value="<?= $user_ses['user_active'] ?>">
                  </form>

                  <a href="" class="btn btn-primary" data-target="#modal-edit" data-toggle="modal">Edit</a>
                </div>
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

<div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('backend/user/edit_profile') ?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="id" value="<?= $user_ses['id'] ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user_ses['nama'] ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="floating-label" for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user_ses['username'] ?>">
                <?= form_error('username', '<small class="text-danger">', '</small>') ?>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="floating-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user_ses['email'] ?>">
            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
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