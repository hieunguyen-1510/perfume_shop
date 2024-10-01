<?php
include 'db_connect.php'; // Kết nối cơ sở dữ liệu

if (isset($_GET['ProductID'])) {
    $ProductID = $_GET['ProductID'];
    $sql = "SELECT * FROM Products WHERE ProductID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ProductID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            width: 100%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
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
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #45a049;
            transform: scale(1.02);
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        .success {
            background-color: #4CAF50;
        }

        .error {
            background-color: #f44336;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            transition: color 0.3s;
        }

        a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Sửa sản phẩm</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']; ?>">
        
        <label for="ProductName">Tên sản phẩm:</label>
        <input type="text" id="ProductName" name="ProductName" value="<?php echo htmlspecialchars($row['ProductName']); ?>" required>
        
        <label for="Price">Giá:</label>
        <input type="number" id="Price" name="Price" value="<?php echo htmlspecialchars($row['Price']); ?>" required step="0.01"> <!-- Bổ sung step cho giá -->
        
        <label for="Description">Mô tả sản phẩm:</label>
        <textarea id="Description" name="Description" required><?php echo htmlspecialchars($row['Description']); ?></textarea>
        
        <label for="ImageURL">Hình ảnh hiện tại:</label><br>
        <img src="<?php echo htmlspecialchars($row['ImageURL']); ?>" alt="Current Image" style="max-width: 100px;"><br><br>
        
        <label for="ImageURL">Chọn hình ảnh mới (nếu muốn thay đổi):</label>
        <input type="file" id="ImageURL" name="ImageURL" accept="image/*">
        
        <button type="submit">Cập nhật sản phẩm</button>
    </form>
    <a href="admin.php">Quay lại</a>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ProductID = $_POST['ProductID'];
        $ProductName = $_POST['ProductName'];
        $Price = $_POST['Price'];
        $Description = $_POST['Description'];
        $ImageURL = $row['ImageURL']; // Giữ nguyên ảnh cũ nếu không có ảnh mới

        // Xử lý hình ảnh mới nếu có
        if (isset($_FILES['ImageURL']) && $_FILES['ImageURL']['error'] == 0) {
            $targetDir = 'uploads/';
            $targetFile = $targetDir . basename($_FILES['ImageURL']['name']);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            if (in_array($imageFileType, $allowedTypes)) {
                // Di chuyển tệp hình ảnh mới vào thư mục uploads
                if (move_uploaded_file($_FILES['ImageURL']['tmp_name'], $targetFile)) {
                    $ImageURL = $targetFile; // Gán đường dẫn hình ảnh mới
                } else {
                    echo "<div class='message error'>Có lỗi khi tải lên hình ảnh.</div>";
                }
            } else {
                echo "<div class='message error'>Chỉ cho phép các tệp hình ảnh (jpg, jpeg, png, gif, webp).</div>";
            }
        }

        // SQL để cập nhật sản phẩm
        $stmt = $conn->prepare("UPDATE Products SET ProductName=?, Price=?, Description=?, ImageURL=? WHERE ProductID=?");
        $stmt->bind_param("ssssi", $ProductName, $Price, $Description, $ImageURL, $ProductID);

        if ($stmt->execute()) {
            echo "<div class='message success'>Cập nhật sản phẩm thành công!</div>";
            header("Location: product_list.php");
            exit();
        } else {
            echo "<div class='message error'>Lỗi: " . $stmt->error . "</div>"; // Hiển thị thông báo lỗi cụ thể
        }
        $stmt->close();
    }
} else {
    echo "<div class='message error'>Sản phẩm không tồn tại.</div>";
}

$conn->close();
?>
</body>
</html>
