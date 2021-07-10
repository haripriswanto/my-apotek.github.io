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

$queryBuyingTransaction = mysqli_query($config, "SELECT count(*) AS total
        FROM tb_buying_transaction 
        WHERE date_insert >= '$yearOption" . "$monthOption" . "01' AND time_insert >= '00:00:00' AND date_insert <= '$yearOption" . "$monthOption" . "$currentDay' AND time_insert <= '23:23:59'
            AND bl_state <> 'D'
        ");

$rowBuyingTransaction = mysqli_fetch_array($queryBuyingTransaction);
$total = $rowBuyingTransaction['total'];

?>
<div align="center">
    <font size="4"><?php echo number_format($total); ?></font>
</div>

<?php
if ($_GET['yearOption'] == '' && $_GET['monthOption'] == '') {
    echo "<script>$('.titleName').html('Bulan Ini');</script>";
} else {
    echo "<script>$('.titleName').html('Bulan " . $monthOption . $yearOption . "');</script>";
}
?>

<script type="text/javascript">
    toastr['success']('Berhasil update total transaksi pembelian', 'Dashboard');
</script>