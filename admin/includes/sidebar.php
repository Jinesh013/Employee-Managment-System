<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="welcome.php">
        <div class="sidebar-brand-text mx-3">Admin dashboard</div>
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
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Employee Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Employee</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="addemployees.php">Add Employee</a>
                <a class="collapse-item" href="employeelist.php">View Employee List</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Leave Type -->
    <li class="nav-item">
        <a class="nav-link" href="LeaveType.php">
            <!-- <i class="far fa-comment-alt"></i> -->
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
            <span>Leave Type</span>
        </a>
    </li>

    <!-- Nav Item - Leave Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepartment"
            aria-expanded="true" aria-controls="collapseTwo">

            <!-- <i class="fas fa-building"></i> -->
            <i class="fa fa-briefcase"></i>
            <span>Manage Leave</span>
        </a>
        <div id="collapseDepartment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="leavePending.php">Pending Leave</a>
                <a class="collapse-item" href="acceptedLeave.php">Accepted Leave</a>
                <a class="collapse-item" href="rejectedLeave.php">Rejected Leave</a>
                <a class="collapse-item" href="leaveHistory.php">Leave History</a>
            </div>
        </div>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        user
    </div>

    <?php
            $adminusername=$_SESSION['username'];
            $ret=mysqli_query($con,"select id from admin where AdminUsername='$adminusername'");
            $row=mysqli_fetch_array($ret);
            $id=$row['id'];
            ?>

    <!-- Admin Profile -->
    <li class="nav-item">
        <a class="nav-link" href="adminprofile.php?adminid=<?php echo $id; ?>">
            <i class="fas fa-user"></i>
            <span>My Profile</span>
        </a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <i class="bi bi-arrow-right-square"></i>
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>