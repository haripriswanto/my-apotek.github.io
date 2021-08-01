<?php
include("../../../config/config.php");

function generateCode($panjang)
{
  $karakter = date('YmdHis');
  $string = '';
  for ($i = 0; $i < $panjang; $i++) {
    $pos = rand(0, strlen($karakter) - 1);
    $string .= $karakter{
      $pos};
  }
  return $string;
}

$generateId        = generateCode(15);
$customer_name     = mysqli_escape_string($config, $_POST['customer_name']);
$customer_gender   = mysqli_escape_string($config, $_POST['customer_gender']);
$customer_birthday = mysqli_escape_string($config, $_POST['customer_birthday']);
$customer_email    = mysqli_escape_string($config, $_POST['customer_email']);
$customer_phone    = mysqli_escape_string($config, $_POST['customer_phone']);
$customer_address  = mysqli_escape_string($config, $_POST['customer_address']);
$autoNum           = mysqli_escape_string($config, $_POST['autoNum']);

// if (isset($_POST['auto_number'])) {
//   $auto_number       = $_POST['auto_number'];
// }elseif (!isset($_POST['auto_number'])) {
//   $auto_number       = 0;
// }

if ($autoNum == 1) {
  $customer_code = "Cst." . date('ymd-') . generateCode(4);
} elseif ($autoNum == 0) {
  $customer_code     = $_POST['customer_code'];
}


echo "<script>enabledFormCustomer();</script>";
// echo $autoNum." <br> ". $customer_code;exit;

$insertCustomer = "INSERT INTO tb_customer(
            id_customer, customer_code, full_name, phone, 
            address, email, gender, birthday, outlet_code_relation, 
            ts_insert, bl_state)
    VALUES ('$generateId', '$customer_code', '$customer_name', '$customer_phone', '$customer_address', '$customer_email', '$customer_gender', '$customer_birthday', '$system_outlet_code', '$currentDate $currentTime', 'A')
    ";
// var_dump($insertCustomer);exit();

$queryInsertCustomer = mysqli_query($config, $insertCustomer);

if ($queryInsertCustomer) {

  // ************** QUERY log_activity
  $insertLogActivity = "INSERT INTO log_activity(
          id_log, log_date, log_menu, log_description, log_status, ip_address, user_name, log_os, log_browser)
              VALUES ( '" . sha1(generate(10)) . "', '$currentDate " . " $currentTime', 'INSERT', 'Menambahkan Data Customer " . $customer_name . " [Transaksi]' , 'A', '$ip_address', '$sessionUser', '$os', '$browser')";

  $queryInsertLogActivity = mysqli_query($config, $insertLogActivity);
  if ($queryInsertLogActivity) {
    echo "<script>toastr.success('Berhasil Insert Data Customer " . $customer_name . "', 'success');clearFormCustomer();closeFormCustomer();$('#listCustomer').modal('show');</script>";
  } else {
    echo "Gagal Insert Log Activity";
  }
} else {
  echo "Gagal Insert Customer";
}
