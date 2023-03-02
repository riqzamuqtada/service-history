    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="sidebar-brand-text mx-3">My Service</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if($this->uri->segment(1) == 'dashboard'){ echo "active"; } ?>">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Collapse Menu -->
            <li class="nav-item  <?php if($this->uri->segment(1) == 'unit'){ echo "active"; } ?>">
                <a class="nav-link" href="<?= base_url('unit') ?>">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Unit</span>
                </a>
            </li>

            <!-- Nav Item - Collapse Menu -->
            <li class="nav-item  <?php if($this->uri->segment(1) == 'service'){ echo "active"; } ?>">
                <a class="nav-link collapsed" href="<?= base_url('service') ?>">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Service</span>
                </a>
            </li>

            <!-- Nav Item - Collapse Menu -->
            <li class="nav-item  <?php if($this->uri->segment(1) == 'penempatan'){ echo "active"; } ?>">
                <a class="nav-link collapsed" href="<?= base_url('penempatan') ?>">
                    <i class="fas fa-fw fa-wrench"><sup class="ml-1">2</sup></i>
                    <span>Penempatan</span>
                </a>
            </li>

            <!-- Nav Item - Collapse Menu -->
            <li class="nav-item <?php if($this->uri->segment(1) == 'users'){ echo "active"; } ?>">
                <a class="nav-link collapsed" href="<?= base_url('users') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

            <!-- Nav Item - Collapse Menu -->
            <li class="nav-item <?php if($this->uri->segment(1) == 'notes'){ echo "active"; } ?>">
                <a class="nav-link collapsed" href="<?= base_url('notes') ?>">
                    <i class="far fa-fw fa-clipboard"></i>
                    <span>Notes</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <!-- Nav Item - Profile -->
            <li class="nav-item  <?php if($this->uri->segment(1) == 'log'){ echo "active"; } ?>">
                <a class="nav-link" href="<?= base_url('log') ?>">
                    <i class="fas fa-fw fa-history"></i>
                    <span>Log Activity</span></a>
            </li>

            <!-- Nav Item - Profile -->
            <li class="nav-item  <?php if($this->uri->segment(1) == 'profile'){ echo "active"; } ?>">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link btn-logout" href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->