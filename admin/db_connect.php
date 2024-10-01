<?php
$hostname = 'localhost';
$username = 'root';
$password = ''; // Thay thế bằng mật khẩu an toàn của bạn
$dbname = 'perfume_shop';
$port = 3306;

$conn = mysqli_connect($hostname, $username, $password, $dbname, $port);

if (!$conn) {
    // Xử lý lỗi kết nối
    error_log('Không thể kết nối đến cơ sở dữ liệu: ' . mysqli_connect_error());
    exit('Có lỗi xảy ra, vui lòng thử lại sau.');
}

// Nếu kết nối thành công
//echo 'Kết nối đến cơ sở dữ liệu thành công!';

// Thiết lập bảng mã utf8
mysqli_set_charset($conn, 'utf8');

// Đóng kết nối khi không còn cần thiết
// mysqli_close($conn);
?>
