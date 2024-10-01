<?php
include 'db_connect.php'; // Kết nối CSDL

// Tạo đơn hàng
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserID = $_POST['UserID'];
    $OrderDate = date('Y-m-d H:i:s');
    $OrderStatus = "Pending"; // Đơn hàng ở trạng thái chờ xử lý

    // Tạo đơn hàng mới
    $stmt = $conn->prepare("INSERT INTO Orders (UserID, OrderDate, TotalAmount, OrderStatus) VALUES (?, ?, 0, ?)");
    $stmt->bind_param("iss", $UserID, $OrderDate, $OrderStatus);
    $stmt->execute();
    $OrderID = $stmt->insert_id; // Lấy OrderID vừa tạo
    $stmt->close();

    // Chuyển các sản phẩm từ giỏ hàng sang chi tiết đơn hàng
    $stmt = $conn->prepare("SELECT CartID, ProductID, Quantity, Subtotal FROM CartItems WHERE CartID IN (SELECT CartID FROM Carts WHERE UserID = ?)");
    $stmt->bind_param("i", $UserID);
    $stmt->execute();
    $stmt->bind_result($CartID, $ProductID, $Quantity, $Subtotal);

    $TotalAmount = 0;
    while ($stmt->fetch()) {
        // Thêm từng sản phẩm vào OrderDetails
        $stmtInsert = $conn->prepare("INSERT INTO OrderDetails (OrderID, ProductID, Quantity, Price) VALUES (?, ?, ?, ?)");
        $stmtInsert->bind_param("iiid", $OrderID, $ProductID, $Quantity, $Subtotal);
        $stmtInsert->execute();
        $stmtInsert->close();

        // Cộng dồn giá trị đơn hàng
        $TotalAmount += $Subtotal;
    }
    $stmt->close();

    // Cập nhật lại TotalAmount trong Orders
    $stmt = $conn->prepare("UPDATE Orders SET TotalAmount = ? WHERE OrderID = ?");
    $stmt->bind_param("di", $TotalAmount, $OrderID);
    $stmt->execute();
    $stmt->close();

    echo "Đơn hàng đã được tạo thành công.";
}
?>
