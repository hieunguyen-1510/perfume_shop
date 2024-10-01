<?php
require 'db_connect.php';

$error_message = '';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $query = "DELETE FROM Users WHERE UserID='$userId'";
    if (mysqli_query($conn, $query)) {
        header('Location: admin.php');
        exit();
    } else {
        $error_message = "Lỗi khi xóa tài khoản: " . mysqli_error($conn);
    }
} else {
    $error_message = "ID tài khoản không được cung cấp.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa tài khoản người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #d9534f; /* Bootstrap danger color */
        }

        .error {
            color: #d9534f; /* Bootstrap danger color */
            font-weight: bold;
            text-align: center;
        }

        p {
            text-align: center;
            font-size: 18px;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #5bc0de; /* Bootstrap info color */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #31b0d5; 
        }

        .cancel {
            background-color: #d9534f; 
        }

        .cancel:hover {
            background-color: #c9302c; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xóa tài khoản người dùng</h2>
        <?php if ($error_message): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php else: ?>
            <p>Bạn có chắc chắn muốn xóa tài khoản này không?</p>
            <a href="delete_user.php?id=<?php echo $_GET['id']; ?>">Xóa</a>
            <a href="admin.php" class="cancel">Quay lại</a>
        <?php endif; ?>
    </div>
</body>
</html>
