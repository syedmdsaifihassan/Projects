<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
    .myprofile {
        padding: 2%;
        background-color: white;
        border-radius: 10px;
        padding: 3%;
    }

    input:active {
        border: 1px solid black;
    }

    input {
        border: 1px solid black;
    }

    .getdonationbt {
        text-align: right;
    }

    .apd :hover,
    .apd :active {
        background-color: green;
        color: white;
    }

    .rej :hover,
    .rej :active {
        background-color: red;
        color: white;
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Approve Donation Reciept
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"> Approve Donation Reciept</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
                    unset($_SESSION['success']);
                }
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="myprofile">
                            <form method="POST" action="getdonation_data.php?id=<?php echo $_GET['id']; ?>">
                                <?php $id = $_GET['id'];
                                $sql = "SELECT * FROM get_donation WHERE id='$id'";
                                $query = $conn->query($sql);
                                $row = $query->fetch_assoc();
                                ?>
                                <div class="form-group row">
                                    <label for="memberid" class="col-md-4 col-form-label text-md-right">Member Id</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="memberid" value="<?php echo $row['get_id']; ?>" name="memberid" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" name="name" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone no</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="phone" value="<?php echo $row['phoneno']; ?>" name="phone" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" id="amount" value="<?php echo $row['amount']; ?>" name="amount" readonly>
                                    </div>
                                </div>
                                <?php $id = $_GET['id'];
                                $sql = "SELECT * FROM donation_reciept WHERE send_donation_id='$id'";
                                $query = $conn->query($sql);
                                $row = $query->fetch_assoc();
                                ?>

                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                    <div class="col-md-6">
                                        <select name="status" id="status" class="form-control">
                                            <option value="approved" style="background-color: green; color :white;">Approved</option>
                                            <option value="rejected" style="background-color: red; color :white;">Reject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='getdonationbt'>
                                    <button type="submit" class="btn btn-success btn-flat" name="getdonation"><i class="fa fa-check-square-o"></i> Approve Reciept</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>