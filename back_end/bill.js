document.addEventListener('DOMContentLoaded', () => {
    // Lấy giỏ hàng từ localStorage
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    const userEmail = localStorage.getItem('userEmail') || 'Chưa có thông tin';
    const userPhone = localStorage.getItem('userPhone') || 'Chưa có thông tin';
    const userAddress = localStorage.getItem('userAddress') || 'Chưa có thông tin';

    // Hiển thị thông tin người mua
    document.getElementById('user-email').innerText = userEmail;
    document.getElementById('user-phone').innerText = userPhone;
    document.getElementById('user-address').innerText = userAddress;

    // Hiển thị giỏ hàng
    const cartBody = document.getElementById('cart-body');
    const cartSummary = document.querySelector('.cart-summary');

    let totalAmount = 0;

    cartItems.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('cart-item');
        itemElement.innerText = `${item.name} - ${item.price} USD`;
        cartBody.appendChild(itemElement);
        
        totalAmount += item.price;
    });

    cartSummary.innerHTML = `<strong>Tổng tiền:</strong> ${totalAmount} USD`;

    // Xử lý sự kiện cho nút xác nhận thanh toán
    document.getElementById('confirm-payment').addEventListener('click', () => {
        // Thực hiện xác nhận thanh toán
        alert('Xác nhận thanh toán thành công!');
        window.location.href = 'thank_you.html'; // Đảm bảo rằng trang thank_you.html tồn tại
    });

    // Xử lý sự kiện cho nút hủy thanh toán
    document.getElementById('cancel-payment').addEventListener('click', () => {
        // Thực hiện hủy thanh toán
        alert('Hủy thanh toán thành công!');
        window.location.href = 'cart.html'; // Đảm bảo rằng trang cart.html tồn tại
    });
});
