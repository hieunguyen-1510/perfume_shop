<?php
include 'db_connect.php'; // Kết nối CSDL

// Xóa sản phẩm khỏi giỏ hàng
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CartItemID = $_POST['CartItemID'];

    // Lấy thông tin giỏ hàng và sản phẩm để cập nhật lại TotalAmount
    $stmt = $conn->prepare("SELECT CartID, Subtotal FROM CartItems WHERE CartItemID = ?");
    $stmt->bind_param("i", $CartItemID);
    $stmt->execute();
    $stmt->bind_result($CartID, $Subtotal);
    $stmt->fetch();
    $stmt->close();

    // Xóa sản phẩm khỏi CartItems
    $stmt = $conn->prepare("DELETE FROM CartItems WHERE CartItemID = ?");
    $stmt->bind_param("i", $CartItemID);
    $stmt->execute();
    $stmt->close();

    // Cập nhật lại TotalAmount trong Carts
    $stmt = $conn->prepare("UPDATE Carts SET TotalAmount = TotalAmount - ? WHERE CartID = ?");
    $stmt->bind_param("di", $Subtotal, $CartID);
    $stmt->execute();
    $stmt->close();

    echo "Sản phẩm đã được xóa khỏi giỏ hàng.";
}
?>
