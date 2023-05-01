$(document).ready(function() {
    var chiet = -1;
    if (typeof so_luong !== 'undefined') {
        for(var i = 0; i < so_luong.length; i++){
            if(so_luong[i] == 0){
                chiet = i;
                break;
            }
        }
    }
    $(window).on('load', function() {
        $(".btn-xt").click(function() {
            $(".paragraph-sp").css("height", "100%");
            $(".btn-xemthem").css("display", "none");
            $(".btn-rutgon").css("display", "block");
        });
        $(".btn-rg").click(function() {
            $(".paragraph-sp").css("height", "700px");
            $(".btn-xemthem").css("display", "block");
            $(".btn-rutgon").css("display", "none");
        });
    });
    $("#swatch-2-chiet-10ml").click(function() {
        $(".price-information").text(gia_ban[0]);
        chiet = 0;
        $("#soluong").val(1);
    })
    $("#swatch-2-chiet-20ml").click(function() {
        $(".price-information").text(gia_ban[1]);
        chiet = 1;
        $("#soluong").val(1);
    })
    $("#swatch-2-fullbox-100ml").click(function() {
        $(".price-information").text(gia_ban[2]);
        chiet = 2;
        $("#soluong").val(1);
    })
    
    $("#btn-addSoLuong").click(function() {
        if (parseInt($("#soluong").val()) < 20 && so_luong[chiet] == 0) {
            $("#soluong").val(parseInt($("#soluong").val()) + 1);
        }
    })
    $("#btn-reduceSoLuong").click(function() {
        if (parseInt($("#soluong").val()) > 1 && so_luong[chiet] == 0) {
            $("#soluong").val(parseInt($("#soluong").val()) - 1);
        }
    })
    $("#soluong").on("input", function(){
        if(parseInt($(this).val()) > 0 && parseInt($(this).val()) <= 20){
            $("#helpSoLuong").text("Số lượng sản phẩm hợp lệ").css("color", "green");
        }else{
            $("#helpSoLuong").text("Số lượng sản phẩm chưa hợp lệ (Tối đa 20 sản phẩm)").css("color", "red");
        }
    })
    /*
    $("#btn-muaNgay").click(function() {
        if (document.cookie.indexOf("myCart") != -1) {
            var myArrayCookie = document.cookie.replace(/(?:(?:^|.*;\s*)myCart\s*\=\s*([^;]*).*$)|^.*$/, "$1");
            var myArray = JSON.parse(myArrayCookie);
            console.log(myArray);
        }
    })
    */
    $("#btn-addGioHang, #btn-muaNgay").click(function() {
        var dungtichValue = $('input[name=dungtich]:checked').val().split("_");
        if(parseInt($("#soluong").val()) > 0 && parseInt($("#soluong").val()) <= 20 && $("#soluong").val() != ""){
            if (document.cookie.indexOf("myCart") != -1) {
                var now = new Date();
                sp = {
                'id_nuochoa' : id_nuochoa,
                'ten_nuochoa' : ten_nuochoa,
                'gioitinh' : gt,
                'xuatxu' : xuatxu,
                'dungtich' : dungtichValue[0],
                'dongia' : dungtichValue[1],
                'soluong' : parseInt($("#soluong").val()),
                'img_link' : img_link,
                'time': now,
                }
                console.log(sp);
                var myArrayCookie = document.cookie.replace(/(?:(?:^|.*;\s*)myCart\s*\=\s*([^;]*).*$)|^.*$/, "$1");
                var myArray = JSON.parse(myArrayCookie);
                console.log(myArray);
                var check = false;
                var checkSL = false;
                $("#helpSoLuong").text("Số lượng sản phẩm hợp lệ").css("color", "green");
                $(".noticedGioHang").text("Thêm vào giỏ hàng thành công!").css("color", "white");
                $("#imgNoticedGioHang").attr("src", "images/ticket/check.png");
                myArray.forEach(function(item) {
                    if(item.id_nuochoa == sp.id_nuochoa && item.ten_nuochoa == sp.ten_nuochoa &&
                    item.gioitinh == sp.gioitinh && item.xuatxu == sp.xuatxu && item.dungtich == sp.dungtich
                    && item.dongia == sp.dongia && check == false){
                        if(parseInt(item.soluong) <= 20 - parseInt(sp.soluong)){
                            item.soluong = parseInt(item.soluong) + parseInt(sp.soluong);
                            check = true;
                        }else{
                            checkSL = true;
                            $("#helpSoLuong").text("Số lượng sản phẩm chưa hợp lệ (Tối đa 20 sản phẩm)").css("color", "red");
                            $("#imgNoticedGioHang").attr("src", "images/ticket/169779.png");
                            $(".noticedGioHang").text("Thêm vào giỏ hàng chưa thành công do số lượng sản phẩm chưa hợp lệ!").css("color", "red");
                        }
                    }
                })
                if(check==false && checkSL==false){
                    myArray.push(sp);
                    check = true;
                }
                var myArrayJSON = JSON.stringify(myArray);
                document.cookie = "myCart=" + myArrayJSON;
                tongSanPham = myArray.reduce((tong, arr) => tong + arr.soluong, 0);
                $(".numberOfCart").text(tongSanPham);
                $("#soluong").val(1);
            }else{
                var now = new Date();
                sp = [{
                    'id_nuochoa' : id_nuochoa,
                    'ten_nuochoa' : ten_nuochoa,
                    'gioitinh' : gt,
                    'xuatxu' : xuatxu,
                    'dungtich' : dungtichValue[0],
                    'dongia' : dungtichValue[1],
                    'soluong' : parseInt($("#soluong").val()),
                    'img_link' : img_link,
                    'time': now,
                }]
                var myArrayJSON = JSON.stringify(sp);
                document.cookie = "myCart=" + myArrayJSON;
                tongSanPham = sp.reduce((tong, arr) => tong + arr.soluong, 0);
                $(".numberOfCart").text(tongSanPham);
                $("#soluong").val(1);
            }
            if ($(this).attr("id") == "btn-muaNgay"){
                setTimeout(function() {
                    window.location = "index.php?controller=KhachHang&action=MuaHang";
                }, 500);
            }
        }else{
            $("#helpSoLuong").text("Số lượng sản phẩm chưa hợp lệ (Tối đa 20 sản phẩm)").css("color", "red");
            $("#imgNoticedGioHang").attr("src", "images/ticket/169779.png");
            $(".noticedGioHang").text("Thêm vào giỏ hàng chưa thành công do số lượng sản phẩm chưa hợp lệ!").css("color", "red");
        }
    })
});

$(document).on('click', '.addYeuThich', function() {
    var id_nuochoa = $(this).val();
    var dungtich = 10;
    if ($('input[type="radio"].dungtich').length > 0) {
        var selectedValue = $('input[type="radio"].dungtich:checked').val();
        if(selectedValue !== undefined){
            dungtich = selectedValue.split("_")[0];
        }
    }
    if(id_nuochoa!=""){
        let form_datas = new FormData();
        form_datas.append('id_nuochoa',id_nuochoa);
        form_datas.append('dungtich',dungtich);
        $.ajax({
            url: 'index.php?controller=KhachHang&action=themSanPhamYeuThich',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_datas,
            type: 'post',
            success: function(res) {
                var data = res;
                if(data == 0){
                    $("#imgNoticedYeuThich").attr("src", "images/ticket/169779.png");
                    $(".noticedYeuThich").text("Thêm vào sản phẩm yêu thích không thành công!").css("color", "red");
                }else if(data == 1){
                    $(".noticedYeuThich").text("Thêm vào sản phẩm yêu thích thành công!").css("color", "white");
                    $("#imgNoticedYeuThich").attr("src", "images/ticket/check.png");
                }else{
                    $("#imgNoticedYeuThich").attr("src", "images/ticket/169779.png");
                    $(".noticedYeuThich").text("Sản phẩm đã có trong danh sách yêu thích!").css("color", "red");
                }
            }
        });
        return false;
    }
})

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
/*
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
*/

$('#myCarousel .carousel-item img').on('click', function(e) {
    var src = $(e.target).attr('data-remote');
    if (src) $(this).ekkoLightbox();
});