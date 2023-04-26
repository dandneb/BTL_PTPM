<?php
require("views/template/header.php");
?>
<head>
    <title>Sản phẩm yêu thích</title>
</head>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Danh sách sản phẩm yêu thích</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3 mt-4">
        <div class="row">
            <h4>Danh sách sản phẩm yêu thích</h4>
            <div>
                <input type="text" class="form-control rounded-0" style="width: 270px;" placeholder="Tìm kiếm sản phẩm">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-12">
                <?php
                    if(isset($_SESSION['success'])){
                        echo '<span class="text-success">'.$_SESSION['success'].'</span>';
                        unset($_SESSION['success']);
                    }
                    else if(isset($_SESSION['error'])){
                        echo '<span class="text-danger">'.$_SESSION['error'].'</span>';
                        unset($_SESSION['error']);
                    }
                ?>
            </div>
        </div>
        <?php
        foreach($sanpham as $item){
        ?>
        <div class="row mt-3 border-bottom">
            <a class="col-md-2" href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item['id_nuochoa'] ?>">
                <img src="<?php echo $item['img_link'] ?>" alt="" style="width:100%; height: auto; object-fit:fill">
            </a>
            <a class="col-md-7 ps-4" href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=<?php echo $item['id_nuochoa'] ?>">
                <p class="p-15-bold text-main me-4"><?php echo $item['ten_nuochoa'] ?></p>
                <p class="p-15-bold text-main me-4"><?php echo $item['gioitinh'] ?> / <?php echo $item['xuatxu'] ?> / Chiết <?php echo $item['dungtich'] ?>ml</p>
                <p class="p-16-bold text-main me-4"><?php echo number_format($item['gia_ban'], 0, ",", ".") . " ₫"; ?></p>
                <p class="p-14 text-black"><?php echo $item['mota'] ?></p>
            </a>
            <div class="col-md-3">
                <div>
                    <?php
                    if($item['soluong'] == 0){
                    ?>
                    <button value="<?php echo $item['id_nuochoa']."=".$item['ten_nuochoa']."=".$item['gioitinh']."=".$item['xuatxu']."=".$item['dungtich']."=".$item['gia_ban']."=".$item['img_link'] ?>" class="btn rounded-0 text-success p-14 border mb-4 btn_addGH" style="background-color: unset;" type="button" data-bs-toggle="modal" data-bs-target="#addGioHangSuccess">Thêm vào giỏ hàng</button> <br>
                    <?php
                    }
                    ?>
                    <a onclick="return confirm('Bạn có chắn chắn muốn xóa sản phẩm này khỏi danh sách yêu thích?')" href="index.php?controller=KhachHang&action=xoaSanPhamYeuThich&id=<?php echo $item['id_nuochoa'].'_'.$item['dungtich'] ?>" class="text-success p-14">Xóa sản phẩm</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- Modal -->
        <div class="modal fade" id="addGioHangSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-body border-0 text-center" style="background-color: black; color: white; opacity: 0.9;">
                        <img src="images/ticket/check.png" id="imgNoticedGioHang" alt="" style="max-height: 40px; max-width: 40px; margin: 0px auto 25px; display: block;">
                        <p class="noticedGioHang">Thêm vào giỏ hàng thành công!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/yeuThich.js"></script>
<?php
require("views/template/footer.php");
?>