 <style type="text/css" media="screen">
     .btn-default {
         background-color: transparent;
         color: #333;
     }

     .btn-default:hover {
         background-color: #333;
         color: #fff;
     }
 </style>

    <script src="<?php echo $base_url . "pages/transaction/buying/controller/controller.js" ?>" type="text/javascript"></script>
 <div class="row">
     <div class="col-lg-12">
         <!-- <h1 class="page-header"></h1> -->
         <div class="clearfix"><br></div>
     </div>
 </div>
 <div class="row">
     <div class="col-lg-12">
         <a href="<?php echo $base_url . "review-pembelian" ?>" title="Review Kegiatan Pembelian, Print Ulang, Batal" class="btn btn-primary"> <span class="fa fa-list"></span> Review</a>

         <!-- Form Transaction Buying -->
         <div class="clearfix"><br></div>
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <b>TRANSAKSI PEMBELIAN</b>
             </div>
             <div class="panel-body">
                 <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                     <div class="panel panel-primary">
                         <div class="panel-body">
                             <div class="form-inline">
	                            <div class="input-group" >
	                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" onkeyup="goToSupplier(event)" data-toggle="tooltip" data-placement="bottom" title="Nama Supplier" placeholder="Nama Supplier" autofocus="">
	                                <span class="input-group-btn">
	                                    <button type="button" class="btn btn-default" id="supplierSearch" name="supplierSearch" data-toggle="modal" data-target="#listSupplier" data-placement="bottom" title="Pencarian Supplier">
	                                    <span class="fa fa-search"></span>      
	                                    </button> 
	                                </span>
	                            </div>
	                                <input type="hidden" class="form-control" id="supplier_code" name="supplier_code" placeholder="Kode Supplier">
                                 <div class="form-group">
                                     <input type="date" class="form-control tooltips" id="transaction_date" name="transaction_date" placeholder="Tgl Transaksi" title="Jika Kosong maka Tgl Hari ini">
                                 </div>
                                 <div class="form-group">
                                     <select name="transaction_time" id="transaction_time" class="form-control tooltips" title="Jika Kosong maka Jam Saat ini">
                                         <?php include('master_time.php'); ?>
                                     </select>
                                 </div>
                                 <!-- <div class="clearfix"><br></div> -->
                                 <div class="form-group">
                                     <input type="hidden" class="form-control tooltips" id="customer_code" name="customer_code" placeholder="Kode Pelanggan">
                                 </div>
	                            <!-- <div class="form-group">
	                                <input type="text" id="supplier_code_hide" name="supplier_code_hide" placeholder="Kode" style="width: 65%" class="form-control" disabled="">
	                            </div> -->
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-5">
                     <div class="panel panel-primary">
                         <div class="panel-body">
                             <div class="col-md-12 text-right">
                                 <div class="row">
                                     <font size="2">TOTAL TAGIHAN: </font>
                                     <br>
                                     <i id="sellingTotal"></i>
                                     <br>
                                     <i id="itemTotal"></i>
                                 </div>
                                 <div class="clearfix"><br></div>
                                 <div class="row" id="resultCheckoutSelling">
                                     <button type="button" class="btn btn-default tooltips" name="cancelSellingCheckout" id="cancelSellingCheckout" data-toggle="modal" data-target="#cancelSellingCheckoutConfirm" title="Batal Transaksi">
                                         <span class="fa fa-trash"></span> Batal
                                     </button>
                                     <button type="button" class="btn btn-success tooltips" name="submitSellingCheckout" id="submitSellingCheckout" data-toggle="modal" data-target="#submitSellingCheckoutConfirm" title="Selesaikan Transaksi">
                                         <span class="fa fa-save"></span> Checkout
                                     </button>
                                 </div>
                             </div>
                             <style type="text/css">
                                 #submitSellingCheckout {
                                     height: 50px;
                                     width: 140px;
                                     font-size: 20px
                                 }

                                 #cancelSellingCheckout {
                                     height: 50px;
                                     width: 140px;
                                     font-size: 20px
                                 }
                             </style>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="panel-body">
                 <div class="panel panel-primary">
                     <!-- <div class="panel-heading">
                        <h3 class="panel-title">Produk</h3>
                    </div> -->
                     <div class="panel-body">
                         <div class="form-inline">
                            <div class="input-group form-group">
                                <input type="text" class="form-control" id="c_buying_product_name" name="c_buying_product_name" onkeyup="isi_otomatis(event)" required placeholder="Nama Produk" data-toggle="tooltip" data-placement="bottom" title="Nama Produk">
                                    <span class="input-group-btn">
                                        <button data-toggle="modal" data-target='#listProduct' data-placement="bottom" title="Pencarian Produk" class="btn btn-default" id="buttonSearch">
                                            <span class="fa fa-search"></span>      
                                        </button> 
                                    </span>
                                </div>
                                <input type="hidden" class="form-control" id="c_id_buying" name="c_id_buying">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="c_buying_product_code" name="c_buying_product_code" placeholder="Kode Produk">
                                </div>
                                <div class="form-group">
                                    <input type="text" onkeyup="numberOnly(this);" class="form-control" id="c_buying_product_qty" name="c_buying_product_qty" placeholder="Qty" style="width: 70px;" data-toggle="tooltip" data-placement="bottom" title="Jumlah Produk">
                                </div>
                                <div class="form-group">
                                    <input type="text" onkeyup="numberOnly(this);" class="form-control" id="c_buying_price" name="c_buying_price" placeholder="Harga" style="width: 100px;" data-toggle="tooltip" data-placement="bottom" title="Harga Beli.">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control datepicker" id="c_product_expire" name="c_product_expire" placeholder="Exp. Date" style="width: 100px;" data-toggle="tooltip" data-placement="bottom" title="Exp. Date">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="c_batch_code" name="c_batch_code" placeholder="Kode Batch" style="width: 143px;" data-toggle="tooltip" data-placement="bottom" title="Kode Batch">
                                </div>
                                <script type="text/javascript">
                                    function disable(status){status=status;}
                                </script>

                                <div class="form-group text-right">
                                    <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Tambah Produk" class="btn btn-default" id="buttonAddCart"><span class="fa fa-plus-circle" ></span id="buttonCaption"> Tambah</button>
                                    <button type="reset" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Membatal kan Pencarian" id="buttonCancel"><span class="fa fa-eraser"></span> Bersih</button>
                                </div>
                                <div id="resultCartBuying"></div>
                        </div>
                         <div class="clearfix">
                             <hr>
                         </div>

                         <script>

							enabledFormCart();
                             // $('#categories').select2({
                             //     ajax: {
                             //         url: 'http://127.0.0.1:8000/ajax/categories/search',
                             //         processResults: function(data) {
                             //             return {
                             //                 results: data.map(function(item) {
                             //                     return {
                             //                         id: item.id,
                             //                         text: item.name
                             //                     }
                             //                 })
                             //             }
                             //         }
                             //     }
                             // })
                         </script>

                         <div class="clearfix"></div>
                         <div id="cartContentselling"></div>
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <legend></legend>
                         </div>
                         <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                             <label>Catatan</label>
                             <textarea name="cart_note" id="cart_note" class="form-control tooltips" rows="3" cols="80" placeholder="Note!" title="Jika Ada Catatan Khusus."></textarea>
                         </div>
                         <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                             <label>Nama Kasir</label>
                             <input type="text" name="cashier" id="cashier" class="form-control tooltips" value="<?php echo $sessionUser ?>">
                         </div>
                         </tbody>
                         </table>

                     </div>
                 </div>
             </div>

             <!-- Cancel Checkout -->
             <div class="modal fade" id="cancelSellingCheckoutConfirm" data-backdrop="static" data-keyboard="false">
                 <div class="modal-dialog" id="loadCancelCheckoutConfirm"></div>
             </div>

             <!-- CheckOut -->
             <div class="modal fade" id="submitSellingCheckoutConfirm" data-backdrop="static" data-keyboard="false">
                 <div class="modal-dialog" id="loadCheckoutConfirm"></div>
             </div>

	        <!-- VIEW SEARCH SUPPLIER -->
	        <div class="modal fade bs-example-modal-lg" id="listSupplier">
	          <div class="modal-dialog modal-lg" id="fetchedDataSupplier"></div>
	        </div>

	        <!-- VIEW SEARCH PRODUCT -->
	        <div class="modal fade bs-example-modal-lg" id="listProduct">
	          <div class="modal-dialog modal-lg" id="fetchDataProduct"></div>
	        </div>

             <!-- REVIEW SEARCH PRODUCT -->
             <div class="modal fade bs-example-modal-lg" id="listProduct">
                 <div class="modal-dialog modal-lg" id="fetchDataProduct"></div>
             </div>

             <!-- Delete Product -->
             <div class="modal fade" id="deleteDataCart">
                 <div class="modal-dialog">
                     <div class="panel panel-red" id="fetchDeleteDataCart"></div>
                 </div>
             </div>




<?php 
  // log Activity
  $insertLogData = log_insert('READ', 'Akses Menu Transaksi Pembelian', $ip_address, $os, $browser);
  $queryInsertLogData = mysqli_query($config, $insertLogData);
  if (!$queryInsertLogData) {
    echo "<span class='alert alert-danger'>Error Query Insert Log</span>";
  }
?>
