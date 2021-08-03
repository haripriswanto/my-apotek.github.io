<div class="row">
    <div class="col-lg-12">
        <!-- <h1 class="page-header">Transaksi</h1> -->
        <div class="clearfix"><br></div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>TRANSAKSI PEMBELIAN</b>
            </div>
            <div class="panel-body">
                <div class="form-inline">
                    <a href="<?php echo $base_url . "review-pembelian" ?>" title="Review Kegiatan Pembelian, Print Ulang, Batal" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"> <span class="fa fa-list"></span> Review</a>
                    <div class="pull-right">
                        <input type="text" class="form-control datepicker" id="transaction_date" name="transaction_date" placeholder="Tgl Transaksi" data-toggle="tooltip" data-placement="bottom" title="Jika Kosong maka Tgl Hari ini">
                        <select name="transaction_time" id="transaction_time" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Jika Kosong maka Jam Saat ini">
                            <?php include('master_time.php'); ?>
                        </select>
                    </div>
                </div>

                <!-- Insert Product -->
                <div class="modal fade" id="insertProduct">
                    <div class="modal-dialog">
                        <div class="panel panel-primary" id="fetchDataInsertProduct">
                        </div>
                    </div>
                </div>
                <div class="clearfix"><br></div>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="supplier_code" name="supplier_code" placeholder="Kode Supplier">
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" onkeyup="goToSupplier(event)" data-toggle="tooltip" data-placement="bottom" title="Nama Supplier" placeholder="Nama Supplier">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default" id="supplierSearch" name="supplierSearch" data-toggle="modal" data-target="#listSupplier" data-placement="bottom" title="Pencarian Supplier">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text" id="supplier_code_hide" name="supplier_code_hide" placeholder="Kode" style="width: 65%" class="form-control" disabled="">
                            </div>
                        </div>
                        <div class="clearfix"><br></div>
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
                            <br><br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="c_batch_code" name="c_batch_code" placeholder="Kode Batch" style="width: 143px;" data-toggle="tooltip" data-placement="bottom" title="Kode Batch">
                            </div>
                            <script type="text/javascript">
                                function disable(status) {
                                    status = status;
                                }
                            </script>
                            <div class="clearfix"><br></div>

                            <div class="form-group text-right">
                                <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Tambah Produk" class="btn btn-default" id="buttonAddCart"><span class="fa fa-plus-circle"></span id="buttonCaption"> Tambah</button>
                                <button type="reset" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Membatal kan Pencarian" id="buttonCancel"><span class="fa fa-eraser"></span> Bersih</button>
                            </div>
                            <div id="resultCartBuying"></div>
                        </div>
                        <!-- <div class="clearfix"><hr></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>CHECKOUT</b>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="well" style="padding-left: 3em; padding-right: 3em;">
                            <div class="row">
                                <div class="pull-left">
                                    Total Item : <br>
                                    <i class="totalItem" id="totalItem"> 0</i>
                                </div>
                                <div class="pull-right">
                                    Total Tagihan: <br>
                                    Rp. <i class="totalHarga" id="totalHarga">0,-</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <textarea name="cart_note" id="cart_note" class="form-control" rows="3" width="10" data-toggle="tooltip" data-placement="bottom" placeholder="Note!" title="Jika Ada Catatan Khusus."></textarea>
                    </div>
                </div>

                <!-- <div class="clearfix"><br></div> -->

                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <span class="checkbox" data-toggle="tooltip" data-placement="top" title="Jika Update Aktif, Maka Harga Beli Pada Master Produk Akan Diperbarui">
                            <label>
                                <input type="checkbox" name="update_price" id="update_price" value="1" checked="">
                                Update Harga
                            </label>
                        </span>
                    </div>
                    <div class="col-md-8 pull-right">
                        <button type="button" class="btn btn-default" name="cancelBuyingCheckout" id="cancelBuyingCheckout" data-toggle="modal" data-target="#cancelBuyingCheckoutConfirm" data-toggle="tooltip" data-placement="bottom" title="Batal Transaksi">
                            <i class="fa fa-trash"></i> Batal
                        </button>
                        <button type="submit" name="submitBuyingCheckout" id="submitBuyingCheckout" class="btn btn-success">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
                <!-- Hidden Field -->
                <input type="hidden" name="type_of_payment" id="type_of_payment" value="1">
                <input type="hidden" name="moneyPaid_input" id="moneyPaid_input">
                <input type="hidden" name="totalHarga_input" id="totalHarga_input">
                <input type="hidden" name="totalItem_input" id="totalItem_input">

            </div>
        </div>

        <div class="modal fade" id="cancelBuyingCheckoutConfirm">
            <div class="modal-dialog">
                <div id="fetchCancelCheckout">
                </div>
            </div>
        </div>

        <!-- REVIEW SEARCH SUPPLIER -->
        <div class="modal fade bs-example-modal-lg" id="listSupplier">
            <div class="modal-dialog modal-lg" id="fetchedDataSupplier"></div>
        </div>

        <!-- REVIEW SEARCH PRODUCT -->
        <div class="modal fade bs-example-modal-lg" id="listProduct">
            <div class="modal-dialog modal-lg" id="fetchDataProduct"></div>
        </div>

        <!-- EDIT HARGA JUAL -->
        <div class="modal fade" id="editSellingPrice">
            <div class="modal-dialog">
                <div class="modal-content" id="fetchEditSellingPrice"></div>
            </div>
        </div>

        <!-- Delete Product -->
        <div class="modal fade" id="deleteDataCart">
            <div class="modal-dialog">
                <div class="panel panel-red" id="fetchDeleteDataCart"></div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>DAFTAR PRODUK</b>
            </div>
            <div class="panel-body">
                <div id="cartContentBuying"></div>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo $base_url . "pages/transaction/buying/controller/controller.js" ?>" type="text/javascript"></script>



<?php
// log Activity
$insertLogData = log_insert('READ', 'Akses Menu Transaksi Pembelian', $ip_address, $os, $browser);
$queryInsertLogData = mysqli_query($config, $insertLogData);
if (!$queryInsertLogData) {
    echo "<span class='alert alert-danger'>Error Query Insert Log</span>";
}
?>