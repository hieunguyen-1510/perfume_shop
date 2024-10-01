<?php
include 'db_connect.php'; // Kết nối cơ sở dữ liệu

// Lấy danh sách sản phẩm
$sql = "SELECT * FROM Products";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        img {
            max-width: 50px; /* Giới hạn chiều rộng hình ảnh */
            height: auto;    /* Tự động điều chỉnh chiều cao */
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<h2>Danh sách sản phẩm</h2>";
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ProductID']}</td>
                <td>{$row['ProductName']}</td>
                <td>{$row['Price']}</td>
                <td>{$row['Description']}</td>
                <td><img src='{$row['ImageURL']}' alt='{$row['ProductName']}'></td>
                <td>
                    <a href='edit_product.php?ProductID={$row['ProductID']}'>Sửa</a> |
                    <a href='delete_product.php?ProductID={$row['ProductID']}'>Xóa</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<h3>Không có sản phẩm nào.</h3>";
}

$conn->close();
?>

</body>
</html>
