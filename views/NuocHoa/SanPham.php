<?php
require("views/template/header.php");
?>

<head>
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="style/pagination.css">
    <style>
        input:focus {
            outline: none !important;
            box-shadow: none !important;
            border: var(--bs-border-width) solid var(--bs-border-color);
        }
    </style>
    <link rel="stylesheet" href="style\splide-core.min.css">
    <link rel="stylesheet" href="style\splide.min.css">
    <link rel="stylesheet" href="style\ThongTin.css">
</head>
<main class="bg-white">
    <div class="container-fluid" style="background-color: #F9F9F9">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none p-14 text-dark">Trang chủ</a></li>
                    <!--<li class="breadcrumb-item"><a href="#" class="text-decoration-none p-14 text-dark">Nước hoa Le Labo</a></li> -->
                    <li class="breadcrumb-item active" aria-current="page"><span class="p-14 text-dark">Nước hoa Nam chính hãng</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container pb-3">
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
                                <?php
                                if (isset($_GET['gioitinh']) || isset($_GET['query']) || isset($_GET['all'])) {
                                ?>
                                    <div>
                                        <p class="p-14-bold">Thương hiệu</p>
                                        <form class="input-group input-group-sm mt-2 mb-2" role="search">
                                            <input type="search" aria-label="Search" class="form-control" id="search" name="search" placeholder="Tìm kiếm thương hiệu" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            <button type="button" class="btn btn-secondary" id="click-search" style="z-index: 1;"><span class="material-icons">search</span></button>
                                        </form>
                                        <div class="trademark p-2">
                                            <?php
                                            for ($i = 0; $i < count($th); $i++) {
                                            ?>
                                                <div class="form-check" style="height:35px">
                                                    <input class="form-check-input check-box-th" type="checkbox" value="<?php echo $th[$i]['id_thuonghieu'] ?>">
                                                    <label class="form-check-label p-15" style="opacity: 0.8;" for="flexCheckDefault">
                                                        <?php echo $th[$i]['ten_thuonghieu'] ?>
                                                    </label>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="border-bottom mt-2"></div>
                                <div style="margin-top:16px;">
                                    <p class="p-14-bold">Giá sản phẩm</p>
                                    <div class="product-price-sp p-2">
                                        <?php
                                        $array = [
                                            'Giá dưới 100.000đ',
                                            '100.000đ - 200.000đ',
                                            '200.000đ - 300.000đ',
                                            '300.000đ - 500.000đ',
                                            '500.000đ - 1.000.000đ',
                                            'Giá trên 1.000.000đ',
                                        ];
                                        $costs = [
                                            '0_100000',
                                            '100000_200000',
                                            '200000_300000',
                                            '300000_500000',
                                            '500000_1000000',
                                            '1000000_1000000000',
                                        ];
                                        for ($i = 0; $i < 6; $i++) {
                                        ?>
                                            <div class="form-check" style="height:35px">
                                                <input class="form-check-input price" type="checkbox" value="<?php echo $costs[$i] ?>">
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
                    <?php
                    if ($flags == 1) {
                    ?>
                        <h4>Nước hoa <?php echo $name_filter ?> chính hãng</h4>
                    <?php
                    } else if ($flags == 2) {
                    ?>
                        <h4>Kết quả tìm kiếm cho '<?php echo $query ?>'</h4>
                    <?php
                    } else {
                        echo "<h4>Tất cả sản phẩm</h4>";
                    }
                    ?>
                    <span class="p-15-bold">Xếp theo: </span>
                    <map style="margin-top:10px; margin-left: 10px;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sorted" id="inlineRadio1" value="0">
                            <label class="form-check-label p-15" for="inlineRadio1">Hàng mới</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sorted" id="inlineRadio2" value="1">
                            <label class="form-check-label p-15" for="inlineRadio2">Giá từ thấp đến cao</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sorted" id="inlineRadio3" value="2">
                            <label class="form-check-label p-15" for="inlineRadio3">Giá từ cao đến thấp</label>
                        </div>
                    </map>
                    <hr>
                    <div id="pagination-container"></div>
                    <div id="myList" class="container">

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3 me-3">

            </div>
            <div class="col-md-8 border mo_ta">
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
                            Chọn nước hoa theo thời gian lưu hương
                        </h4>
                        <p class="p-14">
                            Bạn có thể thấy được độ lưu hương của nước hoa trên bao bì của sản phẩm. Các thông số bạn có thể nhìn vào:
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Eau Fraiche: </span>
                            Là loại loãng nhất hiện nay chỉ có 1-3% tinh dầu, mùi hương lưu lại trong vòng 1-2 giờ.
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Eau de cologne: </span>
                            Có độ lưu hương thấp nhất khoảng 2 giờ, chứa khoảng 3-5% tinh dầu trong hỗn hợp cồn và nước.
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Eau de Toilette: </span>
                            Là loại nước hoa có độ lưu hương 3-5 giờ, chứa 5-8% dầu tinh chất.
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Eau de Parfum: </span>
                            Với hàm lượng tinh dầu tinh chất 16-20%, mùi hương sẽ lưu lại từ 6-8 tiếng.
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Parfum Classic: </span>
                            Là loại nước hoa đậm đặc nhất có thể lưu hương cả ngày, chứa khoảng 22-40% tinh dầu nguyên chất.
                        </p>
                        <h4>
                            Chọn nước hoa theo mùi hương:
                        </h4>
                        <p class="p-14">
                            Về cơ bản, nước hoa nam có những nhóm mùi sau đây:
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Aromatic (hương thơm mát): </span>
                            Đây là loại hương thơm của các loại cây thảo mộc như cây xô thơm, hương thảo, thì là, hoa oải hương và một số loài cây có sở hữu mùi cỏ thảo mộc nồng nàn.
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Citrus (hương Cam chanh): </span>
                            Chỉ cần nghe tên cũng biết được đây là mùi thơm của các loại cây họ chanh, cam như hương chanh, cam, cam bergamot, bưởi chùm hoặc quýt,... pha lẫn với các hương cam chanh trong nước hoa của nam giới.
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Floral (hương hoa cỏ): </span>
                            Nhóm hương này thường có sự góp mặt của hoa nhài, mẫu đơn, dành dành, huệ, linh lan, mộc lan, trinh nữ,….
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Woody (hương gỗ): </span>
                            Đây là nhóm các mùi hương từ gỗ như gỗ đàn hương, tuyết tùng, trầm hương, gỗ guaiac,...
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Leather (hương da thuộc): </span>
                            Nhóm hương da thuộc mang nhiều cung bậc âm hưởng từ mang hương hoa cỏ mượt mà đến mang hương vị chua, có mùi khói.
                        </p>
                        <h4>
                            Cách chọn nước hoa cho Nam theo mùa
                        </h4>
                        <p class="p-14">
                            <span class="p-14-bold">Mùa Hè: </span>
                            Với mùa nóng bạn nên chọn những loại nước hoa có mùi hương dịu nhẹ và sảng khoái. Giúp cho bạn và người xung quanh có cảm giác dễ chịu. Mùa này, một số mùi hương như: hương hoa hoắc hương mùi cam chanh sẽ khá phù hợp để bạn nam sử dụng vào mùa hè
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Mùa thu: </span>
                            Đây là thời điểm tiết trời mát mẻ, những dòng nước hoa chuyển tiếp từ hè sang thu hoặc có mùi nồng hơn là sự lựa chọn hoàn hảo. Hương quế là sự lựa chọn hoàn hảo tới mùa thu.
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Mùa đông: </span>
                            Mùa đông với tiết trời mát mẻ thì việc chọn mùi hương cũng khác với mùi hè. Ở mùa đông thì nước hoa sẽ lưu hương lâu hơn. Những mùi như mùi xạ hương hay mùi Spicy là một sự lựa chọn hoàn hảo nhất trong thời tiết lạnh.
                        </p>
                        <p class="p-14">
                            <span class="p-14-bold">Mùa xuân: </span>
                            Mùa xuất là mùi của cỏ cây hoa lá bắt đầu phát triển. Vì vậy,các bạn nam hãy chọn cho mình một mùi nước hoa nhẹ nhàng thuộc dạng mùi cam chanh tươi mát, đầy sức sống để có thể diễn tả lại sự ấm áp, dễ chịu của khí trời mùa xuân.
                        </p>
                        <h4>
                            Cách xịt nước hoa nam đúng cách
                        </h4>
                        <p class="p-14">
                            Chọn mùi nước hoa là một chuyện, sử dụng nước hoa nam đúng cách cũng là vấn đề bạn cần quan tâm. Để sử dụng phù hợp không nên sử dụng quá nhiều làm cho mùi nước hoa quá nồng. Hãy xịt vừa đủ và ở những vị trí chính xác sẽ giúp nước hoa lưu hương cũng như lan tỏa tốt hơn.
                        </p>
                        <p class="p-14">
                            Có hai vị trí xịt nước hoa nam giới cần ghi nhớ là cổ họng và vùng ngực. Tại đây nước hoa sẽ hòa quyện vào mùi của cơ thể bạn tạo ra một mùi hương đặc trưng dành cho chính bạn.
                        </p>
                        <p class="p-14">
                            Bạn chỉ nên xịt vào tai dành cho va chạm gần mà thôi. Bạn cũng có thể xịt nước hoa vào hai cổ tay để những mạch đập nơi cổ tay giúp bạn phân tán nước hoa đi khắp cơ thể.
                        </p>
                        <h4>
                            Địa chỉ mua nước hoa Nam chiết chính hãng
                        </h4>
                        <p class="p-14">
                            Ngày nay, nước hoa Nam là một thứ vũ khí vô hình giúp tăng sức quyến rủ cũng như lôi cuốn của bản thân. Việc lựa chọn và mua nước hoa nam chính hãng là điều cần thiết, bởi nước hoa hàng hiệu cho nam có giá không rẻ, vì vậy lựa chọn nước hoa/ dầu thơm nam chính hãng tại Parfumerie giúp bạn yên tâm hơn. Bởi chúng tôi cam kết tất cả sản phẩm bán ra đều là sản phẩm nước hoa chính hãng.
                        </p>
                        <p class="p-14">
                            Tại cửa hàng nước hoa Parfumerie - Chúng tôi cung cấp các sản phẩm nước hoa nam từ fullbox, nguyên seal đến các loại nước hoa chiết cho nam với giá cả phù hợp cũng như chất lượng chính hãng.
                        </p>
                    </div>
                    <div class="container-fluid btn-xemthem">
                        <div class="button-sp text-center">
                            <span class="btn btn-xt">XEM THÊM <span class="material-icons" style="transform:translateY(6px)">
                                    expand_more
                                </span></span>
                        </div>
                    </div>
                    <div class="container-fluid btn-rutgon">
                        <div class="text-center">
                            <span class="btn btn-rg">THU GỌN <span class="material-icons" style="transform:translateY(6px)">
                                    arrow_upward
                                </span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addYeuThichSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                    <div class="modal-body border-0 text-center" style="background-color: black; color: white; opacity: 0.9;">
                        <img src="images/ticket/check.png" id="imgNoticedYeuThich" alt="" style="max-height: 40px; max-width: 40px; margin: 0px auto 25px; display: block;">
                        <p class="noticedYeuThich">Thêm vào sản phẩm yêu thích thành công!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="thongTinSanPham" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="noticed" style="display: none;">
                                <img src="images/ticket/check.png" id="imgNoticedGioHang" alt="" style="max-height: 16px; max-width: 16px; display: block; margin-right: 10px">
                            </div>
                            <div class="noticed" style="display: none;">
                                <span class="noticedGioHang p-16-bold mb-0"></span>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-6">
                            <div class="container">
                                <div class="carousel-container position-relative row">
                                    <!-- Sorry! Lightbox doesn't work - yet. -->
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                        <div class="carousel-inner img-main">
                                            
                                        </div>
                                    </div>

                                    <!-- Carousel Navigation -->
                                    <div id="carousel-thumbs" class="carousel slide" data-ride="carousel" data-interval="false">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row mx-0 img-thumb-one">
                                                    
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="row mx-0 img-thumb-two">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev" style="transform: translateX(-39%);">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only text-black">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next" style="transform: translateX(39%);">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <h2 class="title-head mb-1 ten_nuochoa" style="font-size: 18px;">AAA</h2>
                                <p class="p-14 m-0">Tình trạng: <span class="p-14-bold tinhtrang"></span></p>
                                <p class="p-14 m-0">Thương hiệu: <span class="p-14-bold ten_thuonghieu"></span></p>
                                <p class="p-14 m-0 mb-2">Loại sản phẩm: <span class="p-14-bold loaisanpham"></span></p>
                            </div>
                            <div class="border-bottom border-top">
                                <p class="price-information mt-2 mb-2 gia_ban"></p>
                            </div>
                            <div class="mt-2">
                                <span class="mota" style="font-family:Trebuchet MS,Helvetica,sans-serif; color:#42495B"></span>
                            </div>
                            <div>
                                <div class="swatch">
                                    <p class="p-14-bold">Giới tính</p>
                                    <div class="swatch-element">
                                        <input id="swatch-0-nam" type="radio" name="option-0" class="bk-product-property">
                                        <label class="border text-uppercase gioitinh" for="swatch-0-nam" style="position: relative;">
                                            
                                        </label>
                                    </div>
                                </div>
                                <div class="swatch">
                                    <div class="swatch-element">
                                        <p class="p-14-bold">Xuất xứ</p>
                                        <input id="swatch-1-anh" type="radio" name="option-1" class="bk-product-property">
                                        <label class="border text-uppercase xuatxu" for="swatch-1-anh" style="position: relative;">
                                            
                                        </label>
                                    </div>
                                </div>
                                <div class="swatch" style="margin-top: 32px">
                                    <p class="p-14-bold">Dung tích</p>
                                    <div class="d-flex">
                                        <div class="swatch-element">
                                            <input id="swatch-2-chiet-10ml" type="radio" name="dungtich" class="bk-product-property dungtich">
                                            <label class="border chiet-10ml" for="swatch-2-chiet-10ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="<?php echo $gia_ban[0][0] ?>">
                                                
                                            </label>
                                        </div>
                                        <div class="swatch-element">
                                            <input id="swatch-2-chiet-20ml" type="radio" name="dungtich" class="bk-product-property dungtich">
                                            <label class="border chiet-20ml" for="swatch-2-chiet-20ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="<?php echo $gia_ban[1][0] ?>">
                                                
                                            </label>
                                        </div>
                                        <div class="swatch-element">
                                            <input id="swatch-2-fullbox-100ml" type="radio" name="dungtich" class="bk-product-property dungtich">
                                            <label class="border chiet-100ml" for="swatch-2-fullbox-100ml" style="position: relative;" data-toggle="tooltip" data-placement="top" title="<?php echo $gia_ban[2][0] ?>">
                                                
                                            </label>
                                        </div>
                                    </div>
                                    <div class="swatch gioHang">
                                        <p class="p-14-bold swatch">Số lượng</p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn" id="btn-reduceSoLuong" type="button" style="border-radius: 0; background-color: unset !important; border: 1px solid #F1F1F1;">-</button>
                                            </div>
                                            <input type="text" class="form-control" id="soluong" name="soluong" aria-describedby="basic-addon1" style="flex:none; width: 50px; border-left: 0; border-right: 0;" value="1">
                                            <div class="input-group-prepend">
                                                <button class="btn" id="btn-addSoLuong" type="button" style="border-radius: 0; background-color: unset !important; border: 1px solid #F1F1F1;">+</button>
                                            </div>
                                        </div>
                                        <span id="helpSoLuong" class="p-13"></span>
                                        <div class="container p-0">
                                            <button class="btn btn-success btn-lg btn-thongtin rounded-0 w-100" id="btn-addGioHang" type="button">
                                                <span class="txt-main">THÊM VÀO GIỎ HÀNG</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="container p-0 mt-3 hethang">
                                        <button class="btn btn-success btn-lg btn-thongtin rounded-0 d-flex flex-column justify-content-center align-items-center" disabled type="button">
                                            <span class="txt-main text-uppercase">Hết hàng</span>
                                            <span class="p-14">Liên hệ 0888070308</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(window).resize(function() {
        if (window.matchMedia('(max-width: 1200px)').matches) {
            $(".col-md-3").removeClass("col-md-3").addClass("col-md-6");
            $(".list-product-sp").removeClass("col-md-8").addClass("col-md-12");
            $(".mo_ta").removeClass("col-md-8").addClass("col-md-12");
            $(".section-sp").removeClass("col-md-3").addClass("col-md-12");

        }
        if (window.matchMedia('(min-width: 1200px)').matches) {
            $(".col-md-6").removeClass("col-md-6").addClass("col-md-3");
            $(".list-product-sp").removeClass("col-md-12").addClass("col-md-8");
            $(".mo_ta").removeClass("col-md-12").addClass("col-md-8");
            $(".section-sp").removeClass("col-md-12").addClass("col-md-3");
        }
    });
    $(".accordion-header").click(function() {
        if ($(".section-sp").css("max-height") == "600px") {
            $(".section-sp").css("max-height", "105px");
        } else {
            $(".section-sp").css("max-height", "600px");
        }
    });
    $(document).ready(function() {
        $(window).on('load', function() {
            $(".btn-xt").click(function() {
                $(".paragraph-sp").css("height", "100%");
                $(".btn-xemthem").css("display", "none");
                $(".btn-rutgon").css("display", "block");
            });
            $(".btn-rg").click(function() {
                $(".paragraph-sp").css("height", "350px");
                $(".btn-xemthem").css("display", "block");
                $(".btn-rutgon").css("display", "none");
            });
        });
    });
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js\splide.min.js" type="text/javascript"></script>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/ad153db3f4.js"></script>
<script src="js/pagination.js"></script>
<script src="js/danhSachSanPham.js" id="danhSachSanPham"></script>
<script src="js/nuocHoa.js" id="index-js"></script>
<script>
    $('#myCarousel').carousel({
    interval: false
});
$('#carousel-thumbs').carousel({
    interval: false
});

// handles the carousel thumbnails
// https://stackoverflow.com/questions/25752187/bootstrap-carousel-with-thumbnails-multiple-carousel
$('[id^=carousel-selector-]').click(function() {
    var id_selector = $(this).attr('id');
    var id = parseInt(id_selector.substr(id_selector.lastIndexOf('-') + 1));
    $('#myCarousel').carousel(id);
});
// Only display 3 items in nav on mobile.
if ($(window).width() < 575) {
    $('#carousel-thumbs .row div:nth-child(4)').each(function() {
        var rowBoundary = $(this);
        $('<div class="row mx-0">').insertAfter(rowBoundary.parent()).append(rowBoundary.nextAll().addBack());
    });
    $('#carousel-thumbs .carousel-item .row:nth-child(even)').each(function() {
        var boundary = $(this);
        $('<div class="carousel-item">').insertAfter(boundary.parent()).append(boundary.nextAll().addBack());
    });
}
$(window).resize(function() {
    var windowWidth = $(window).width();
    if (windowWidth < 768) {
        console.log("OK");
        $('#carousel-selector-6').attr('id', 'carousel-selector-3');
    } else {
        $('#carousel-selector-3').attr('id', 'carousel-selector-6');
    }
})
// Hide slide arrows if too few items.
if ($('#carousel-thumbs .carousel-item').length < 2) {
    $('#carousel-thumbs [class^=carousel-control-]').remove();
    $('.machine-carousel-container #carousel-thumbs').css('padding', '0 5px');
}
// when the carousel slides, auto update
$('#myCarousel').on('slide.bs.carousel', function(e) {
    var id = parseInt($(e.relatedTarget).attr('data-slide-number'));
    $('[id^=carousel-selector-]').removeClass('selected');
    $('[id=carousel-selector-' + id + ']').addClass('selected');
});
// when user swipes, go next or previous
$('#myCarousel').swipe({
    fallbackToMouseEvents: true,
    swipeLeft: function(e) {
        $('#myCarousel').carousel('next');
    },
    swipeRight: function(e) {
        $('#myCarousel').carousel('prev');
    },
    allowPageScroll: 'vertical',
    preventDefaultEvents: false,
    threshold: 75
});

$('#myCarousel .carousel-item img').on('click', function(e) {
    var src = $(e.target).attr('data-remote');
    if (src) $(this).ekkoLightbox();
});
</script>
<?php
require("views/template/footer.php");
?>