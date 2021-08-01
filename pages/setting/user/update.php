<?php
include('../../../config/config.php');

if (!empty($_SESSION['login'])) {

	$id_user      	= mysqli_escape_string($config, $_POST['edit_id_user']);
	$edit_nama      = mysqli_escape_string($config, $_POST['edit_nama']);
	$edit_address   = mysqli_escape_string($config, $_POST['edit_address']);
	$edit_email     = mysqli_escape_string($config, $_POST['edit_email']);
	$edit_phone     = mysqli_escape_string($config, $_POST['edit_phone']);
	$edit_gender    = mysqli_escape_string($config, $_POST['edit_gender']);
	$edit_birthday  = mysqli_escape_string($config, $_POST['edit_birthday']);
	$edit_username  = mysqli_escape_string($config, $_POST['edit_username']);
	$edit_akses     = mysqli_escape_string($config, $_POST['edit_akses']);

	$query = "SELECT * FROM tb_system_user WHERE user_name = '$edit_username' AND id_user != '$id_user' AND is_active = 'A' ";
	// var_dump($query);
	// exit;
	$uqerySelect    = mysqli_query($config, $query);
	$checkSelectData    = mysqli_num_rows($uqerySelect);

	if ($checkSelectData) {
?>
		<script type="text/javascript">
			toastr.error("Username Tidak Tersedia", "error");
			$('#edit_username').focus();
			ensableButtonEdit();
		</script>
	<?php
	} elseif (!$checkSelectData) {
		$updateUser = "
		UPDATE tb_system_user SET user_name = '$edit_username', user_full_name = '$edit_nama', user_address = '$edit_address', user_email = '$edit_email', user_phone = '$edit_phone', user_gender = '$edit_gender', user_birthday = '$edit_birthday', access_level = '$edit_akses', ts_update = '" . date('Y-m-d H:i:s') . "' WHERE id_user = '$id_user'";

		// var_dump($updateUser);exit;
		$queryUpdateUser = mysqli_query($config, $updateUser);

		if ($queryUpdateUser) {

			// log Activity
			$insertLogData = log_insert('UPDATE', 'Merubah Data User id : ' . $id_user . ', Nama : ' . $edit_username, $ip_address, $os, $browser);
			$queryInsertLogData = mysqli_query($config, $insertLogData);
			if (!$queryInsertLogData) {
				echo mysqli_error($config);
			} else {
				echo "<script>
					closeForm();
					loadDataUser();
					toastr.success('Berhasil perbarui Data User " . $edit_username . " ', 'success');
				</script>";
			}
		} else {
			echo "<div class='alert alert-danger'>
				<strong>Error Query UPDATE USER!</strong>
			</div>";
		}
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