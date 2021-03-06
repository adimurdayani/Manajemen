  <!-- [ Header ] start -->
  <header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      <a href="#!" class="b-brand">
        <!-- ========   change your logo hear   ============ -->
        <img src="<?= base_url() ?>assets/images/logo-skripsi.png" alt="" class="logo">
        <img src="<?= base_url() ?>assets/images/logo-icon.png" alt="" class="logo-thumb">
      </a>
      <a href="#!" class="mob-toggler">
        <i class="feather icon-more-vertical text-light"></i>
      </a>
    </div>
    <div class="collapse navbar-collapse">

      <ul class="navbar-nav ml-auto">

        <li>
          <div class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <i class="icon feather icon-bell text-light"></i>
              <span class="badge rounded-pill bg-danger text-light" id="total">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right notification">
              <div class="noti-head">
                <h6 class="d-inline-block m-b-0">Notifications </h6>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary " id="member">
                  0
                </span>
              </div>
              <ul class="noti-body">
                <li class="n-title">
                  <p class="m-b-0">NEW</p>
                </li>
                <li class="notification">
                  <a href="<?= base_url('backend/user/member') ?>">
                    <div class="media">
                      <img class="img-radius" src="<?= base_url() ?>assets/images/user.png" alt="Generic placeholder image">
                      <div class="media-body">
                        <p><strong id="nama">John Doe</strong><span class="n-time text-muted" id="tanggal"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                        <p id="pesan">New ticket Added</p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>

        <li>
          <div class="dropdown drp-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="feather icon-user text-light"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-notification">
              <div class="pro-head">
                <img src="<?= base_url() ?>assets/images/user.png" class="img-radius" alt="User-Profile-Image">
                <span><?= $user_ses['nama'] ?></span>
                <a href="#" class="dud-logout" title="Logout" data-toggle="modal" data-target="#modal-logout">
                  <i class="feather icon-log-out"></i>
                </a>
              </div>
              <ul class="pro-body">
                <li><a href="<?= base_url(
                                'backend/user'
                              ) ?>" class="dropdown-item"><i class="feather icon-user"></i>
                    Profile</a></li>
        </li>
      </ul>
    </div>
    </div>
    </li>
    </ul>
    </div>


  </header>
  <!-- [ Header ] end -->

  <div id="modal-logout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Tambah Grup User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <p>
            Apakah anda yakin ingin keluar?
          </p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
          <a href="<?= base_url(
                      'login/logout'
                    ) ?>" class="btn  btn-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>