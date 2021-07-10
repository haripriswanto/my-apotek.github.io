<?php
include('../../../config/config.php');


if ($_GET['yearOption'] != '') {
    $yearOption     = $_GET['yearOption'] . "-";
    $monthOption    = $_GET['monthOption'] . "-";
    $currentDay     = '31';
} else if ($_GET['yearOption'] === '') {
    $yearOption     = date('Y-', strtotime($currentDate));
    $monthOption    = date('m-', strtotime($currentDate));
    $currentDay     = date('d', strtotime($currentDate));
}

$selectBuyingTransaction = "SELECT SUM(product_qty) as total_product FROM tb_buying_transaction_detail 
    WHERE ts_insert >= '$yearOption" . "$monthOption" . "01" . " 00:00:00' AND ts_insert <= '$yearOption" . "$monthOption" . "$currentDay" . " 23:23:59'
    AND bl_state ='A'
    ";
// var_dump($selectBuyingTransaction);exit;
$queryBuyingTransaction = mysqli_query($config, $selectBuyingTransaction);
$rowBuyingTransaction = mysqli_num_rows($queryBuyingTransaction);
$roBuyingTransaction = mysqli_fetch_array($queryBuyingTransaction);
?>

<div align="center">
    <font size="4"><?php echo number_format($roBuyingTransaction['total_product']); ?></font>
</div>
<?php
if ($_GET['yearOption'] == '' && $_GET['monthOption'] == '') {
    echo "<script>$('.titleName').html('Bulan Ini');</script>";
} else {
    echo "<script>$('.titleName').html('Bulan " . $monthOption . $yearOption . "');</script>";
}
?>
<script type="text/javascript">
    toastr['success']('Berhasil update total produk terbeli', 'Dashboard');
</script>