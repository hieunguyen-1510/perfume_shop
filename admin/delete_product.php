<?php
include 'db_connect.php'; // Kết nối cơ sở dữ liệu

if (isset($_GET['ProductID'])) {
    $ProductID = $_GET['ProductID'];

    // SQL để xóa sản phẩm
    $sql = "DELETE FROM Products WHERE ProductID='$ProductID'";

    if ($conn->query($sql) === TRUE) {
        $message = "Xóa sản phẩm thành công!";
    } else {
        $message = "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Điều hướng về trang danh sách sản phẩm
    header("Location: product_list.php");
    exit();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center; /* Căn giữa nội dung */
        }

        .message {
            background-color: #4CAF50; /* Màu nền thông báo thành công */
            color: white;
            padding: 15px;
            margin: 20px auto;
            border-radius: 5px;
            display: inline-block; /* Hiển thị nội dung như một khối */
        }

        .error {
            background-color: #f44336; /* Màu nền thông báo lỗi */
            color: white;
            padding: 15px;
            margin: 20px auto;
            border-radius: 5px;
            display: inline-block; /* Hiển thị nội dung như một khối */
        }

        a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        a:hover {
            background-color: #45a049; /* Hiệu ứng hover cho liên kết */
        }
    </style>
</head>
<body>

<?php
if (isset($message)) {
    // Hiển thị thông báo sau khi xóa sản phẩm
    echo "<div class='message'>$message</div>";
}
?>

<a href="product_list.php">Quay lại danh sách sản phẩm</a>

</body>
</html>
