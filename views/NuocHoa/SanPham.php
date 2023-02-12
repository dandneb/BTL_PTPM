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
            <div class="section-sp col-md-3 me-3 border p-0">
                <div class="accordion" id="accordionPanelsStayOpenExample" style="padding: 10px;">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button rounded-0 border" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <p class="p-14-bold">BỘ LỌC <br> <span class="p-12"> Giúp lọc nhanh sản phẩm bạn tìm kiếm</span></p>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div>
                                    <p class="p-14-bold">Thương hiệu</p>
                                    <div class="trademark">
                                        <?php
                                        for ($i = 0; $i < 10; $i++) {
                                        ?>
                                            <div class="form-check" style="height:35px">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label p-15" style="opacity: 0.8;" for="flexCheckDefault">
                                                    Default checkbox
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="border-bottom mt-2"></div>
                                <div style="margin-top:16px;">
                                    <p class="p-14-bold">Giá sản phẩm</p>
                                    <div class="product-price-sp">
                                        <?php
                                        $array = [
                                            'Giá dưới 100.000đ',
                                            '100.000đ - 200.000đ',
                                            '200.000đ - 300.000đ',
                                            '300.000đ - 500.000đ',
                                            '500.000đ - 1.000.000đ',
                                            'Giá trên 1.000.000đ',
                                        ];
                                        for ($i = 0; $i < 6; $i++) {
                                        ?>
                                            <div class="form-check" style="height:35px">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label p-15" style="opacity: 0.8;" for="flexCheckDefault">
                                                    <?php echo $array[$i] ?>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-product-sp col-md-8 border">
                <div style="padding: 10px;">
                    <h4>Nước hoa Nam chính hãng</h4>
                    <span class="p-15-bold">Xếp theo: </span>
                    <map style="margin-top:10px; margin-left: 10px;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label p-15" for="inlineRadio1">Hàng mới</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label p-15" for="inlineRadio2">Giá từ thấp đến cao</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                            <label class="form-check-label p-15" for="inlineRadio3">Giá từ cao đến thấp</label>
                        </div>
                    </map>
                    <hr>
                    <div class="container-fluid">
                        <div class="row">
                            <?php
                            for ($i = 0; $i < 12; $i++) {
                            ?>
                                <div class="col-md-3">
                                    <div class="swiper-slide">
                                        <div class="card rounded-0 product border-0">
                                            <img src="images\Unisex\Maison Francis\Maison Francis Kurkdjian Grand Soir EDP.jpg" class="" alt="...">
                                            <div class="card-body">
                                                <p class="card-text p-14-bold">Maison Francis Kurkdjian Grand Soir EDP 4</p>
                                                <div class="vote">
                                                    <i class="bi bi-star text-warning"></i>
                                                    <i class="bi bi-star text-warning"></i>
                                                    <i class="bi bi-star text-warning"></i>
                                                    <i class="bi bi-star text-warning"></i>
                                                    <i class="bi bi-star text-warning"></i>
                                                </div>
                                                <div>
                                                    <div class="product-price p-14-bold text-success">
                                                        585.000đ - 5.100.000đ
                                                    </div>
                                                    <div class="product-menu hidden-menu">
                                                        <button class="btn-menu"><i class="bi bi-cart-plus text-success"></i></button>
                                                        <button class="btn-menu"><i class="bi bi-eye text-success"></i></button>
                                                        <button class="btn-menu"><i class="bi bi-heart text-success"></i></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="row">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination d-flex justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link border-0" href="#" aria-label="Previous">
                                            <span aria-hidden="true" class="text-dark">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link text-dark border-0" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link text-dark border-0" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link text-dark border-0" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link border-0" href="#" aria-label="Next">
                                            <span aria-hidden="true" class="text-dark">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3 me-3">

            </div>
            <div class="col-md-8 border">
                <div style="padding: 10px;">
                    <div class="paragraph-sp">
                        <p class="p-14">Nước hoa nam là sản phẩm nước hoa/dầu thơm dành cho nam giúp thể hiện phong cách, cá tính và mang lại một lợi thế giúp thu hút người đối diện hoặc những người xung quanh. Để chọn nước hoa phù hợp với bản thân thì có nhiều cách từ việc phù hợp với lứa tuổi, theo phong cách, theo mùa,… Thì việc xịt nước hoa cũng giúp cho nước hoa Nam thể hiện hết “sức mạnh” của chúng.</p>
                        <p class="p-14">Tại Parfumerie chúng tôi đang bán hơn 150 loại nước hoa Nam từ các thương hiệu nước hoa nổi tiếng như: Clive Christian, Nasomatto, Tom Ford, Armaf, Calvin Klein,… Chúng tôi có cung cấp nước hoa Fullbox cũng như các sản phẩm <span class="p-14-bold">nước hoa chiết Nam chính hãng</span> nhiều dung tích phù hợp với nhu cầu của bạn.</p>
                        <h4>Vì sao nam giới nên sử dụng nước hoa</h4>
                        <p class="p-14">Hiện nay, nước hoa không chỉ dành cho nữ giới mà nước hoa Nam chính hãng cũng càng ngày được ưa chuột. Nước hoa như là một phụ kiện cao cấp giúp cho nam giới toát lên phong độ và thể hiện cá tính riêng của bản thân.</p>
                        <h4>
                            Nước hoa nam thể hiện phong cách của người đàn ông
                        </h4>
                        <p class="p-14">
                            Bên cạnh trang phục thì nước hoa cũng giúp cho người đối diện nhớ đến mùi thơm của bạn. Chọn loại nước hoa nam phù hợp cũng giúp cho bạn tạo cá tính riêng cũng như thể hiện được bản thân, và ấn tượng riêng đến với người xung quanh.
                        </p>
                        <h4>
                            Mang đến sự tự tin cho nam giới
                        </h4>
                        <p class="p-14">
                            Nước hoa/ dầu thơm nam cũng giúp cho nam giới che đi mùi cơ thể nhanh chóng, mang đến sự tự tin khi tiếp xúc với người xung quanh. Sử dụng nước hoa nam chính hãng giúp cho mùi thơm được lưu giữ lâu hơn và nước hoa sẽ là “cứu cánh” cho bạn trong nhiều trường hợp.
                        </p>
                        <h4>
                            Gây sự chú ý với người xung quanh
                        </h4>
                        <p class="p-14">
                            Nhiều nghiên cứu chỉ ra rằng, chị em cũng như những người xung quanh sẽ bị thu hút bởi mùi thơm nhẹ nhàng, dễ chịu từ người đàn ông (không phải mùi quá nồng gắt).
                        </p>
                        <h4>
                            Nên mua nước hoa Nam chiết chính hãng hay nước hoa Nam full box chính hãng
                        </h4>
                        <p class="p-14">
                            Nước hoa chiết là nước hoa có dung tích nhỏ hơn thông thường, được chiết từ những chai nước hoa full box/full seal. Mục tiêu của những chai nước hoa chiết Nam này là giúp cho người tiêu dùng có thể thử sử dụng các mùi khác nhau trên cơ thể hoặc có thể dễ dàng mang theo trong các chuyến đi du lịch hay công tác.
                        </p>
                        <p class="p-14">
                            Để trả lời cho câu hỏi là nên mua nước hoa Nam chiết hay nước hoa Nam full seal thì câu trả lời là tùy theo nhu cầu của bạn.
                        </p>
                        <p class="p-14">
                            Nếu bạn đã lựa chọn được dòng nước hoa và thương hiệu phù hợp với bản thân thì nước hoa Nam full box sẽ là lựa chọn tối ưu.
                        </p>
                        <p class="p-14">
                            Nếu bạn còn chưa biết sử dụng hương nào hay muốn có nhiều mùi để thay đổi thì nước hoa chiết Nam tại Parfumerie là lựa chọn phù hợp cho bạn.
                        </p>
                        <h4>
                            Cách chọn nước hoa Nam phù hợp theo độ tuổi
                        </h4>
                        <p class="p-14">
                            Chọn nước hoa Nam theo tuổi giúp khẳng định cá tính và tính cách riêng của bản thân người sử dụng. Đây là vũ khí tối thượng của người đàn ông giúp chinh phục người đối diện. Tuy nhiên, để có thể chọn nước hoa nam phù hợp bạn cần lưu ý những điều dưới đây.
                        </p>
                        <h4>
                            Dưới 20 tuổi
                        </h4>
                        <p class="p-14">
                            Đây là độ tuổi đầy nhiệt huyết, năng động và muốn làm mọi thứ mà bản thân cảm thấy thích thú. Hãy chọn nước hoa táo bạo, tuổi trẻ và đầy gợi cảm điều này sẽ thể hiện được bản thân là một con người mạnh mẽ và trẻ trung.
                        </p>
                        <h4>
                            21 đến 25 tuổi
                        </h4>
                        <p class="p-14">
                            Độ tuổi vừa bước vào cuộc đời, bắt đầu có công việc cũng như bắt đầu trưởng thành hơn. Đây là lúc bạn chọn mùi hương mới mẻ, tươi trẻ và thể hiện sự mãnh liệt của một tình yêu nghiêm túc, ngọt ngào và bền vững.
                        </p>
                        <h4>
                            25 đến 32 tuổi
                        </h4>
                        <p class="p-14">
                            Đây là độ tuổi cho sự thăng tiến trong sự nghiệp và một gia đình trong tương lai. Hãy chọn một mùi hương toát ra sự trưởng thành và chững chạc của bản thân.
                        </p>
                        <h4>
                            35 đến 45 tuổi
                        </h4>
                        <p class="p-14">
                            Độ tuổi của Nam đã trở thành người đàn ông với một sự nghiệp đang trên đà phát triển cũng là trụ cột của một gia đình, hay một người cha hoàn hảo, và cũng có thể là một người sếp tuyệt vời. Hương thơm nam tính, với mùi hương gỗ ấm áp là sự lựa chọn hoàn hảo bởi nó mang đến vẻ đẹp cổ điển và tôn lên nét thanh lịch của người sử dụng.
                        </p>
                        <h4>
                            46 tuổi trở lên
                        </h4>
                        <p class="p-14">
                            Ở độ tuổi có gần như mọi điều bạn mong muốn của tuổi trẻ, Và điều hiển nhiên, bạn có thể bước đi với phong cách năng động và trẻ trung thời còn trẻ của bạn. Vì nếu không có những suy nghĩ ngu ngốc hay những thất bại thuở ấy thì bạn sẽ không trở thành người đàn ông như bây giờ.
                            Mùi hương của sự suy tư, sự dày dặn tràn đầy ấm áp và quyền lực sẽ thỏa mãn đam mê của bạn.
                        </p>
                        <h3>
                            Cách chọn nước hoa cho Nam theo loại sản phẩm
                        </h3>
                        <h4>

                        </h4>
                        <p class="p-14">

                        </p>
                        <h4>

                        </h4>
                        <p class="p-14">

                        </p>
                        <h4>

                        </h4>
                        <p class="p-14">

                        </p>
                        <h4>

                        </h4>
                        <p class="p-14">

                        </p>
                        <h4>

                        </h4>
                        <p class="p-14">

                        </p>
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(window).resize(function() {
        if (window.matchMedia('(max-width: 1200px)').matches) {
            $( ".col-md-3" ).removeClass( "col-md-3" ).addClass( "col-md-6" );
            $( ".list-product-sp" ).removeClass( "col-md-8" ).addClass( "col-md-12" );
            //list-product-sp
            $( ".section-sp" ).removeClass( "col-md-3" ).addClass( "col-md-12" );
        }
        if (window.matchMedia('(min-width: 1200px)').matches) {
            $( ".col-md-6" ).removeClass( "col-md-6" ).addClass( "col-md-3" );
            $( ".list-product-sp" ).removeClass( "col-md-12" ).addClass( "col-md-8" );
            $( ".section-sp" ).removeClass( "col-md-12" ).addClass( "col-md-3" );
        }
    });
    $(".accordion-header").click(function(){
        if($(".section-sp").css("max-height")=="600px"){
            $(".section-sp").css("max-height", "105px");
        } 
        else{
            $(".section-sp").css("max-height", "600px");
        }
    });
</script>
<?php
require("views/template/footer.php");
?>