<?php
include 'db_connect.php'; // Kết nối cơ sở dữ liệu

if (isset($_POST['order_id']) && isset($_POST['cart_items'])) {
    $orderID = $_POST['order_id']; // ID của đơn hàng vừa được tạo
    $cartItems = $_POST['cart_items']; // Danh sách sản phẩm từ giỏ hàng (mảng)

    // Thêm từng sản phẩm từ giỏ hàng vào bảng OrderDetails
    foreach ($cartItems as $item) {
        $productID = $item['product_id'];
        $quantity = $item['quantity'];
        $price = $item['price']; // Đơn giá của sản phẩm

        // Chuẩn bị truy vấn SQL
        $stmt = $conn->prepare("INSERT INTO OrderDetails (OrderID, ProductID, Quantity, Price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $orderID, $productID, $quantity, $price);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            echo "Thêm chi tiết đơn hàng thành công!<br>";
        } else {
            echo "Lỗi: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
