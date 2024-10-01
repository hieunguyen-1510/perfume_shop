<?php
require 'db_connect.php';

$query = "SELECT * FROM Users";
$result = mysqli_query($conn, $query);
?>

<h2>Quản lý tài khoản</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['UserID']); ?></td>
            <td><?php echo htmlspecialchars($row['Username']); ?></td>
            <td><?php echo htmlspecialchars($row['Email']); ?></td>
            <td><?php echo htmlspecialchars($row['PhoneNumber']); ?></td>
            <td>
                <button onclick="window.location.href='edit_user.php?id=<?php echo $row['UserID']; ?>'">Sửa</button>
                <button onclick="window.location.href='delete_user.php?id=<?php echo $row['UserID']; ?>'">Xóa</button>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script>
    function deleteUser(userId) {
        if (confirm('Bạn có chắc muốn xóa tài khoản này không?')) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "delete_user.php?id=" + userId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        alert('Tài khoản đã được xóa');
                        location.reload(); // Reload the page to see the changes
                    } else {
                        alert('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                }
            };
            xhr.send();
        }
    }
</script>
