<?php
require("views/template/header.php");
?>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <!--<li class="breadcrumb-item"><a href="#" class="text-decoration-none p-14 text-dark">Nước hoa Le Labo</a></li> -->
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Nước hoa Nam chính hãng</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 me-3 border p-0">
                <div class="accordion" id="accordionPanelsStayOpenExample" style="padding: 10px;">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button rounded-0 border" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <p class="p-14-bold">BỘ LỌC <br> <span class="p-12"> Giúp lọc nhanh sản phẩm bạn tìm kiếm</span></p>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <p class="p-14-bold">Thương hiệu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 border">
                OK
                
            </div>
        </div>
    </div>
</main>
<?php
require("views/template/footer.php");
?>