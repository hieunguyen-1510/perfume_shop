<?php
include 'db_connect.php'; // Kết nối cơ sở dữ liệu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ProductName = $_POST['ProductName'];
    $Price = $_POST['Price'];
    $Description = $_POST['Description'];
    $ImageURL = ""; // Khởi tạo biến $ImageURL

    // Xử lý hình ảnh
    if (isset($_FILES['ImageURL']) && $_FILES['ImageURL']['error'] == 0) {
        $targetDir = 'uploads/'; // Thư mục lưu trữ hình ảnh
        $targetFile = $targetDir . basename($_FILES['ImageURL']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra loại tệp
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (in_array($imageFileType, $allowedTypes)) {
            // Di chuyển tệp hình ảnh vào thư mục uploads
            if (move_uploaded_file($_FILES['ImageURL']['tmp_name'], $targetFile)) {
                $ImageURL = $targetFile; // Gán đường dẫn hình ảnh đã tải lên
            } else {
                echo "Có lỗi khi tải lên hình ảnh.<br>";
            }
        } else {
            echo "Chỉ cho phép các tệp hình ảnh (jpg, jpeg, png, gif).<br>";
        }
    } else {
        echo "Không có hình ảnh nào được tải lên.<br>";
    }

    // Sử dụng Prepared Statements để thêm sản phẩm
    $stmt = $conn->prepare("INSERT INTO Products (ProductName, Price, Description, ImageURL) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $ProductName, $Price, $Description, $ImageURL);

    if ($stmt->execute()) {
        echo "Thêm sản phẩm thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
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
        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-bottom: 20px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-link {
            text-align: center; /* Căn giữa nội dung */
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <h2>Thêm sản phẩm mới</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="ProductName">Tên sản phẩm:</label>
        <input type="text" id="ProductName" name="ProductName" required>
        
        <label for="Price">Giá:</label>
        <input type="number" id="Price" name="Price" required>
        
        <label for="Description">Mô tả sản phẩm:</label>
        <textarea id="Description" name="Description" required></textarea>
        
        <label for="ImageURL">Chọn hình ảnh:</label>
        <input type="file" id="ImageURL" name="ImageURL" accept="image/*" required>
        <button type="submit">Thêm sản phẩm</button>
    </form>
    <div class="back-link">
        <a href="admin.php">Quay lại</a>
    </div>
</body>
</html>
