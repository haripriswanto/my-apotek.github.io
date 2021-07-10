<style type="text/css">
    a {
        cursor: pointer;
    }
</style>

<script type="text/javascript">
    toastr['success']('<?php echo $ucapan . " <b>" . $sessionFullName . "</b>, " . $system_dashboard_text ?>', "Dashboard");
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard </h1>
        <span id="showExecuteDeleteCartSelling"></span>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-body form-inline">
                <div class="form-group">
                    <select name="monthOption" id="monthOption" class="form-control">
                        <option value="">Pilih Bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="07">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="yearOption" id="yearOption" class="form-control">
                        <option value="">Pilih Tahun</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="btnFilter"> <i class="fa fa-filter"></i> </button>
            </div>
        </div>
    </div>
</div>

<!-- Notify Dashboard Pembelian -->

<div class="page-header">
    <h2><small>Pembelian</small></h2>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-money fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-center">
                        <!-- Content Omset -->
                        <div id="buyingTotal"></div>
                        <div>Total Pembelian</div>
                    </div>
                </div>
            </div>
            <a id="buttonBuyingTotal">
                <div class="panel-footer tooltips" title="Klik untuk perbarui data">
                    <span class="pull-left titleName">Bulan Ini</span>
                    <span class="pull-right"><i class="fa fa-refresh"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- Total Buying -->
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-cart-plus fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-center">
                        <!-- Content Total buying -->
                        <div id="showTotalBuyingTransaction"></div>
                        <div>Total Transaksi Pembelian</div>
                    </div>
                </div>
            </div>
            <a id="buttonShowTotalBuyingTransaction">
                <div class="panel-footer tooltips" title="Klik untuk perbarui data">
                    <span class="pull-left titleName">Bulan Ini</span>
                    <span class="pull-right"><i class="fa fa-refresh"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- Total Product Buying  -->
    <div class="col-md-3">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-tasks fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-center">
                        <!-- Content Product Buying -->
                        <div id="showTotalProductBuying"></div>
                        <div>Jumlah Pembelian produk</div>
                    </div>
                </div>
            </div>
            <a id="buttonShowTotalProductBuying">
                <div class="panel-footer tooltips" title="Klik untuk perbarui data">
                    <span class="pull-left titleName"></span>
                    <span class="pull-right"><i class="fa fa-refresh"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- Total Supplier -->
    <div class="col-md-3">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-user-circle-o fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-center">
                        <!-- Content Total Supplier -->
                        <div id="showTotalSupplier"></div>
                        <div>Jumlah Supplier</div>
                    </div>
                </div>
            </div>
            <a id="buttonShowTotalSupplier">
                <div class="panel-footer tooltips" title="Klik untuk perbarui data">
                    <span class="pull-left titleName">Bulan Ini</span>
                    <span class="pull-right"><i class="fa fa-refresh"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- END Notify Dashboard Pembelian -->

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Tren Produk Terjual Perhari</h3>

            </div>
            <div class="panel-body" id="buyingProduct_lineChart">
                <!-- Show Chart -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Tren Transaksi Pembelian Perhari</h3>

            </div>
            <div class="panel-body" id="buyingTransactionTotal_linechart">
                <!-- Show Chart -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Tren Pengeluaran Perbulan</h3>
            </div>
            <div class="panel-body" id="buyingTotal_barChart">
                <!-- Show Chart -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <h3 class="panel-title">Tren Pembelian 10 Produk Terbanyak</h3>
            </div>
            <div class="panel-body" id="buyingBestProduct_barChart">
                <!-- Jumlah 10 Produk Terlaris -->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
    </div>
</div>

<script src="<?php echo $base_url . "pages/dashboard/js/buyingController.js"; ?>"></script>