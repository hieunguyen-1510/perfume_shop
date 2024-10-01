<?php
include 'db_connect.php'; // Kết nối CSDL

// Cập nhật số lượng sản phẩm trong giỏ hàng
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CartItemID = $_POST['CartItemID'];
    $NewQuantity = $_POST['Quantity'];

    // Lấy thông tin sản phẩm để tính lại Subtotal
    $stmt = $conn->prepare("SELECT ProductID, Quantity, Subtotal FROM CartItems WHERE CartItemID = ?");
    $stmt->bind_param("i", $CartItemID);
    $stmt->execute();
    $stmt->bind_result($ProductID, $OldQuantity, $OldSubtotal);
    $stmt->fetch();
    $stmt->close();

    // Lấy giá sản phẩm
    $stmt = $conn->prepare("SELECT Price FROM Products WHERE ProductID = ?");
    $stmt->bind_param("i", $ProductID);
    $stmt->execute();
    $stmt->bind_result($Price);
    $stmt->fetch();
    $stmt->close();

    $NewSubtotal = $Price * $NewQuantity;

    // Cập nhật số lượng và Subtotal trong CartItems
    $stmt = $conn->prepare("UPDATE CartItems SET Quantity = ?, Subtotal = ? WHERE CartItemID = ?");
    $stmt->bind_param("idi", $NewQuantity, $NewSubtotal, $CartItemID);
    $stmt->execute();
    $stmt->close();

    // Cập nhật lại TotalAmount trong Carts
    $Difference = $NewSubtotal - $OldSubtotal;
    $stmt = $conn->prepare("UPDATE Carts SET TotalAmount = TotalAmount + ? WHERE CartID = ?");
    $stmt->bind_param("di", $Difference, $CartID);
    $stmt->execute();
    $stmt->close();

    echo "Số lượng sản phẩm đã được cập nhật.";
}
?>
