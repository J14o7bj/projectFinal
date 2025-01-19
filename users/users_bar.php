
    <div class="container-expand">
        <nav class="navbar navbar-expand-lg" style="background-color: #978b7880;">
            <div class="container-fluid">
                <div class="text-name-item" onclick="location.href='users_index.php?t_id=<?php echo $_SESSION['table']; ?>'">CAFE</div> <div class="text-name-item" style="font-size: 15px;">table : <?php echo $_SESSION['table']; ?></div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="users_index.php?t_id=<?php echo $_SESSION['table']; ?>">
                                <div class="thai-text-head">หน้าหลัก</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php?t_id=<?php echo $_SESSION['table']; ?>">
                                <div class="thai-text-head">ตะกร้า</div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle thai-text-head" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">เพิ่มเติม
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../admin/login_form_admin.php">
                                        <div class="thai-text-head">ผู้ดูแลระบบ</div>
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>
    </div>

