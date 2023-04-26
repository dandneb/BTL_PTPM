    <footer class="container-fluid bg-success text-white">
        <div class="container container-footer">
            <div class="row">
                <div class="col-md-3 mt-4">
                    <p class="p-14-bold">VỀ PARFUMERIE</p>
                    <span class="p-14">Trang chủ</span> <br>
                    <span class="p-14">Giới thiệu</span> <br>
                    <span class="p-14">Sản phẩm</span> <br>
                    <span class="p-14">Liên hệ</span>
                </div>
                <div class="col-md-3 mt-4">
                    <p class="p-14-bold">HƯỚNG DẪN</p>
                    <span class="p-14">Hướng dẫn mua hàng</span> <br>
                    <span class="p-14">Hướng dẫn thanh toán</span> <br>
                    <span class="p-14">Hướng dẫn giao nhận</span> <br>
                    <span class="p-14">Điều khoản sử dụng</span>
                </div>
                <div class="col-md-3 mt-4">
                    <p class="p-14-bold">CHÍNH SÁCH</p>
                    <span class="p-14">Chính sách mua hàng</span> <br>
                    <span class="p-14">Chính sách bảo mật thông tin</span> <br>
                    <span class="p-14">Chính sách giao hàng</span> <br>
                    <span class="p-14">Chính sách đổi trả - bảo hành</span>
                </div>
                <div class="col-md-3 mt-4">
                    <p class="p-14-bold">HỖ TRỢ</p>
                    <span class="p-14">Tìm kiếm</span> <br>
                    <span class="p-14">Đăng nhập</span> <br>
                    <span class="p-14">Đăng ký</span> <br>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <p class="p-14-bold">PHƯƠNG THỨC THANH TOÁN</p>
                    <div class="d-flex flex-row">
                        <div style="align-items: center;" class="me-3">
                            <span class="material-icons">
                                account_balance
                            </span>
                            <p class="p-13">Internet Banking</p>
                        </div>
                        <div style="align-items: center;">
                            <span class="material-icons">
                                payments
                            </span>
                            <p class="p-13">Tiền Mặt </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <p class="p-14-bold">KẾT NỐI VỚI CHÚNG TÔI</p>
                    <a href="" style="color: #3b5998;"><i class="fa-brands fa-facebook fa-xl me-3"></i></a>
                    <a href="" style="color: #1e88e5;"><i class="fa-brands fa-instagram fa-xl me-3"></i></a>
                    <a href="" style="color: #ff0000;"><i class="fa-brands fa-youtube fa-xl me-3"></i></a>
                    <a href="" style="color: #ff0000;" class="footer-connect"><img src="images\footer\map.png" alt=""></a>
                </div>
                <div class="col-md-6">
                    <p class="p-14-bold">ĐĂNG KÝ NHẬN TIN</p>
                    <p class="p-13">Nhận thông tin sản phẩm mới nhất, tin khuyến mãi và nhiều hơn nữa.</p>
                    <form class="row g-3" action="index.php?controller=KhachHang&action=DangKyNhanTin" id="formNhanTin" method="POST" onsubmit="return validateForm_2()">
                        <div class="col-md-4">
                            <input type="text" name="hoten" class="form-control" id="hoten" placeholder="Họ và tên" required>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email của bạn" required>
                            <span class="helpEmail p-12-bold"></span>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-submit" name="submit-btn" type="submit">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row text-center" style="background-color:#032119;">
            <p class="p-12 mt-2">Parfumerie.vn | Cung cấp bởi <a class="p-12 span-footer" href="">Sapo</a></p>
        </div>
    </footer>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/checkEmail.js"></script>
    <script src="https://kit.fontawesome.com/d9aa9ca0fe.js" crossorigin="anonymous"></script>
    <script src="js/footer.js"></script>
    </body>

    </html>