<?php
require("views/template/header.php");
?>
<head>
    <title>Đăng nhập</title>
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
            <div class="col-md-4 ms-2 me-2 mt-5 shadow-lg mb-5 bg-white pt-3 pb-3">
                <div>
                    <h5 class="text-center">ĐĂNG NHẬP TÀI KHOẢN</h5>
                    <p class="p-14 text-center mt-4">Nếu bạn đã có tài khoản, đăng nhập tại đây.</p>
                </div>
                <div>
                    <form class="row g-3 needs-validation" action="" method="POST" novalidate>
                        <div style="color: red">
                            <?php echo '<span>' . $error . '</span>' ?>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01 p-14-bold" class="form-label">Email hoặc Số điện thoại<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name = "taikhoan" value="<?php echo isset($_POST['taikhoan']) ? $_POST['taikhoan'] : "" ?>" placeholder="Email" required>
                            <div class="invalid-feedback" id="oldPassword-feedback">
                                Vui lòng nhập tài khoản của bạn!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom02 p-14-bold" class="form-label">Mật khẩu<span style="color:red;">*</span></label>
                            <input type="password" class="form-control" name="matkhau" placeholder="Mật khẩu" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập mật khẩu của bạn!
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-submit rounded-0 me-2" name="submit" type="submit">ĐĂNG NHẬP</button>
                        </div>
                    </form>
                </div>
                <div>
                    <p class="p-14 mt-3">Bạn chưa có tài khoản, <a href="index.php?controller=khachhang&action=dangky" class="text-decoration-none">đăng ký tại đây.</a></p>
                    <a href="" class="p-14 text-decoration-none text-dark">Quên mật khẩu?</a>
                </div>
                
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>