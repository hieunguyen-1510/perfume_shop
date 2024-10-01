const login = document.getElementById('login');
const register = document.getElementById('register');
const modal = document.getElementById('modal');
const modalOverlay = document.querySelector('.modal__overlay');
const closeButton = document.querySelectorAll('.close-btn');
const loginForm = document.getElementById('form-login');
const registerForm = document.getElementById('form-register');
const searchBtn = document.getElementById('search-click');
const cart = document.getElementById('click-cart');
const cartForm = document.querySelector('.cart');
const searchBar = document.querySelector('.container-search')

// Biến lưu trữ thông tin đăng ký
let registeredEmail = '';
let registeredPassword = '';


function login1(){
    loginForm.style.display = "block";
    registerForm.style.display = "none";
}

function register1(){
    registerForm.style.display = "block";
    loginForm.style.display = "none";
}

function openModal(){
    modalOverlay.style.display = "block";
    modal.style.display = "flex";
}

function closeModal(){
    modalOverlay.style.display = "none";
    modal.style.display = "none";
    searchBar.style.display = "none";
    cartForm.style.display = "none";
}

function showForm(formToShow) {
    loginForm.style.display = "none";
    registerForm.style.display = "none";
    searchBar.style.display = "none";
    cartForm.style.display = "none";

    if (formToShow) {
        formToShow.style.display = "block";
    }
}

cart.addEventListener('click',function(event){
    event.preventDefault();
    openModal();
    modal.style.zIndex = "28";
    modal.style.top = "0";
    showForm(cartForm);
})

login.addEventListener('click',function(event){
    event.preventDefault();
    openModal();
    modal.style.zIndex = "28";
    modal.style.top = "0";
    showForm(loginForm);
})

register.addEventListener('click',function(event){
    event.preventDefault();
    openModal();
    modal.style.zIndex = "28";
    modal.style.top = "0";
    showForm(registerForm);
})

searchBtn.addEventListener('click',function(event){
    event.preventDefault();
    openModal();
    modal.style.top = "230px";
    showForm(searchBar);
});

closeButton.forEach(button =>{
    button.addEventListener('click',function(event){
    event.preventDefault();
    closeModal();
})});

modalOverlay.addEventListener('click',function(event){
    event.preventDefault();
    closeModal();
})

// Search
function filterProducts() {
    const input = document.querySelector('.header-search__input').value.toLowerCase();
    const products = document.querySelectorAll('.products-item');
    let anyVisible = false; // Biến theo dõi xem có sản phẩm nào được hiển thị không

    products.forEach(product => {
        const productName = product.querySelector('.product-name a').textContent.toLowerCase();
        
        // Kiểm tra xem tên sản phẩm có chứa từ khóa không
        if (productName.includes(input) || input.trim() === '') {
            modalOverlay.style.display = "none";
            modal.style.display = "none";
            product.classList.remove('hidden'); // Hiển thị sản phẩm
            anyVisible = true; // Có ít nhất một sản phẩm được hiển thị
        } else {
            product.classList.add('hidden'); // Ẩn sản phẩm
        }
    });

    // Hiển thị thông báo nếu không có sản phẩm nào được tìm thấy
    const noResultsDiv = document.getElementById('no-results');
    if (!anyVisible) {
        noResultsDiv.classList.remove('hidden');
    } else {
        noResultsDiv.classList.add('hidden');
    }
}

function clearSearch() {
    // Xóa nội dung ô tìm kiếm
    document.querySelector('.header-search__input').value = '';
    
    // Gọi lại hàm để hiển thị lại tất cả sản phẩm
    filterProducts();
}

// cart
document.addEventListener('DOMContentLoaded', () => {
    const cart = [];
    const cartBody = document.querySelector('.cart-body');
    const checkoutButton = document.createElement('button');
    checkoutButton.classList.add('checkout-btn');
    checkoutButton.textContent = 'Thanh toán';
    
    // Giả sử là một biến toàn cục để kiểm tra trạng thái đăng nhập
    let isLoggedIn = false; // Thay đổi thành true nếu người dùng đã đăng nhập
    
    document.querySelectorAll('.buy-sp').forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const productItem = button.closest('.products-item');
            const productName = productItem.querySelector('.product-name a').textContent;
            const productPrice = parseFloat(productItem.querySelector('.price-products').textContent.replace('$', ''));
            const productImage = productItem.querySelector('.image-product').src;

            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            const existingProduct = cart.find(item => item.name === productName);
            if (existingProduct) {
                existingProduct.quantity++; // Tăng số lượng nếu sản phẩm đã tồn tại
            } else {
                const product = {
                    name: productName,
                    price: productPrice,
                    image: productImage,
                    quantity: 1 // Khởi tạo số lượng sản phẩm
                };
                cart.push(product);
            }
            updateCart();
        });
    });

    function updateCart() {
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        const totalPrice = cart.reduce((total, item) => total + (item.price * item.quantity), 0).toFixed(2);
    
        // Cập nhật tất cả các phần tử cart-count
        const cartCountElements = document.querySelectorAll('.cart-count');
        cartCountElements.forEach(count => {
            count.textContent = totalItems; // Cập nhật số lượng sản phẩm
        });
    
        cartBody.innerHTML = '';
    
        if (cart.length === 0) {
            cartBody.innerHTML = '<p>Your cart is empty</p>';
            cartBody.style.position = 'absolute';
            cartBody.style.top = '50%'; 
            cartBody.style.left = '50%'; 
            cartBody.style.transform = 'translate(-25%)';
        } else {
            cart.forEach((product, index) => {
                const cartItem = document.createElement('div');
                cartItem.classList.add('cart-item');
                cartItem.innerHTML = `
                    <div class="cart-item-content">
                        <img src="${product.image}" alt="${product.name}" class="cart-item-image">
                        <span class="cart-item-name">${product.name}</span>
                    </div>
                    <div class="cart-item-price">$${(product.price * product.quantity).toFixed(2)}</div>
                    <div class="cart-item-quantity-controls">
                        <input type="number" class="cart-item-quantity" value="${product.quantity}" min="1" data-index="${index}">
                    </div>
                    <div class="cart-item-actions">
                        <button class="cart-item-remove" data-index="${index}">Xóa</button>
                    </div>
                `;
                cartBody.appendChild(cartItem);
            });
    
            // Thêm tổng số tiền và số lượng vào dưới cùng
            const totalSummary = document.createElement('div');
            totalSummary.classList.add('cart-summary');
            totalSummary.innerHTML = `
                <span>Tổng giá: </span> <b>$${totalPrice}</b>
            `;
            cartBody.appendChild(totalSummary);
    
            // Thêm nút thanh toán
            cartBody.appendChild(checkoutButton);
        }
    
        // Thêm sự kiện cho các ô nhập số lượng
        document.querySelectorAll('.cart-item-quantity').forEach(input => {
            input.addEventListener('input', (event) => {
                const index = event.target.getAttribute('data-index');
                const quantity = parseInt(event.target.value);
                if (quantity > 0) {
                    cart[index].quantity = quantity; // Cập nhật số lượng sản phẩm
                }
                updateCart(); // Cập nhật giỏ hàng
            });
        });
    
        // Thêm sự kiện cho từng nút xóa
        document.querySelectorAll('.cart-item-remove').forEach(button => {
            button.addEventListener('click', (event) => {
                const index = event.target.getAttribute('data-index');
                cart.splice(index, 1); // Xóa sản phẩm khỏi giỏ hàng
                updateCart(); // Cập nhật giỏ hàng
            });
        });
    
        // Sự kiện cho nút thanh toán
        // Sự kiện cho nút thanh toán
        // checkoutButton.addEventListener('click', () => {
        //     if (!isLoggedIn) {
        //         alert('Bạn cần đăng nhập để thanh toán.');
        //         openModal(); // Mở modal để hiển thị form đăng nhập
        //         showForm(loginForm); // Hiển thị form đăng nhập
        //         // Sau khi đăng nhập thành công, chuyển đến trang hóa đơn
        //         document.querySelector('.btn--primary').addEventListener('click', () => {
        //             // Giả sử quá trình đăng nhập thành công, cập nhật trạng thái người dùng đã đăng nhập
        //             isLoggedIn = true;
        //             // Lưu giỏ hàng vào localStorage
        //             localStorage.setItem('cart', JSON.stringify(cart));
        //             localStorage.setItem('totalPrice', totalPrice);
        
        //             // Chuyển hướng tới trang hóa đơn sau khi đăng nhập thành công
        //             window.location.href = '/bill';
        //         });
        //     } else {
        //         // Nếu đã đăng nhập thì chuyển ngay tới trang hóa đơn
        //         localStorage.setItem('cart', JSON.stringify(cart));
        //         localStorage.setItem('totalPrice', totalPrice);
        //         window.location.href = '/bill';
        //     }
            
        // });
        
        checkoutButton.addEventListener('click', () => {
            localStorage.setItem('cart', JSON.stringify(cart));
            localStorage.setItem('totalPrice', totalPrice);
            window.location.href = 'bill.html'; // Chuyển đến trang hóa đơn
        });
        
        
        
    }

});

//show category on smartphone
const mainNav = document.getElementById('main-nav')
function clickCategory(){
    mainNav.classList.toggle('show-menu');
}

// Khi người dùng thêm sản phẩm vào giỏ hàng
const addToCart = (product) => {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingProduct = cart.find(item => item.name === product.name);

    if (existingProduct) {
        existingProduct.quantity++; // Tăng số lượng nếu sản phẩm đã tồn tại
    } else {
        cart.push(product); // Thêm sản phẩm mới vào giỏ hàng
    }

    localStorage.setItem('cart', JSON.stringify(cart)); // Lưu giỏ hàng
    console.log(cart); // Kiểm tra nội dung giỏ hàng
};

// Lưu thông tin người dùng
localStorage.setItem('userEmail', 'email@example.com');
localStorage.setItem('userPhone', '0123456789');
localStorage.setItem('userAddress', 'Hải Phòng');

// Sự kiện cho nút "ĐĂNG KÝ"
const registerButton = document.getElementById('register-btn'); // Nút đăng ký có ID "register-btn"
registerButton.addEventListener('click', function(event) {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của form

    const email = document.getElementById('register-email').value; // Chọn đúng trường email đăng ký
    const password = document.getElementById('register-password').value; // Chọn đúng trường mật khẩu đăng ký
    const confirmPassword = document.getElementById('confirm-password').value; // Trường xác nhận mật khẩu

    // Kiểm tra điều kiện đăng ký
    if (email && password && confirmPassword && password === confirmPassword) {
        // Lưu thông tin đăng ký
        registeredEmail = email;
        registeredPassword = password;

        alert('Đăng ký thành công! Mời bạn đăng nhập.');
        login1(); // Hiển thị form đăng nhập sau khi đăng ký thành công
    } else {
        alert('Vui lòng nhập đầy đủ thông tin và đảm bảo mật khẩu khớp.');
    }
});

// Sự kiện cho nút "ĐĂNG NHẬP"
const loginButton = document.getElementById('login-btn'); // Nút đăng nhập có ID "login-btn"
loginButton.addEventListener('click', function(event) {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của form

    const email = document.getElementById('login-email').value; // Chọn đúng trường email đăng nhập
    const password = document.getElementById('login-password').value; // Chọn đúng trường mật khẩu đăng nhập

    // Kiểm tra thông tin đăng nhập
    if (email === registeredEmail && password === registeredPassword) {
        alert('Đăng nhập thành công!');
        closeModal(); // Đóng modal sau khi đăng nhập thành công
        // Chuyển hướng đến trang chủ (hoặc trang đích mong muốn)
        window.location.href = "index.html";
    } else {
        alert('Email hoặc mật khẩu không đúng!');
        // Xóa các giá trị đã nhập và đặt con trỏ vào trường email
        document.getElementById('login-email').value = '';
        document.getElementById('login-password').value = '';
        document.getElementById('login-email').focus();
    }
});