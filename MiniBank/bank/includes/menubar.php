<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../images/profile.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['name']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="myprofile.php"><i class="fa fa-user"></i> <span>My Profile</span></a></li>
        <li><a href="changepassword.php"><i class="fa fa-key"></i> <span>Change Password</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>My Team</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="directmembers.php"><i class="fa fa-circle-o"></i> Direct Members</a></li>
            <li><a href="downlinemembers.php"><i class="fa fa-circle-o"></i> Downline Members</a></li>
            <li><a href="mypins.php"><i class="fa fa-circle-o"></i> My Pins/Registration</a></li>
            <li><a href="generatepin.php"><i class="fa fa-circle-o"></i> Generate Pins</a></li>
            <li><a href="providehelp.php"><i class="fa fa-circle-o"></i> Help Again</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-map-pin"></i>
            <span>Pins</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pintransfer.php"><i class="fa fa-circle-o"></i> Pin Transfer</a></li>
            <li><a href="transferpin_report.php"><i class="fa fa-circle-o"></i> Transfered Pin Report</a></li>
            <li><a href="transferpin_count.php"><i class="fa fa-circle-o"></i> Transfered Pin Count</a></li>
            <li><a href="receivedpin_count.php"><i class="fa fa-circle-o"></i> Received Pin Count</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>My Income</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="levelincome.php"><i class="fa fa-circle-o"></i> Level Income</a></li>
            <li><a href="growth.php"><i class="fa fa-circle-o"></i> Daily Growth</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-google-wallet"></i>
            <span>Wallet</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="workingwallet.php"><i class="fa fa-circle-o"></i> Working Wallet</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-info-circle"></i>
            <span>Help History</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="providehelp_history.php"><i class="fa fa-circle-o"></i> Provide Help</a></li>
            <li><a href="gethelp_history.php"><i class="fa fa-circle-o"></i> Get Help</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
