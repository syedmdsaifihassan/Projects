<?php
	include 'includes/session.php';

		$helpno = $_GET['id'];
		$date = date('Y-m-d H:i:s');
		$sql = "DELETE FROM provide_request WHERE provide_help_no = '$helpno'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Request rejected successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	header('location: providerequests.php');
?>
