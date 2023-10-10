  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="welcome.php">
          <div class="sidebar-brand-text mx-3">Employee Dashboard </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
          <a class="nav-link" href="welcome.php">
              <i class="fas fa-fw fa-home"></i>
              <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Interface
      </div>

      <!-- Nav Item - leave Request -->
      <li class="nav-item">
          <a class="nav-link" href="empLeaveRequest.php">
          <i class="far fa-comment-alt fa-2x text-gray-300"></i>
              <span>Leave Request</span></a>
      </li>

      <!-- Nav Item - Leave Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave"
              aria-expanded="true" aria-controls="collapseTwo">

              <i class="far fa-comment-alt fa-2x text-gray-300"></i>
              <span>Leave</span>
          </a>
          <div id="collapseLeave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="empLeavePending.php">Pending Leave</a>
                  <a class="collapse-item" href="empLeaveAccepted.php">Accepted Leave</a>
                  <a class="collapse-item" href="empLeaveReject.php">Rejected Leave</a>
                  <a class="collapse-item" href="empLeaveHistory.php">Leave History</a>
              </div>
          </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
          User
      </div>

      <?php
        $empusername=$_SESSION['username'];
        $ret=mysqli_query($con,"select id from employeemaster where EmpUsername='$empusername'");
        $row=mysqli_fetch_array($ret);
        $id=$row['id'];
      ?>

      <!-- Nav Item - Employee Profile -->
      <li class="nav-item">
          <a class="nav-link" href="profile.php?empid=<?php echo $id; ?>">
              <i class="fas fa-user"></i>
              <span>My Profile</span>
          </a>
      </li>


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>