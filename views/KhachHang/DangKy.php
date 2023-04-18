<?php
require("views/template/header.php");
?>
<style>
    #password{
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: var(--bs-body-color);
        background-color: var(--bs-form-control-bg);
        background-clip: padding-box;
        border: var(--bs-border-width) solid var(--bs-border-color);
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.375rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>
<head>
    <title>Đăng ký tài khoản</title>
</head>
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
            <div class="col-md-4 ms-2 me-2 mt-4 shadow-lg mb-5 bg-white pt-3 pb-3">
                <div>
                    <h5 class="text-center">ĐĂNG KÝ TÀI KHOẢN</h5>
                    <p class="p-14 text-center mt-4">Nếu bạn chưa có tài khoản, đăng ký tại đây.</p>
                </div>
                <div>
                    <form class="row g-3 needs-validation" action="" method="POST" onsubmit="return validationForm()" novalidate>
                        <div class="col-md-12">
                            <label for="validationCustom01 p-14-bold" class="form-label">Họ và tên<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="hoten" id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập họ và tên của bạn!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom02 p-14-bold" class="form-label">Email<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="email" id="email" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập email của bạn!
                            </div>
                            <span id="emailHelp" class="p-13"></span>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom03 p-14-bold" class="form-label">Số điện thoại<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="dienthoai" id="sdt" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập số điện thoại của bạn!
                            </div>
                            <span id="sdtHelp" class="p-13"></span>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom04 p-14-bold" class="form-label">Mật khẩu<span style="color:red;">*</span></label>
                            <input type="password" name="matkhau" id="password">
                            <span id="passwordHelp" class="p-13"></span>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center align-items-center">
                            <button class="btn btn-submit rounded-0 me-2" name="submit" type="submit">ĐĂNG KÝ</button>
                            <a class="p-14 text-dark" href="index.php?controller=khachhang&action=dangnhap">Đăng nhập</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>
<script src="js/ajax.js"></script>
<script>
    function validationForm(){
        console.log($("#emailHelp").text()==="Email hợp lệ có thể đăng ký");
        console.log($("#sdtHelp").text() === "Số điện thoại hợp lệ có thể đăng ký");
        console.log($("#password").val().length >= 8);
        if($("#emailHelp").text()==="Email hợp lệ có thể đăng ký" && $("#sdtHelp").text() === "Số điện thoại hợp lệ có thể đăng ký" && $("#password").val().length >= 8){
            return true;
        }else{
            if($("#password").val().length < 8){
                $("#passwordHelp").text("Mật khẩu chưa đủ 8 ký tự").css('color', 'red');
            }else{
                $("#passwordHelp").text("Mật khẩu hợp lệ").css('color', 'green');
            }
            return false;
        }
    }
</script>