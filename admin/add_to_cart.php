<?php
include 'db_connect.php'; // Kết nối CSDL

// Thêm sản phẩm vào giỏ hàng
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserID = $_POST['UserID'];
    $ProductID = $_POST['ProductID'];
    $Quantity = $_POST['Quantity'];

    // Lấy thông tin giá sản phẩm
    $stmt = $conn->prepare("SELECT Price FROM Products WHERE ProductID = ?");
    $stmt->bind_param("i", $ProductID);
    $stmt->execute();
    $stmt->bind_result($Price);
    $stmt->fetch();
    $stmt->close();

    $Subtotal = $Price * $Quantity;

    // Kiểm tra xem giỏ hàng của user đã tồn tại chưa
    $stmt = $conn->prepare("SELECT CartID FROM Carts WHERE UserID = ?");
    $stmt->bind_param("i", $UserID);
    $stmt->execute();
    $stmt->bind_result($CartID);
    $stmt->fetch();
    $stmt->close();

    if (!$CartID) {
        // Nếu chưa có giỏ hàng, tạo mới giỏ hàng cho user
        $stmt = $conn->prepare("INSERT INTO Carts (UserID, TotalAmount) VALUES (?, 0)");
        $stmt->bind_param("i", $UserID);
        $stmt->execute();
        $CartID = $stmt->insert_id; // Lấy CartID vừa tạo
        $stmt->close();
    }

    // Thêm sản phẩm vào CartItems
    $stmt = $conn->prepare("INSERT INTO CartItems (CartID, ProductID, Quantity, Subtotal) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiid", $CartID, $ProductID, $Quantity, $Subtotal);
    $stmt->execute();
    $stmt->close();

    // Cập nhật lại TotalAmount trong Carts
    $stmt = $conn->prepare("UPDATE Carts SET TotalAmount = TotalAmount + ? WHERE CartID = ?");
    $stmt->bind_param("di", $Subtotal, $CartID);
    $stmt->execute();
    $stmt->close();

    echo "Sản phẩm đã được thêm vào giỏ hàng.";
}
?>
