<?php
include 'db_connect.php'; // Kết nối cơ sở dữ liệu

if (isset($_POST['order_id']) && isset($_POST['payment_method'])) {
    $orderID = $_POST['order_id']; // ID của đơn hàng đã được tạo
    $paymentMethod = $_POST['payment_method']; // Phương thức thanh toán (ví dụ: "Credit Card", "PayPal")
    $paymentStatus = "Đã thanh toán"; // Trạng thái thanh toán (có thể thay đổi theo thực tế)

    // Chuẩn bị truy vấn SQL
    $stmt = $conn->prepare("INSERT INTO Payments (OrderID, PaymentMethod, PaymentStatus) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $orderID, $paymentMethod, $paymentStatus);

    // Thực thi truy vấn
    if ($stmt->execute()) {
        echo "Thanh toán thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}
?>
