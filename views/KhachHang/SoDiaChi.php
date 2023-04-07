<?php
require("views/template/header.php");
?>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang tài khoản</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Sổ địa chỉ</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3 mt-5">
        <div class="row">
            <div class="col-md-3">
                <h5>TRANG TÀI KHOẢN</h5>
                <p class="p-14-bold">Xin chào, <?php echo $kh[2] ?></p>
                <div class="mt-3">
                    <p class="p-14"><a href="index.php?controller=khachhang" class="text-decoration-none text-dark">Thông tin tài khoản</a></p>
                    <p class="p-14"><a href="index.php?controller=khachhang&action=DonHang" class="text-decoration-none text-dark">Đơn hàng của bạn</a></p>
                    <p class="p-14"><a href="index.php?controller=khachhang&action=DoiMatKhau" class="text-decoration-none text-dark">Đổi mật khẩu</a></p>
                    <p class="p-14-bold mb-3"><a href="index.php?controller=khachhang&action=SoDiaChi" class="text-decoration-underline text-dark">Sổ địa chỉ (<?php echo count($data) ?>)</a></p>
                </div>
            </div>
            <div class="col-md-9">
                <div class="border-bottom">
                    <h5>ĐỊA CHỈ CỦA BẠN</h5>
                    <div class="mb-3">
                        <button class="btn btn-submit rounded-0" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">THÊM ĐỊA CHỈ</button>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <?php
                                if(isset($_GET['success']))
                                    echo '<span class="text-sucess p-14">Thêm địa chỉ thành công!</span>';
                                else if(isset($_GET['error']))
                                    echo '<span class="text-danger p-14">Thêm địa chỉ thất bại!</span>';
                            ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <?php
                                if(isset($_GET['delete_success']))
                                    echo '<span class="text-sucess p-14">Xóa địa chỉ thành công!</span>';
                                else if(isset($_GET['delete_error']))
                                    echo '<span class="text-danger p-14">Xóa địa chỉ thất bại!</span>';
                            ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <?php
                                if(isset($_GET['update_success']))
                                    echo '<span class="text-sucess p-14">Cập nhật địa chỉ mặc định thành công!</span>';
                                else if(isset($_GET['update_error']))
                                    echo '<span class="text-danger p-14">Cập nhật địa chỉ mặc định thất bại!</span>';
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                    if(count($data)>0){
                        for($i = 0; $i < count($data); $i++){
                            $diachi = $data[$i]['diachi'].", ";
                            $phuongxa = ($data[$i]['phuongxa'] != NULL)?$data[$i]['phuongxa'].", ":"";
                            $quanhuyen = ($data[$i]['quanhuyen'] != NULL)?$data[$i]['quanhuyen'].", ":"";
                            $tinhthanh = ($data[$i]['tinhthanh'] != NULL)?$data[$i]['tinhthanh'].", ":"";
                            $quocgia = $data[$i]['quocgia'];
                            $address = $diachi.$phuongxa.$quanhuyen.$tinhthanh.$quocgia;
                ?>
                <div class="row">
                    <div class="col-md-9">
                        <p class="p-14-bold mt-4">Họ tên: <span class="p-14"><?php echo $data[$i]['hoten'] ?></span> <span class="text-success ms-3" style="font-size:10px;"><?php echo $data[$i]['macdinh'] == 1 ? "Địa chỉ mặc định" : "" ?></span></p>
                        <p class="p-14-bold mt-3">Địa chỉ: <span class="p-14"><?php echo $address ?></span></p>
                        <p class="p-14-bold mt-3">Điện thoại: <span class="p-14"><?php echo $data[$i]['dienthoai'] ?></span></p>
                        <p class="p-14-bold mt-3">Công ty: <span class="p-14"><?php echo $data[$i]['congty'] ?></span></p>
                        <p class="p-14-bold mt-3">Mã zip: <span class="p-14"><?php echo $data[$i]['mazip'] ?></span></p>
                    </div>
                    <?php
                    if($data[$i]['macdinh']==0){
                    ?>
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <div>
                            <form action="index.php?controller=khachhang&action=xoaDiaChi" method="POST">
                                <button onclick="return confirm('Bạn chắc chắn muốn xóa địa chỉ này?')" class="btn rounded-0 text-danger p-14" id="btn" value="<?php echo $data[$i]['id_diachi']; ?>" style="background-color: unset;" type="submit" name="submit-xoaDiaChi">Xóa địa chỉ</button>
                            </form>
                            <form action="index.php?controller=khachhang&action=datMacDinh" method="POST">
                                <button onclick="return confirm('Bạn chắc chắn muốn đặt địa chỉ này làm địa chỉ mặc định?')" class="btn rounded-0 text-success p-14" id="btn-update" value="<?php echo $data[$i]['id_diachi']; ?>" style="background-color: unset;" type="submit" name="submit-datMacDinh">Đặt làm mặc định</button>
                            </form>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <hr>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Modal Thêm địa chỉ -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm địa chỉ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation mt-3" action="index.php?controller=khachhang&action=insertDiaChi" method="POST" novalidate>
                    <div class="row g-3 modal-body">
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom01">Họ tên</label>
                            <input type="text" name="hoten" class="form-control" id="validationCustom01" placeholder="Họ tên" required>
                            <div class="invalid-feedback">
                                Hãy nhập tên của bạn!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom01">Số điện thoại</label>
                            <input type="text" name="dienthoai" class="form-control" id="validationCustom01" placeholder="Số điện thoại" required>
                            <div class="invalid-feedback">
                                Hãy nhập số điện thoại của bạn!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom01">Công ty</label>
                            <input type="text" name="congty" class="form-control" id="validationCustom01" placeholder="Công ty" required>
                            <div class="invalid-feedback">
                                Hãy nhập công ty của bạn!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom01">Địa chỉ</label>
                            <input type="text" name="diachi" class="form-control" id="validationCustom01" placeholder="Địa chỉ" required>
                            <div class="invalid-feedback">
                                Hãy nhập địa chỉ của bạn!
                            </div>
                        </div>
                        <div class="col-md-12" id="col-quocgia">
                            <label class="form-label" for="validationCustom01">Quốc gia</label>
                            <select class="form-select mb-3" name="country" id = "country" required>
                            </select>
                            <div class="invalid-feedback">
                                Hãy nhập quốc gia của bạn!
                            </div>
                        </div>
                        <div class="col-md-4 me-0" id="col-tinhthanh">
                            <label class="form-label" for="validationCustom01">Tỉnh thành</label>
                            <select class="form-select mb-3" name="province" id = "province" required>
                                <option selected disabled value="">---</option>
                                <option value='0'>OPTION</option>
                            </select>
                            <input type="hidden" name="tinhthanh" id="tinhthanh">
                            <div class="invalid-feedback">
                                Hãy chọn tỉnh thành của bạn!
                            </div>
                        </div>
                        <div class="col-md-4 me-0" id="col-quanhuyen">
                            <label class="form-label" for="validationCustom01">Quận huyện</label>
                            <select class="form-select mb-3" name="district" id = "district" disabled required>
                                <option selected disabled value="">---</option>
                                <option value='0'>OPTION</option>
                            </select>
                            <input type="hidden" name="quanhuyen" id="quanhuyen">
                            <div class="invalid-feedback">
                                Hãy chọn quận huyện của bạn!
                            </div>
                        </div>
                        <div class="col-md-4 me-0" id="col-phuongxa">
                            <label class="form-label" for="validationCustom01">Phường xã</label>
                            <select class="form-select mb-3" name="ward" id = "ward" disabled required>
                                <option selected disabled value="">---</option>
                                <option value='0'>OPTION</option>
                            </select>
                            <input type="hidden" name="phuongxa" id="phuongxa">
                            <div class="invalid-feedback">
                                Hãy chọn phường xã của bạn!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="validationCustom01">Mã Zip</label>
                            <input type="text" name="mazip" class="form-control" id="validationCustom01" placeholder="Mã Zip" required>
                            <div class="invalid-feedback">
                                Hãy nhập mã zip của bạn!
                            </div>
                        </div>
                        <div class="col-md-12 form-check">
                            <div class="ps-2">
                                <input class="form-check-input" name="macdinh" type="checkbox" value="1" id="flexCheckIndeterminate">
                                <label class="form-check-label p-14" for="flexCheckIndeterminate">
                                    Đặt làm địa chỉ mặc định
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 modal-footer">
                        <div class="col-md-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" name="submit" class="btn btn-primary">Thêm địa chỉ</button>
                        </div>
                    </div>
                </form>
            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.5/axios.min.js"></script>
<script src="js/diachi.js"></script>
<script src="js/ajax.js"></script>
<?php
require("views/template/footer.php");
?>