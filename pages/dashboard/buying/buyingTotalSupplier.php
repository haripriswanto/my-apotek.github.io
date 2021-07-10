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

$selectSupplier = "SELECT count(supplier_code_relation) as total_supplier 
    FROM tb_buying_transaction 
    WHERE supplier_code_relation != '' 
    AND date_insert >= '$yearOption" . "$monthOption" . "01' AND time_insert >= '00:00:00' AND date_insert <= '$yearOption" . "$monthOption" . "$currentDay' AND time_insert <= '23:23:59' 
    AND outlet_code_relation = '$system_outlet_code'
    AND bl_state <> 'D' ";
// var_dump($selectSupplier);
$querySelectSupplier = mysqli_query($config, $selectSupplier);
$rowSelectSupplier = mysqli_fetch_array($querySelectSupplier);
$totalCustomer = mysqli_num_rows($querySelectSupplier);

?>
<div align="center">
    <font size="4"><?php echo number_format($rowSelectSupplier['total_supplier']) . " Orang"; ?></font>
</div>

<?php
if ($_GET['yearOption'] == '' && $_GET['monthOption'] == '') {
    echo "<script>$('.titleName').html('Bulan Ini');</script>";
} else {
    echo "<script>$('.titleName').html('Bulan " . $monthOption . $yearOption . "');</script>";
}
?>

<script type="text/javascript">
    toastr['success']('Berhasil Update Total Supplier', 'Dashboard');
</script>