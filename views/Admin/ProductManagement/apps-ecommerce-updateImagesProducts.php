<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
?>
<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['LoginOK']) && $_SESSION['LoginOK'][0] == "1" || $_SESSION['LoginOK'][0] == "2") {
    $ql = explode("_", $_SESSION['LoginOK']);
    require "views/Admin/templates/header.php";
?>
<?php
}
?>
<head>
    <!-- Font Awesome -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" /> -->
    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" /> -->
    <!-- MDB -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" /> -->
    <title>Sửa ảnh cho nước hoa</title>
    <style>
        .card-image-nuochoa{
            max-width: 100%;
            object-fit: cover;
            width: 100%;
            height: 250px;
        }
    </style>
</head>
    <div style="position: relative">
        <!-- Start Content-->
        <div class="container-fluid" style="position:relative;">
            <div class="row" style="position:static;">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Parfumerie</a></li>
                                <li class="breadcrumb-item"><a href="index.php?controller=nhanvien">Quản lý cửa hàng</a></li>
                                <li class="breadcrumb-item"><a href="index.php?controller=nhanvien&action=sanpham">Nước hoa</a></li>
                                <li class="breadcrumb-item active">Sửa ảnh nước hoa</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Sửa ảnh nước hoa</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 ms-auto me-auto">
                    <a class="btn btn-danger mt-2 mb-2">Sửa ảnh nước hoa</a>
                    <a class="btn btn-outline-secondary mt-2 mb-2">Mã nước hoa: <?php echo $id_nuochoa ?></a>
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
                </div>
                <div class="col-md-10 ms-auto me-auto">
                    <?php
                    if(count($anhnuochoa) < 10){
                    ?>
                    <form action="" method="post" class="needs-validation dropzone" id="myAwesomeDropzone" enctype="multipart/form-data" onsubmit="return validateForm()" novalidate>
                        <div id="tab-content">
                            <div class="tab-pane show active" id="file-upload-preview">
                                <div class="fallback">
                                    <input name="file[]" type="file" id="image" accept="image/png,image/jpeg,image/gif,image/ipg" style="display: none;" multiple>
                                </div>
                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Thêm ảnh cho nước hoa.</h3>
                                    <span class="text-muted font-14">(Chọn đúng định dạng file ảnh (png, jpg, jpeg, gif),
                                        hiện tại nước hoa <strong>đã có <?php echo count($anhnuochoa) ?></strong> ảnh và bạn chỉ được thêm <strong><?php echo 10-count($anhnuochoa) ?></strong> ảnh nữa thôi và với kích thước <strong>tối đa</strong> 5MB.)</span>
                                    <p id="soluong-image" style="text-align:center;"></p>
                                    <p id="error-image" style="text-align:center; color: red;"></p>
                                    <p id="success-image" style="text-align:center; color: green;"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <button class="btn btn-primary mt-2" id="submit-all" name="submit" type="submit">Thêm ảnh</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                </div>

                <div class="col-md-10 ms-auto me-auto d-flex justify-content-between">
                    <!-- Carousel wrapper -->
                    <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
                        <div class="py-4">
                            <!-- Single item -->
                            <div>
                                <div class="container">
                                    <div class="row image">
                                        <?php 
                                        for($i=0; $i < count($anhnuochoa); $i++){
                                            $anh = $anhnuochoa[$i];
                                            $name = explode("/", $anh['img_link'])[3];
                                        ?>
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <img src="<?php echo $anh['img_link'] ?>" class="card-img-top card-image-nuochoa" alt="Waterfall" style="cursor:pointer;"/>
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $name ?></h5>
                                                    <p class="card-text">
                                                        Mã ảnh: <?php echo $anh['id_anh'] ?>.
                                                    </p>
                                                    <div class="d-flex flex-row justify-content-center">
                                                        <form class="me-2" action="index.php?controller=nhanvien&action=xoaAnh" method="POST">
                                                            <button class="btn btn-danger" name="submit" value="<?php echo $anh['id_anh']."_".$id_nuochoa ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh này khỏi hệ thống?')" type="submit">Xóa ảnh</button>
                                                        </form>
                                                        <?php
                                                        if($anh['anhdaidien'] == 0){
                                                        ?>
                                                            <form class="ms-2" action="index.php?controller=nhanvien&action=setAnhDaiDien" method="POST">
                                                                <button class="btn btn-primary" name="submit-set" value="<?php echo $anh['id_anh']."_".$id_nuochoa ?>" onclick="return confirm('Bạn có chắc chắn muốn đặt ảnh này làm ảnh đại diện cho nước hoa?')" type="submit">Set ảnh đại diện</button>
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Inner -->
                    </div>
                    <!-- Carousel wrapper -->
                </div>
            </div>
        </div>
        <div class="gallery">
            <div class="gallery__inner" style="position:relative;">
                <i class="fa-sharp fa-regular fa-circle-xmark fa-2xl close" style="cursor:pointer"></i>
                <img src="images/HAUSAT82934/OEM82613FXJ/OEM82613FXJ_0.jpeg" alt="" style="cursor:pointer;"/>
            </div>
        </div>
    </div>
    <!-- container -->

    </div>
    <!-- content -->
    <script>
        var images = document.querySelectorAll(".image img");
        var close = document.querySelector(".close");
        var image_gallery = document.querySelector(".gallery__inner img")
        var gallery = document.querySelector(".gallery");
        images.forEach((item,index)=>{
            item.addEventListener("click", function(event){
                gallery.classList.add("show");
                image_gallery.src = item.src;
                event.preventDefault();
                document.body.style.overflow = 'hidden';
            })
        })
        close.addEventListener("click", function(){
            gallery.classList.remove("show");
            document.body.style.overflow = 'auto';
        })
    </script>
    
    <script>
        var content = document.getElementById("tab-content");
        var image = document.getElementById("image");
        const acceptedImageTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
        content.addEventListener("click", function() {
            image.click();
        })
        console.log(images.length);
        // Thêm sự kiện lắng nghe khi có file được chọn
        image.addEventListener("change", (event) => {
            var files = image.files;
            $("#soluong-image").html(files.length + " ảnh đã được chọn!")
            if (files.length > 10 - images.length) {
                $("#error-image").html(`Chỉ được thêm ${10 - images.length} ảnh nữa thôi!`)
                $("#success-image").html("")
            } else {
                check = true;
                Array.from(files).forEach((file, index) => {
                    if (check == true) {
                        if (!acceptedImageTypes.includes(file.type)) {
                            $("#error-image").html(file.name + " không đúng định dạng!")
                            $("#success-image").html("")
                            check = false;
                        } else if (file.size > 5 * 1024 * 1024) {
                            $("#error-image").html(file.name + " kích thước quá lớn!")
                            $("#success-image").html("")
                            check = false;
                        } else {
                            $("#error-image").html("")
                            $("#success-image").html("Perfect")
                        }
                    } else {

                    }
                })
            }
        });

        function validateForm() {
            if ($("#success-image").text() === "Perfect") {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <!-- end Footer -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script> -->
<?php
    require "views/Admin/templates/footer.php";
} else {
    header("location: index.php");
}
?>