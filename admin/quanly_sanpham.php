<?php
require 'db_connect.php';

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý yêu cầu xóa sản phẩm
if (isset($_GET['delete'])) {
    $productID = $_GET['delete'];
    $deleteQuery = "DELETE FROM Products WHERE ProductID = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param('i', $productID);
    if ($stmt->execute()) {
        echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href='quanly_sanpham.php';</script>";
    } else {
        echo "<script>alert('Xóa sản phẩm thất bại!'); window.location.href='quanly_sanpham.php';</script>";
    }
    $stmt->close();
}

// Lấy danh sách sản phẩm
$query = "SELECT * FROM Products";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản phẩm</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="content">
        <h2>Quản lý Sản phẩm</h2>
        <a href="add_product.php">Thêm sản phẩm mới</a>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ProductID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['ProductID']); ?></td>
                        <td><?php echo htmlspecialchars($row['ProductName']); ?></td>
                        <td><?php echo htmlspecialchars($row['Price']); ?></td>
                        <td><?php echo htmlspecialchars($row['Description']); ?></td>
                        <td>
                            <a href="edit_product.php?ProductID=<?php echo $row['ProductID']; ?>">Sửa</a> | 
                            <a href="quanly_sanpham.php?delete=<?php echo $row['ProductID']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Giải phóng kết quả và đóng kết nối
$result->free();
$conn->close();
?>
