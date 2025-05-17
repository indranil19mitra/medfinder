    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">My Website</a> -->
            <!-- Toggle Button -->
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                ☰
            </button>
        </div>
    </nav>

    <!-- Offcanvas Sidebar -->
    <!-- <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li><a href="#" class="nav-link">Home</a></li>
                <li><a href="#" class="nav-link">About</a></li>
                <li><a href="#" class="nav-link">Services</a></li>
                <li><a href="#" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>   -->

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li><a href="#" class="nav-link">Dashboard</a></li>

                <li>
                    <a class="nav-link d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        href="#userSubmenu"
                        role="button"
                        aria-expanded="false"
                        aria-controls="userSubmenu">
                        User
                        <span class="ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <ul class="collapse list-unstyled ps-3" id="userSubmenu">
                        <li><a href="<?= base_url('user/userRole'); ?>" class="nav-link">Role</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        href="#shopSubmenu"
                        role="button"
                        aria-expanded="false"
                        aria-controls="shopSubmenu">
                        Shop
                        <span class="ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <ul class="collapse list-unstyled ps-3" id="shopSubmenu">
                        <li><a href="<?= base_url('shop'); ?>" class="nav-link">Add</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        href="#blockSubmenu"
                        role="button"
                        aria-expanded="false"
                        aria-controls="blockSubmenu">
                        Block
                        <span class="ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <ul class="collapse list-unstyled ps-3" id="blockSubmenu">
                        <li><a href="<?= base_url('block'); ?>" class="nav-link">Add</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        href="#medicineSubmenu"
                        role="button"
                        aria-expanded="false"
                        aria-controls="medicineSubmenu">
                        Medicine
                        <span class="ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <ul class="collapse list-unstyled ps-3" id="medicineSubmenu">
                        <li><a href="<?= base_url('medicineCompany'); ?>" class="nav-link">Medicine Company</a></li>
                    </ul>
                    <ul class="collapse list-unstyled ps-3" id="medicineSubmenu">
                        <li><a href="<?= base_url('medicineType'); ?>" class="nav-link">Medicine Type</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse"
                        href="#settingsSubmenu"
                        role="button"
                        aria-expanded="false"
                        aria-controls="settingsSubmenu">
                        Settings
                        <span class="ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <ul class="collapse list-unstyled ps-3" id="settingsSubmenu">
                        <li><a href="#" class="nav-link">Profile</a></li>
                        <li><a href="#" class="nav-link">Account</a></li>
                        <li><a href="#" class="nav-link">Security</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>