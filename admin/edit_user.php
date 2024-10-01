<?php
require 'db_connect.php';

$user = null; 
$userId = null; 

if (isset($_GET['id'])) {
    $userId = $_GET['id']; 
    $result = mysqli_query($conn, "SELECT * FROM Users WHERE UserID='$userId'"); 
    if ($result) {
        $user = mysqli_fetch_assoc($result); 
    }
}

if ($user === null) {
    header('Location: admin.php?error=UserNotFound'); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['Username']; 
    $email = $_POST['Email']; 
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT); 
    $phoneNumber = $_POST['PhoneNumber']; 

    $query = "UPDATE Users SET Username='$username', Email='$email', Password='$password', PhoneNumber='$phoneNumber' WHERE UserID='$userId'";
    mysqli_query($conn, $query); 
    header('Location: admin.php'); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tài khoản người dùng</title>
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
            color: #5cb85c; /* Bootstrap success color */
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #5cb85c; /* Highlight border color */
        }

        button {
            padding: 10px;
            background-color: #5cb85c; /* Bootstrap success color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4cae4f; /* Darker shade for hover effect */
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #5bc0de; /* Bootstrap info color */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sửa tài khoản người dùng</h2>
        <form method="POST" action="edit_user.php?id=<?php echo $userId; ?>">
            <label for="Username">Username:</label>
            <input type="text" name="Username" value="<?php echo htmlspecialchars($user['Username']); ?>" required>
            <label for="Email">Email:</label>
            <input type="email" name="Email" value="<?php echo htmlspecialchars($user['Email']); ?>" required> 
            <label for="Password">Mật khẩu:</label>
            <input type="password" name="Password" required> 
            <label for="PhoneNumber">Số điện thoại:</label>
            <input type="text" name="PhoneNumber" value="<?php echo htmlspecialchars($user['PhoneNumber']); ?>" required> 
            <button type="submit">Cập nhật tài khoản</button> 
        </form>
        <a href="admin.php">Quay lại</a> 
    </div>
</body>
</html>
