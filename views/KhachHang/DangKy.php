<?php
require("views/template/header.php");
?>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Đăng nhập</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3 border">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 ms-2 me-2 mt-5 shadow-lg mb-5 bg-white pt-3 pb-3">
                <div>
                    <h5 class="text-center">ĐĂNG KÝ TÀI KHOẢN</h5>
                    <p class="p-14 text-center mt-4">Nếu bạn chưa có tài khoản, đăng ký tại đây.</p>
                </div>
                <div>
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-12">
                            <label for="validationCustom01 p-14-bold" class="form-label">Họ<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập họ của bạn!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom02 p-14-bold" class="form-label">Tên<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="validationCustom02" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập tên của bạn!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom03 p-14-bold" class="form-label">Email<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập tài khoản email của bạn!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom04 p-14-bold" class="form-label">Mật khẩu<span style="color:red;">*</span></label>
                            <input type="password" class="form-control" id="validationCustom04" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập mật khẩu của bạn!
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center align-items-center">
                            <button class="btn btn-submit rounded-0 me-2" type="submit">ĐĂNG KÝ</button>
                            <a class="p-14 text-dark">Đăng nhập</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</main>
<script>
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
<?php
require("views/template/footer.php");
?>