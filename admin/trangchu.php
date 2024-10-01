<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<body>
    <h2>Trang Chủ Quản Trị</h2>
    <p>Chào mừng đến với trang quản trị!</p>

    <?php
    require 'db_connect.php'; // Kết nối với cơ sở dữ liệu

    // Đếm số lượng người dùng
    $userCountQuery = "SELECT COUNT(*) AS total_users FROM Users";
    $userCountResult = $conn->query($userCountQuery);
    $userCount = $userCountResult->fetch_assoc()['total_users'];

    // Đếm số lượng sản phẩm
    $productCountQuery = "SELECT COUNT(*) AS total_products FROM Products";
    $productCountResult = $conn->query($productCountQuery);
    $productCount = $productCountResult->fetch_assoc()['total_products'];
    ?>

    <p>Tổng số người dùng: <?php echo $userCount; ?></p>
    <p>Tổng số sản phẩm: <?php echo $productCount; ?></p>
</body>
</html>

<?php
$conn->close(); // Đóng kết nối cơ sở dữ liệu
?>
