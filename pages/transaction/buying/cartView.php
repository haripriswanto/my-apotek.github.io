<?php
include('../../../config/config.php');

if (!empty($_SESSION['login'])) {
?>

  <!-- <div class="table-responsive"> -->
  <table class="table table-active table-hover" id="dataCart">
    <thead>
      <tr>
        <th width="3%">#</th>
        <th width="15%">Kode</th>
        <th>Nama Produk</th>
        <th width="10%">Batch</th>
        <th width="10%">Exp</th>
        <th width="10%">Qty</th>
        <th width="10%">Harga</th>
        <th width="10%">Subtotal</th>
        <th width="2%"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $selectDataCart = "SELECT tb_buying_cart.*, tb_buying_cart.batch_code as batch_cde, tb_master_stock.* FROM tb_buying_cart
                    INNER JOIN tb_master_stock 
                    ON tb_buying_cart.product_code_relation = tb_master_stock.product_code_relation
                    WHERE tb_buying_cart.user_name = '$sessionUser' 
                    AND tb_buying_cart.outlet_code_relation = '$system_outlet_code' 
                    AND tb_buying_cart.bl_state = 'A' 
                    ORDER BY tb_buying_cart.ts_insert ASC";
      // var_dump($selectDataCart);exit();
      $querySelectDataCart =  mysqli_query($config, $selectDataCart);
      $cekqty = mysqli_num_rows($querySelectDataCart);
      $number = 0;
      $total_item_ = 0;
      $total_harga_result = 0;
      if ($cekqty < 1) {
      ?>
        <tr>
          <td colspan="9">
            <div class="alert alert-danger text-center">
              <strong>Belum Ada Transaksi.</strong>
            </div>
          </td>
        </tr>
        <script type="text/javascript">
          enabledFormCart();
          disableFormCheckout();
        </script>
        <?php
      } else {
        echo "<script>enableFormCheckout();</script>";
        while ($rowSelectDataCart = mysqli_fetch_array($querySelectDataCart)) {
          $number                 = $number + 1;
          $product_code           = $rowSelectDataCart['product_code_relation'];
          $product_name           = $rowSelectDataCart['product_name'];
          $product_description    = $rowSelectDataCart['product_description'];
          $quantity               = $rowSelectDataCart['buying_qty'];
          $buying_price           = $rowSelectDataCart['buying_price'];
          $unit_description       = $rowSelectDataCart['unit_description'];
          $product_stock          = $rowSelectDataCart['product_stock'];
          $expire_date            = $rowSelectDataCart['exp_date'];
          $batch_code             = $rowSelectDataCart['batch_cde'];
          // Subtotal
          $subtotal               = ($buying_price * $quantity);
        ?>

          <tr id="selectProductCart" style="cursor: pointer;" product_code="<?php echo $product_code ?>" product_name="<?php echo $product_name; ?>" quantity="<?php echo $quantity; ?>" buying_price="<?php echo $buying_price; ?>" expire_date="<?php echo $expire_date; ?>" batch_code="<?php echo $batch_code; ?>" title="Double Klik Untuk Data Produk : <?php echo $product_name ?>" data-toggle="tooltip" data-placement="bottom">
            <td><?php echo $number ?></td>
            <td><?php echo $product_code ?></td>
            <td><?php echo $product_name; ?></td>
            <td><?php echo $batch_code ?></td>
            <td><?php echo $expire_date ?></td>
            <td><?php echo $quantity ?></td>
            <td class="center"><?php echo number_format($buying_price); ?></td>
            <td class="center"><?php echo number_format($subtotal) ?></td>
            <?php
            $total_item_ = $total_item_ + $quantity;
            $total_harga_result = $total_harga_result + $subtotal;
            ?>
            <td class="center">
              <a data-toggle="modal" data-target='#deleteDataCart' data-id="<?php echo $product_code ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus Item <?php echo $product_name ?>" class="buttonDeleteItem"><i class="fa fa-times"></i></a>
            </td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
    <input type="hidden" name="total_harga_" id="total_harga_" value="<?php echo $total_harga_result ?>">
    <input type="hidden" name="total_item_" id="total_item_" value="<?php echo $total_item_ ?>">
    <tr class="bg bg-info">
      <td colspan="9"><i style="font-size: 11px; color: #DB5E02">*Double Klik Di Salah Satu Item Untuk Edit</i></td>
    </tr>
    </tr>
  </table>

  <script type="text/javascript">
    enabledFormCart();
    resultTotalBuying();
    $('#buttonAddCart').html('<span class="fa fa-plus-circle" ></span> Tambah');

    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    });

    // $('#submitSellingCheckout').click(function(e){
    //   actionCheckoutSelling();
    // });

    $(document).on('dblclick', '#selectProductCart', function(e) {
      document.getElementById("c_buying_product_code").value = $(this).attr('product_code');
      document.getElementById("c_buying_product_name").value = $(this).attr('product_name');
      document.getElementById("c_buying_product_qty").value = $(this).attr('quantity');
      document.getElementById("c_buying_price").value = $(this).attr('buying_price');
      document.getElementById("c_product_expire").value = $(this).attr('expire_date');
      document.getElementById("c_batch_code").value = $(this).attr('batch_code');
      document.getElementById('c_buying_product_qty').focus();
      enabledFormCart();
      $('#buttonAddCart').html('<span class="fa fa-pencil"></span> Update');
      $('#buttonCancel').html('<span class="fa fa-undo"></span> Batal');
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