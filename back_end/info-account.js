// Lấy các tham số từ URL
const params = new URLSearchParams(window.location.search);
const productName = params.get('name');
const productPrice = params.get('price');
const productImage = params.get('image');
const productSale = params.get('sale');

// Kiểm tra nếu các tham số tồn tại
if (productName && productPrice && productImage) {
    // Hiển thị thông tin sản phẩm trên trang
    document.getElementById('product-name').textContent = productName;
    document.getElementById('product-price').textContent = `$${productPrice}`;
    document.getElementById('product-image').src = productImage;
    
    if (productSale) {
        document.getElementById('product-sale').textContent = `Giảm giá: -$${productSale}`;
    } else {
        document.getElementById('product-sale').style.display = 'none'; // Ẩn phần giảm giá nếu không có
    }
} else {
    alert('Sản phẩm đã được thêm vào giỏ hàng');
}

// Thêm sản phẩm vào giỏ hàng
document.getElementById('add-to-cart-btn').addEventListener('click', () => {
    const product = {
        name: productName,
        price: parseFloat(productPrice),
        image: productImage,
        quantity: 1
    };

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingProduct = cart.find(item => item.name === product.name);

    if (existingProduct) {
        existingProduct.quantity++;
    } else {
        cart.push(product);
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert('Không có dữ liệu sản phẩm để hiển thị.');
});
