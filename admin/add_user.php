<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $phoneNumber = $_POST['PhoneNumber'];

    $query = "INSERT INTO Users (Username, Email, Password, PhoneNumber) VALUES ('$username', '$email', '$password', '$phoneNumber')";
    mysqli_query($conn, $query);
    header('Location: admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            margin: 10px 0 5px;
            display: block;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thêm tài khoản người dùng</h2>
        <form method="POST" action="add_user.php">
            <label for="Username">Username:</label>
            <input type="text" name="Username" required>

            <label for="Email">Email:</label>
            <input type="email" name="Email" required>

            <label for="Password">Mật khẩu:</label>
            <input type="password" name="Password" required>

            <label for="PhoneNumber">Số điện thoại:</label>
            <input type="text" name="PhoneNumber" required>

            <button type="submit">Thêm tài khoản</button>
        </form>
        <a href="admin.php">Quay lại</a>
    </div>
</body>
</html>
