<?php
include('../../../config/config.php');

if (!empty($_SESSION['login'])) {

	$productCodeDelete = $_POST['productCodeDelete'];
	// var_dump($productCodeDelete);
	// exit;

	$deleteExecution = mysqli_query($config, "DELETE FROM tb_buying_cart WHERE product_code_relation = '$productCodeDelete' AND user_name = '$sessionUser' AND outlet_code_relation = '$system_outlet_code' ");

	if ($deleteExecution) {
		echo "<script>
			closeForm();
			toastr['success']('Berhasil Hapus Item " . $productCodeDelete . "', 'success');
			LoadCartTransaction();</script>";
	} else {
		echo "Ada Error Pada Query Delete!
		<script>
			document.getElementById('buttonHapus').disabled = false;
			document.getElementById('buttonCancel').disabled = false;
			document.getElementById('buttonClose').disabled = false;
		</script>";
	}
} elseif (empty($_SESSION['login'])) {
?>
	<script type="text/javascript">
		alert("sesi anda habis, silahkan login kembali");
		window.location = "<?php echo $base_url . "" ?>";
	</script>
<?php
}
?>