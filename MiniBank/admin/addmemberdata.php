<?php
	include 'includes/session.php';

	if(isset($_POST['adminaddmember'])){
		$memberid = $_POST['memberid'];
		$name = $_POST['name'];
    	$sponcer=$_POST['sponcer'];
    	$phone=$_POST['phone'];
		$password = $_POST['password'];
		$money=0;
		$date = date('Y-m-d');
		$datetime = date('Y-m-d H:i:s');
	    $sql = "INSERT INTO members (member_id, name,mobile, password, sponcer,joining_date,level,sponcer_info)
    	  VALUES ('$memberid', '$name', '$phone','$password','$sponcer','$date',0,'admin')";
		if($conn->query($sql)){

			$sql="INSERT INTO wallet(member_id,money)
			 VALUES('$memberid','$money')";
			$query = $conn->query($sql);

			// Adding provide help request
			$amount = 200;
			$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			$randno = substr(str_shuffle($str_result), 0, 10);

			$sponcer_name = $sponcer;
			$sponcer_id = $sponcer;
			$fir=1;
			$sql = "INSERT INTO provide_request(member_id,name,provide_help_no,sponcer_name,sponcer_id,amount,date,first) 
						VALUES('$memberid','$name','$randno','$sponcer_name','$sponcer_id','$amount','$datetime','$fir')";
			$conn->query($sql);

			$newphone='91'.$phone;
			// Authorisation details.
			$username = "clubminibank@gmail.com";
			$hash = "ed5bdeba90f28aa5d973bf3cb54863dd0b4ae39f3a6dd7e85087803376046499";

			// Config variables. Consult http://api.textlocal.in/docs for more info.
			$test = "0";

			// Data for text message. This is the text message data.
			$sender = "TXTLCL"; // This is who the message appears to be from.
			$numbers = $newphone; // A single number or a comma-seperated list of numbers
			$message = "Dear " . $name . " ,\n" . "Welcome to Minibank.\n" . "Member Id: " . $memberid . "\nPassword: " . $password . " \nThanks:) https://minibank.tech/";
			// 612 chars or less
			// A single number or a comma-seperated list of numbers
			$message = urlencode($message);
			$data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
			$ch = curl_init('http://api.textlocal.in/send/?');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch); // This is the result from the API
			curl_close($ch);

			$timenow = date("H:i:s");
			$nineam = "09:01:00";
			$ninepm = "20:59:00";
			if (($timenow > $ninepm) or ($timenow < $nineam)) {
				$sql = "INSERT INTO sms(name,member_id,phone,password) 
							VALUES('$name','$memberid','$phone','$password')";
				$conn->query($sql);
			}

			$_SESSION['success'] = 'Member Added successfully' . '<br>' . 'Member Id:' . $memberid . '<br>' . 'Password:' . $password;
			}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}

	header('location: addmember.php');
?>
