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


$selectSellingPayment = "SELECT
        sum(total_paid) AS total_buying
        FROM tb_buying_payment 
        WHERE date_insert >= '$yearOption" . "$monthOption" . "01' AND time_insert >= '00:00:00' AND date_insert <= '$yearOption" . "$monthOption" . "$currentDay' AND time_insert <= '23:23:59'
        -- AND outlet_code_relation = '$system_outlet_code'
        AND bl_state ='A' ";
// var_dump($selectSellingPayment);exit;
$querySellingPayment = mysqli_query($config, $selectSellingPayment);


while ($rowSellingPayment  = mysqli_fetch_array($querySellingPayment)) {
    $total_buying    = $rowSellingPayment['total_buying'];
}
?>
<div align="center">
    <font size="4">Rp. <?php echo number_format($total_buying) ?></font>
</div>

<?php
if ($_GET['yearOption'] == '' && $_GET['monthOption'] == '') {
    echo "<script>$('.titleName').html('Bulan Ini');</script>";
} else {
    echo "<script>$('.titleName').html('Bulan " . $monthOption . $yearOption . "');</script>";
}
?>
<script type="text/javascript">
    toastr['success']('Berhasil Update Total Pembelian ', 'Dashboard');
</script>