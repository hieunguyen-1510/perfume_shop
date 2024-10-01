document.addEventListener('DOMContentLoaded', () => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartTableBody = document.querySelector('#cart-table tbody');
    const totalAmountSpan = document.getElementById('total-amount');

    if (cart.length === 0) {
        cartTableBody.innerHTML = '<tr><td colspan="5">Giỏ hàng của bạn trống</td></tr>';
    } else {
        let totalPrice = 0;
        cart.forEach(product => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${product.name}</td>
                <td><img src="${product.image}" alt="${product.name}" width="50"></td>
                <td>${product.quantity}</td>
                <td>$${product.price.toFixed(2)}</td>
                <td>$${(product.price * product.quantity).toFixed(2)}</td>
            `;
            cartTableBody.appendChild(row);

            totalPrice += product.price * product.quantity;
        });
        totalAmountSpan.textContent = `$${totalPrice.toFixed(2)}`;
    }

    // Bắt sự kiện "Thanh toán"
    const paymentForm = document.getElementById('payment-form');
    paymentForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const address = document.getElementById('address').value;
        const paymentMethod = document.getElementById('payment-method').value;

        // Lưu thông tin thanh toán vào localStorage (nếu cần)
        const paymentInfo = {
            name,
            address,
            paymentMethod,
            totalAmount: totalAmountSpan.textContent,
        };
        localStorage.setItem('paymentInfo', JSON.stringify(paymentInfo));

        // Điều hướng sang trang thank_you.html
        window.location.href = './thank_you.html';
    });
});
