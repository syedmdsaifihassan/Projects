<?php
include 'includes/session.php';

if (isset($_POST['save'])) {

    $sendmember = $_POST['sendmember'];
    $str = explode("_", $sendmember);
    $sendmember = $str[0];
    $proid = $str[1];
    $proid = intval($proid);
    
    $id = $_GET['id'];
    $provideno = $_GET['pno'];

    $amount = 0;
    $sendname = "";
    $sendphoneno = "";
    $getname = "";
    $getphoneno = "";
    $get_count=0;
    $provide_count = 0;
    $sendamount=200;

    $sql = "SELECT * FROM provide_help WHERE id = '$proid'";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $provide_count = $row['provide_count'];
    }

    $sql = "SELECT * FROM provide_help WHERE provide_help_no='$provideno'";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $amount = $row['amount'];
        $get_count=$row['get_count'];
    }

    $sql = "SELECT * FROM members WHERE member_id='$id'";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $sendname = $row['name'];
        $sendphoneno = $row['mobile'];
    }
    $sql = "SELECT * FROM members WHERE member_id='$sendmember'";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $getname = $row['name'];
        $getphoneno = $row['mobile'];
    }

    if($get_count==1){
        $get_count = $get_count - 1;
        $sql = "UPDATE provide_help SET complete = 'true',status='approved',get_count='$get_count' WHERE provide_help_no = '$provideno'";
        if ($conn->query($sql)) {
            $sql = "INSERT INTO saved (get_id,get_name,get_phone,send_id,send_name,send_phone,provide_id,get_help_no,amount) 
                VALUES('$id','$sendname','$sendphoneno','$sendmember','$getname','$getphoneno','$proid','$provideno','$sendamount')";
            $conn->query($sql);

            if ($provide_count == 1) {
                $provide_count = $provide_count - 1;
                $sql = "UPDATE provide_help SET status='Sent' , provide_count = '$provide_count' WHERE id = '$proid'";
                $conn->query($sql);
            } else {
                $provide_count = $provide_count - 1;
                $sql = "UPDATE provide_help SET provide_count = '$provide_count' WHERE id = '$proid'";
                $conn->query($sql);
            }

            $_SESSION['success'] = 'Save successfully';
        } else {
            $_SESSION['error'] = "Error";
        }
    }else{
        $get_count = $get_count - 1;
        $sql = "UPDATE provide_help SET get_count = '$get_count' WHERE provide_help_no = '$provideno'";
        if ($conn->query($sql)) {
            $sql = "INSERT INTO saved (get_id,get_name,get_phone,send_id,send_name,send_phone,provide_id,get_help_no,amount) 
                VALUES('$id','$sendname','$sendphoneno','$sendmember','$getname','$getphoneno','$proid','$provideno','$sendamount')";
            $conn->query($sql);

            if ($provide_count == 1) {
                $provide_count = $provide_count - 1;
                $sql = "UPDATE provide_help SET status='Sent' , provide_count = '$provide_count' WHERE id = '$proid'";
                $conn->query($sql);
            } else {
                $provide_count = $provide_count - 1;
                $sql = "UPDATE provide_help SET provide_count = '$provide_count' WHERE id = '$proid'";
                $conn->query($sql);
            }

            $_SESSION['success'] = 'Save successfully';
        } else {
            $_SESSION['error'] = "Error";
        }
    }

} else {
    $_SESSION['error'] = "Error";
}

header('location: oneclicksend.php');
