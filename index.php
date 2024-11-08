<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borcelle Perfume</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./fonts/font-awesome-4.7.0/css/font-awesome.min.css"> 
</head>
<body>
<header >
        <div class="header-content">
            <div class="container-logo">
                <img class="logo1" src="./images/logo1.png" alt="">
            </div>
            <nav id="main-nav">
                <ul >
                    <li><a href="index.html" style="background-color: bisque;">Trang chủ</a></li>
                    <li >
                        <a href="shop.html">Sản phẩm</a>
                        <ul class="drop-down">
                            <li ><a href="dnam.html">Nước hoa Design Nam</a></li>
                            <li ><a href="dnu.html">Nước hoa Design Nữ</a></li>
                            <li ><a href="new-products.html">Sản phẩm mới</a></li>
                            <li ><a href="outstanding-products.html">Sản phẩm nổi bật</a></li>
                            <li ><a href="sale.html">Sale</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">Giới thiệu</a></li>
                    <li><a href="contact.html">Liên Hệ</a></li>
                    <li id="user-name" style="display:none;">
                        <a href="#" id="userName">Username</a>
                        <ul id="logout-menu">
                            <li><a href="#" id="logout">Đăng xuất</a></li>
                        </ul>
                    </li>
                    
                    <li id="login">
                        <a href="#" id="login"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a>
                    </li>
                    <li id="register">
                        <a href="#" id="register"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng ký</a>
                    </li>
                </ul>
            </nav>
            <li class="header__navbar-item header__navbar-user">
                <img src="https://down-vn.img.susercontent.com/file/9d6de1a8bd9bf11b20057bdd44f42094_tn" alt="user-name" class="header__navbar-user-img">
                <span class="header__navbar-user-name">Sơn Bình</span>

                <ul class="header__navbar-user-menu">
                    <li class="header__navbar-user-item">
                        <a href="info.html">Tài khoản của tôi</a>
                    </li>
                    <li class="header__navbar-user-item">
                        <a href="">Đơn mua </a>
                    </li>
                    <li class="header__navbar-user-item header__navbar-user-item--separate">
                        <a href="">Đăng xuất </a>
                    </li>
                </ul>
            </li>
            <div class="icon-box">
                <i class="fa fa-search" id="search-click" aria-hidden="true"></i>
                <i class="fa fa-shopping-cart" id="click-cart" aria-hidden="true"><span class="cart-count c1">0</span></i>
                <i class="fa fa-bars" id="menu-icon"  aria-hidden="true" onclick="clickCategory()"></i>
            </div>
        </div>
    </header>
    <div class="container-search" id="predictive-search-form">
        <form action="/search" method="GET" aria-owns="header-predictive-search" class="header-search__form" role="search" onsubmit="return false;">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="search" autocomplete="off" name="q" spellcheck="false" class="header-search__input" aria-label="Search" placeholder="Search for..." oninput="filterProducts()">
            <i class="fa fa-times close-btn" style="font-size: 30px; cursor: pointer;" aria-hidden="true" onclick="clearSearch()"></i>
        </form>
    </div>
    
    <div id="no-results" class="hidden">Không có sản phẩm nào phù hợp với từ khóa tìm kiếm.</div>
    

    <div class="cart">
        <div class="cart-head">
            <span class="text-cart">Cart (<span class="cart-count">0</span>)</span>
            <i class="fa fa-times close-btn" style="font-size: 30px; cursor: pointer;" aria-hidden="true"></i>
        </div>
        <div class="cart-body">
            <p style="position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%);">Your cart is empty</p>
        </div>
    </div>
    <main>
        <section class="hero-section">
            <div class="hero-content">
                <h2>Welcome to Borcelle Perfume </h2>
                <p>Discover your signature scent from our exquisite collection of perfumes.</p>
                <a href="shop.html" class="shop-now-btn">Shop Now</a>
            </div>
        </section>
        <div class="products">
            <div class="outstanding-products">
                <div class="products__header">
                    <a href="outstanding-products.html" class="products-title">SẢN PHẨM NỔI BẬT</a>
                    <a href="outstanding-products.html" class="products__see-more">Xem Thêm <i class="fa fa-play " aria-hidden="true"></i></a>
                </div>
                <div class="container">
                    <div class="products-item">
                        <img src="./images/perfume-jp1.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Jean Paul Gaultier Le Male Pride Edition EDT</a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html?name=Jean%20Paul%20Gaultier%20Le%20Male%20Pride%20Edition%20EDT&price=20&image=./images/perfume-jp1.webp
                            " class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <span class="price-products">$20</span>
                    </div>
                    <div class="products-item">
                        <img src="./images/perfume-jp2.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Jean Paul Gaultier Le Male Lover EDP</a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <span class="price-products">$24</span>
                    </div>
                    <div class="products-item">
                        <img src="./images/perfume-jp3.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Jean Paul Gaultier Scandal Absolu For Him</a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <span class="price-products">$18</span>
                    </div>
                    <div class="products-item">
                        <img src="./images/perfume-jp4.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Jean Paul Gaultier Scandal Absolu For Her</a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <span class="price-products">$21</span>
                    </div>
                </div>
                <div class="border-3line">
                    <div class="border-1line"></div>
                    <div class="border-1line"></div>
                    <div class="border-1line"></div>
                </div>
                
            </div>
            <div class="new-products">
                <div class="products__header">
                    <a href="new-products.html" class="products-title">SẢN PHẨM MỚI</a>
                    <a href="new-products.html" class="products__see-more">Xem Thêm <i class="fa fa-play " aria-hidden="true"></i></a>
                </div>
                <div class="container">
                    <div class="products-item">
                        <img src="./images/new-perfume-jp1.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Versace Dylan Blue Pour Homme EDT </a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <span class="price-products">$30</span>
                    </div>
                    <div class="products-item">
                        <img src="./images/new-perfume-jp2.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Alexandria Fragrances Turin 21 Extrait </a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <span class="price-products">$28</span>
                    </div>
                    <div class="products-item">
                        <img src="./images/new-perfume-jp3.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Mykonos Down to Earth Extrait De Parfum</a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <span class="price-products">$32</span>
                    </div>
                    <div class="products-item">
                        <img src="./images/new-perfume-jp4.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Hermes H24 Herbes Vives EDP</a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <span class="price-products">$33</span>
                    </div>
                </div>
                <div class="border-3line">
                    <div class="border-1line"></div>
                    <div class="border-1line"></div>
                    <div class="border-1line"></div>
                </div>
            </div>
            <div class="sale-products">
                <div class="products__header">
                    <a href="sale.html" class="products-title">SALE</a>
                    <a href="sale.html" class="products__see-more">Xem Thêm <i class="fa fa-play " aria-hidden="true"></i></a>
                </div>
                <div class="container">
                    <div class="products-item">
                        <div class="sale-price">-$2</div>
                        <img src="./images/sale1.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Marc Jacobs Daisy Dream EDT</a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <p><span class="price-products-sale">$30</span><span class="price-products cl">$28</span></p>
                    </div>
                    <div class="products-item">
                        <div class="sale-price">-$4</div>
                        <img src="./images/sale2.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Police Icon Gold Men EDP</a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <p><span class="price-products-sale">$22</span><span class="price-products cl">$18</span></p>
                    </div>
                    <div class="products-item">
                        <div class="sale-price">-$6</div>
                        <img src="./images/sale3.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Hugo Boss Selection EDT</a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <p><span class="price-products-sale">$26</span><span class="price-products cl">$20</span></p>
                    </div>
                    <div class="products-item">
                        <div class="sale-price">-$3</div>
                        <img src="./images/sale4.webp" alt="" class="image-product">
                        <h3 class="product-name"><a href="">Al Haramain Amber Oud Tobacco Edition</a></h3>
                        <i class="fa fa-search-plus ic-watch" aria-hidden="true"><a href="product-detail.html" class="watch-sp">Xem chi tiết</a></i>
                        <i class="fa fa-plus ic-buy" aria-hidden="true"><a href="" class="buy-sp">Thêm vào giỏ hàng</a></i>
                        <p><span class="price-products-sale">$38</span><span class="price-products cl">$35</span></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add more sections and content here -->
    </main>
    <footer>
        <div class="site-footer">
            <div class="grid">
                <div class="grid-row">
                    <div class="col-3">
                        <div class="container-logo">
                            <img class="logo1" src="./images/logo1.png" alt="">
                        </div>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <i class="fa fa-map-marker icon-footer " aria-hidden="true"></i>
                                <span>36 Thủ Đức-Hồ Chí Minh</span>
                            </li>
                            <li class="footer-item">
                                <i class="fa fa-phone icon-footer" aria-hidden="true"></i>
                                <span>0124336587</span>
                            </li>
                            <li class="footer-item">
                                <i class="fa fa-envelope-o icon-footer" aria-hidden="true"></i>
                                <a href="Support@blanc.com - For Work: Outreach@blanc.com.vn">Support@blanc.com - For Work: Outreach@blanc.com.vn</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-3 ">
                        <span class="footer-heading">Hỗ trợ khách hàng</span>
                        <ul class="footer-list">
                            <li class="footer-item it-menu">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="">Chính sách bảo mật</a>  
                            </li>
                            <li class="footer-item it-menu">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="">Chính sách vận chuyển</a>  
                            </li>
                            <li class="footer-item it-menu">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="">Chính sách đổi trả</a>  
                            </li>
                            <li class="footer-item it-menu">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="">Hình thức thanh toán</a>  
                            </li>
                        </ul>
                        <img class="certification" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHABKQZ3RtRHqimVmqYavpwvZN_ajH9iqvpg&s" alt="">
                        
                    </div>
                    <div class="col-3">
                        <span class="footer-heading">Hướng dẫn</span>
                        <ul class="footer-list">
                            <li class="footer-item it-menu">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="">Hướng dẫn mua hàng</a>  
                            </li>
                            <li class="footer-item it-menu">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href=""> Hướng dẫn thanh toán</a>  
                            </li>
                            <li class="footer-item it-menu">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="">Hướng dẫn giao nhận</a>  
                            </li>
                            <li class="footer-item it-menu">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="">Điều khoản dịch vụ</a>  
                            </li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <span class="footer-heading">Kết nối</span>
                        <div class="icon-link">
                            <a href="" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="" class="phone"><i class="fa fa-phone" aria-hidden="true"></i></a>
                            <a href="" class="mes"><i class="fa fa-commenting-o" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Perfume Paradise. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- Modal layout -->
   <div class="modal" id="modal">
    <div class="modal__overlay"></div>
    <div class="modal__body">
        <!-- Form register -->
        <div class="auth-form" id="form-register">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng ký</h3>
                    <span class="auth-form__switch-btn" onclick="login1()">Đăng nhập</span>
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input type="text" id="register-email" class="auth-form__input" placeholder="Nhập email của bạn">
                    </div>

                    <div class="auth-form__group">
                        <input type="password" id="register-password" class="auth-form__input" placeholder="Nhập mật khẩu của bạn">
                    </div>

                    <div class="auth-form__group">
                        <input type="password" id="confirm-password" class="auth-form__input" placeholder="Nhập lại mật khẩu của bạn">
                    </div>

                    <!-- New fields -->
                    <div class="auth-form__group">
                        <input type="text" id="register-phone" class="auth-form__input" placeholder="Nhập số điện thoại của bạn">
                    </div>

                    <div class="auth-form__group">
                        <input type="text" id="register-address" class="auth-form__input" placeholder="Nhập địa chỉ của bạn">
                    </div>

                    <div class="auth-form__group">
                        <select id="register-gender" class="auth-form__input">
                            <option value="">Chọn giới tính</option>
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                            <option value="other">Khác</option>
                        </select>
                    </div>
                </div>

                <div class="auth-form__aside">
                    <p class="auth-form__policy-text">
                        Bằng việc đăng ký, bạn đã đồng ý với Borcelle Perfume về
                        <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                        <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                    </p>
                </div>

                <div class="auth-form__controls">
                    <button class="btn auth-form__control-back btn--normal close-btn">
                        TRỞ LẠI
                    </button>
                    <button class="btn btn--primary" id="register-btn">ĐĂNG KÝ</button>
                </div>
            </div>

            <div class="auth-form__socials">
                <a href="" class="auth-form__socials--facebook btn btn--size-s btn--width-icon">
                    <i class="auth-form__socials--icon fa fa-facebook-square" aria-hidden="true"></i>
                    <span class="auth-form__socials-title">Kết nối với FaceBook</span>
                </a>

                <a href="" class="auth-form__socials--google btn btn--size-s btn--width-icon">
                    <i class="auth-form__socials--icon fa fa-google" aria-hidden="true"></i>
                    <span class="auth-form__socials-title">Kết nối với Google</span>
                </a>
            </div>
        </div>

        <!-- Form login -->
        <div class="auth-form" id="form-login">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng nhập</h3>
                    <span class="auth-form__switch-btn" onclick="register1()">Đăng ký</span>
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input type="text" class="auth-form__input" id="login-email" placeholder="Nhập email của bạn">
                    </div>

                    <div class="auth-form__group">
                        <input type="password" class="auth-form__input" id="login-password" placeholder="Nhập mật khẩu của bạn">
                    </div>
                </div>

                <div class="auth-form__aside">
                    <div class="auth-form__help">
                        <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                        <span class="auth-form__help-sperate"></span>
                        <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                    </div>
                </div>

                <div class="auth-form__controls">
                    <button class="btn auth-form__control-back btn--normal" onclick="register1()">
                        TRỞ LẠI
                    </button>
                    <button class="btn btn--primary" id="login-btn" type="button">ĐĂNG NHẬP</button>
                </div>
            </div>

            <div class="auth-form__socials">
                <a href="" class="auth-form__socials--facebook btn btn--size-s btn--width-icon">
                    <i class="auth-form__socials--icon fa fa-facebook-square" aria-hidden="true"></i>
                    <span class="auth-form__socials-title">Kết nối với FaceBook</span>
                </a>

                <a href="" class="auth-form__socials--google btn btn--size-s btn--width-icon">
                    <i class="auth-form__socials--icon fa fa-google" aria-hidden="true"></i>
                    <span class="auth-form__socials-title">Kết nối với Google</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- User profile placeholder after login -->
<li id="login"><a href="#" id="login"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a></li>
<li id="user" style="display: none;"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span id="username-display"></span></a></li>

<script src="./back_end/xuly.js"></script>
</body>
</html>
