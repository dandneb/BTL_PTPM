<?php
require("views/template/header.php");
?>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Giỏ hàng</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3 border">
        <div class="row border-bottom">
            <div class="col-md-12 mt-3">
                <h5>Giỏ hàng <span class="p-15">(1 sản phẩm)</span></h5>
            </div>
        </div>
        <form class="row border-bottom">
            <div class="col-md-9">
                <div class="row" style="padding: 15px 0px;">
                    <div class="col-md-3 card_gio_hang">
                        <img src="images\nuocHoaNam\Roja Dove\Roja Dove Elysium Pour Homme Parfum Cologne\7.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-7">
                                <a href="" class="p-14-bold" style="text-decoration:none; color:black;">Roja Dove Elysium Pour Homme Parfum Cologne - Nam / Anh / Chiết 10ml</a>
                            </div>
                            <div class="col-md-2">
                                <p class="p-15-bold">775.000₫</p>
                            </div>
                            <div class="col-md-3">
                                <div class="swatch">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn" type="button" style="border-radius: 0; background-color: unset !important; border: 1px solid #F1F1F1;">-</button>
                                        </div>
                                        <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" style="flex:none; width: 50px; border-left: 0; border-right: 0;" value="1">
                                        <div class="input-group-prepend">
                                            <button class="btn" type="button" style="border-radius: 0; background-color: unset !important; border: 1px solid #F1F1F1;">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a href="" class="p-14 a_giohang">Xóa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row border-bottom" style="padding: 15px 0px;">
                    <div class="col-md-12 d-flex flex-row justify-content-between">
                        <span class="p_cost">Tạm tính:</span>
                        <span class="p_cost">775.000₫</span>
                    </div>
                </div>
                <div class="row" style="padding: 15px 0px;">
                    <div class="col-md-12 d-flex flex-row justify-content-between mb-4">
                        <span class="p_cost mt-2">Thành tiền:</span>
                        <span class="p_cost" style="font-size:21px; color:#07503d;">1.345.000₫</span>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-success" type="submit" style="width: 100%;">MUA NGAY</button>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button class="btn" type="submit" style="width: 100%; background-color: white; color: #07503d; border: 1px solid #07503d">TIẾP TỤC MUA HÀNG</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php
require("views/template/footer.php");
?>