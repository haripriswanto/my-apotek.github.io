var loadImage = "<center><img src='assets/images/load.gif' width='20' height='20'/><font size='1'>sedang menghitung ...</font></center>";

function buyingTotal() {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    $("#buyingTotal").html(loadImage);
    $("#buyingTotal").load('pages/dashboard/buying/buyingTotalPayment.php?monthOption=' + monthOption + '&yearOption=' + yearOption);
}
// Selling Total
function showTotalBuying() {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    $("#showTotalBuyingTransaction").html(loadImage);
    $("#showTotalBuyingTransaction").load('pages/dashboard/buying/buyingTotalTransaction.php?monthOption=' + monthOption + '&yearOption=' + yearOption);
}
// Total Product Selling
function showTotalProductBuying() {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    $("#showTotalProductBuying").html(loadImage);
    $("#showTotalProductBuying").load('pages/dashboard/buying/buyingTotalProduct.php?monthOption=' + monthOption + '&yearOption=' + yearOption);
}
// Total Customer
function showTotalSupplier() {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    $("#showTotalSupplier").html(loadImage);
    $("#showTotalSupplier").load('pages/dashboard/buying/buyingTotalSupplier.php?monthOption=' + monthOption + '&yearOption=' + yearOption);
}
// Chart Selling Product
function showChartBuyingPerProduct() {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    $("#buyingProduct_lineChart").html(loadImage);
    $("#buyingProduct_lineChart").load('pages/dashboard/chart/buyingProduct_lineChart.php?monthOption=' + monthOption + '&yearOption=' + yearOption);
}
// Chart Selling Transaction
function showChartBuyingTransactionTotal() {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    $("#buyingTransactionTotal_linechart").html(loadImage);
    $("#buyingTransactionTotal_linechart").load('pages/dashboard/chart/buyingTransactionTotal_linechart.php?monthOption=' + monthOption + '&yearOption=' + yearOption);
}
// Chart Income Selling
function showChartBuyingTotal() {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    $("#buyingTotal_barChart").html(loadImage);
    $("#buyingTotal_barChart").load('pages/dashboard/chart/buyingTotal_barChart.php?monthOption=' + monthOption + '&yearOption=' + yearOption);
}
// Chart Best Selling
function showChartBuyingBestProduct() {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    $("#buyingBestProduct_barChart").html(loadImage);
    $("#buyingBestProduct_barChart").load('pages/dashboard/chart/buyingBestProduct_barChart.php?monthOption=' + monthOption + '&yearOption=' + yearOption);
}
$('#btnFilter').on('click', function (e) {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    if (monthOption != '' && yearOption == '') {
        toastr['error']('Pilih Tahun Terlebih Dahulu!', 'Notify!');
        $('#yearOption').focus();
    } else if (monthOption == '' && yearOption != '') {
        toastr['error']('Pilih Bulan Terlebih Dahulu!', 'Notify');
        $('#monthOption').focus();
    } else {
        showChartBuyingTotal();
        showChartBuyingTransactionTotal();
        showChartBuyingBestProduct();
        buyingTotal();
        showTotalProductBuying();
        showTotalSupplier();
        showTotalBuying();
        showChartBuyingPerProduct()
    }
});
$('#monthOption').on('change', function (e) {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    if (yearOption == '') {
        $('#yearOption').focus();
    } else if (monthOption == '') {
        toastr['error']('Pilih bulan Terlebih Dahulu!', 'Notify!');
        $('#monthOption').focus();
    } else {
        showChartBuyingTotal();
        showChartBuyingTransactionTotal();
        showChartBuyingBestProduct();
        buyingTotal();
        showTotalProductBuying();
        showTotalSupplier();
        showTotalBuying();
        showChartBuyingPerProduct()
    }
});
$('#yearOption').on('change', function (e) {
    var monthOption = $('#monthOption').val();
    var yearOption = $('#yearOption').val();
    if (monthOption == '') {
        toastr['error']('Pilih bulan Terlebih Dahulu!', 'Notify!');
        $('#monthOption').focus();
    } else {
        showChartBuyingTotal();
        showChartBuyingTransactionTotal();
        showChartBuyingBestProduct();
        buyingTotal();
        showTotalProductBuying();
        showTotalSupplier();
        showTotalBuying();
        showChartBuyingPerProduct()
    }
});
$('#buttonBuyingTotal').on('click', function (e) {buyingTotal();});
$('#buttonShowTotalBuyingTransaction').on('click', function (e) {showTotalBuying();});
$('#buttonShowTotalProductBuying').on('click', function (e) {showTotalProductBuying();});
$('#buttonShowTotalSupplier').on('click', function (e) {showTotalSupplier();});
$('#buttonShowProductExpired').on('click', function (e) {showProductExpired();});
$('#buttonShowProductStock').on('click', function (e) {showProductStock();});
$('#buttonTxtStock').on('click', function (e) {showProductStock();});
$('#buttonTxtExpired').on('click', function (e) {showProductExpired();});

$('#txtStock').on('keyup', function (e) {if (e.which === 13) {showProductStock();}});
$('#txtExpired').on('keyup', function (e) {if (e.which === 13) {showProductExpired();}});

$(document).ready(function () {
    buyingTotal();
    showTotalBuying();
    showTotalSupplier();
    showTotalProductBuying();
    showChartBuyingTotal();
    showChartBuyingTransactionTotal();
    showChartBuyingBestProduct();
    showChartBuyingPerProduct();
});

// refresh setiap 180000 milidetik = 3 Menit
setInterval(function () {
    buyingTotal();
    showTotalBuying();
    showTotalSupplier();
    showTotalProductBuying();
    showChartBuyingTotal();
    showChartBuyingTransactionTotal();
    showChartBuyingBestProduct();
    showChartBuyingPerProduct();
}, 180000)