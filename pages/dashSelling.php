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
        <div class="panel panel-success pull-left">
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

<!-- Total Penjualan -->

<div class="page-header">
    <h2><small>Penjualan</small></h2>
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
                        <div id="showOmset"></div>
                        <div>Total Omset</div>
                    </div>
                </div>
            </div>
            <a id="buttonShowOmset">
                <div class="panel-footer tooltips" title="Klik untuk perbarui data">
                    <span class="pull-left">Bulan Ini</span>
                    <span class="pull-right"><i class="fa fa-refresh"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- Total Selling -->
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-cart-plus fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-center">
                        <!-- Content Total Selling -->
                        <div id="showTotalSellingTransaction"></div>
                        <div>Total Transaksi Penjualan</div>
                    </div>
                </div>
            </div>
            <a id="buttonShowTotalSelling">
                <div class="panel-footer tooltips" title="Klik untuk perbarui data">
                    <span class="pull-left">Bulan Ini</span>
                    <span class="pull-right"><i class="fa fa-refresh"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- Total Product Selling  -->
    <div class="col-md-3">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-tasks fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-center">
                        <!-- Content Product Selling -->
                        <div id="showTotalProductSelling"></div>
                        <div>Jumlah Produk Terjual</div>
                    </div>
                </div>
            </div>
            <a id="buttonShowTotalProductSelling">
                <div class="panel-footer tooltips" title="Klik untuk perbarui data">
                    <span class="pull-left">Bulan Ini</span>
                    <span class="pull-right"><i class="fa fa-refresh"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- Total Customer -->
    <div class="col-md-3">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <i class="fa fa-user-circle-o fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-center">
                        <!-- Content Total Customer -->
                        <div id="showTotalCustomer"></div>
                        <div>Jumlah Kunjungan</div>
                    </div>
                </div>
            </div>
            <a id="buttonShowTotalCustomer">
                <div class="panel-footer tooltips" title="Klik untuk perbarui data">
                    <span class="pull-left">Bulan Ini</span>
                    <span class="pull-right"><i class="fa fa-refresh"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- END Notify Dashboard Penjualan -->

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title">Jumlah Produk Terjual Perhari</h3>

            </div>
            <div class="panel-body" id="chartTransactionSellingProduct">
                Jumlah Produk Terjual Perhari
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Jumlah Transaksi Penjualan Perhari</h3>

            </div>
            <div class="panel-body" id="chartTransactionSelling">
                Jumlah Produk Terjual Perhari
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Jumlah Pendapatan Perbulan</h3>
            </div>
            <div class="panel-body" id="chartSellingIncome">
                Jumlah Pendapatan Perbulan
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <h3 class="panel-title">Jumlah 10 Produk Terlaris</h3>
            </div>
            <div class="panel-body" id="chartBestSelling">
                Jumlah 10 Produk Terlaris
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
    </div>
</div>

<script src="<?php echo $base_url . "pages/dashboard/js/sellingController.js"; ?>"></script>