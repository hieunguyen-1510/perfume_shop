<?php
require 'db_connect.php';
$is_admin = true; // Giả sử người dùng là admin
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="boxcenter">
        <div class="row mb header">
            <h1>Trang quản trị Admin</h1>
        </div>
        
        <!-- Menu -->
        <div class="row mb menu">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showContent('trangchu')">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showContent('quanly_taikhoan')">Quản lý tài khoản</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showContent('quanly_sanpham')">Quản lý sản phẩm</a>
                </li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="content" id="content">
            <h2>Trang quản trị Admin</h2>
            <p>Chào mừng bạn đến với trang quản lý!</p>

            <div class="card">
                <h3>Quản lý sản phẩm</h3>
                <p>Xem và quản lý các sản phẩm của cửa hàng.</p>
            </div>

            <div class="card">
                <h3>Quản lý tài khoản</h3>
                <p>Quản lý thông tin tài khoản của khách hàng và nhân viên.</p>
            </div>

            <div class="card">
                <h3>Thống kê</h3>
                <p>Xem báo cáo về doanh số và sản phẩm bán chạy.</p>
            </div>
        </div>

        <footer>
            <p>© 2024 Quản trị viên cửa hàng nước hoa. All rights reserved.</p>
        </footer>
    </div>

    <script>
        function showContent(category) {
            var content = document.getElementById('content');
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    content.innerHTML = this.responseText;
                }
            };
            xhr.open("GET", category + ".php", true);
            xhr.send();
        }
    </script>
</body>
</html>
