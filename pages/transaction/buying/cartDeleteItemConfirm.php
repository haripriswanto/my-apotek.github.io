<?php
include('../../../config/config.php');

if (!empty($_SESSION['login'])) {

  $productCodeDelete = $_POST['productCodeDelete'];
  // var_dump($productCodeDelete);
  // exit;
  $querySelectProductDelete = mysqli_query($config, "SELECT * FROM tb_master_product WHERE product_code = '$productCodeDelete' ");
  $rowProductDelete = mysqli_fetch_array($querySelectProductDelete);
?>
  <div class="panel-heading">
    <h3 class="panel-title">
      Konfirmasi
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="buttonClose">&times;</button>
    </h3>
  </div>
  <div class="panel-body">
    <h4>Yakin Ingin Hapus Produk <b><?php echo $rowProductDelete['product_name']; ?></b> ?</h4>
    <legend></legend>
    <div class="text-right">
      <input type="hidden" name="productCodeDelete" id="productCodeDelete" value="<?= $productCodeDelete; ?>">
      <button type="button" class="btn btn-danger" id="buttonHapus">Hapus</button>
      <button type="button" class="btn btn-default" data-dismiss="modal" id="buttonCancel">Batal</button>
    </div>
  </div>

  <script type="text/javascript">
    function deleteItemCart() {
      var productCodeDelete = $('#productCodeDelete').val();
      $("#buttonHapus").html("<img src='<?php echo $base_url . "assets/images/load.gif" ?>' width='15' height='15'/><font size='2'>Proses ...</font>");
      document.getElementById('buttonHapus').disabled = true;
      document.getElementById('buttonCancel').disabled = true;
      document.getElementById('buttonClose').disabled = true;
      // Result
      $.ajax({
        type: "post",
        url: "<?php echo $base_url . "pages/transaction/buying/cartDeleteItem.php" ?>",
        data: {
          productCodeDelete: productCodeDelete
        },
        success: function(data) {
          $("#buttonHapus").html(data);
        }
      });
    }

    $('#buttonHapus').click(function(event) {
      deleteItemCart();
    });
  </script>


<?php
} elseif (empty($_SESSION['login'])) {
?>
  <script type="text/javascript">
    alert("sesi anda habis, silahkan login kembali");
    window.location = "<?php echo $base_url . "" ?>";
  </script>
<?php
}
?>