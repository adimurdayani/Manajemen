<!-- Required Js -->
<script src="<?= base_url() ?>assets/js/vendor-all.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/ripple.js"></script>
<script src="<?= base_url() ?>assets/js/pcoded.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js">
</script>

<!-- custom-chart js -->
<script src="<?= base_url() ?>assets/js/pages/dashboard-main.js"></script>

<script>
  $('.form-check-input').on('click', function() {
    const menuId = $(this).data('menuid');
    const userId = $(this).data('userid');

    $.ajax({
      url: "<?= base_url('backend/setting/ubahakses') ?>",
      type: 'post',
      data: {
        menuId: menuId,
        userId: userId
      },
      success: function() {
        document.location.href = "<?= base_url(
                                    'backend/setting/akses/'
                                  ) ?>" + userId;
      }
    })
  })

  $(document).ready(function() {
    $('#table').DataTable();
  });
  $(document).ready(function() {
    $('#table2').DataTable();
  });
</script>
<script>
  $(document).ready(function() {

    setInterval(function() {
      $.ajax({
        url: "<?= base_url('backend/modul/notifikasi') ?>",
        type: "POST",
        dataType: "json",
        data: {},
        success: function(data) {
          $("#total").html(data.member);
          $("#member").html(data.member);
          $("#nama").html(data.nama);
          $("#tanggal").html(data.tanggal);
          $("#pesan").html(data.msg);
        }
      });
    }, 1000)

  })
</script>
</body>

</html>