$(".btn_addGH").on("click", function(){
    console.log(this.value.split("="));
    var tt = this.value.split("=");
    var id_nuochoa = tt[0];
    var ten_nuochoa = tt[1];
    var gt = tt[2];
    var xuatxu = tt[3];
    var dungtich = tt[4];
    var dongia = tt[5];
    var img_link = tt[6];
    if (document.cookie.indexOf("myCart") != -1) {
        var now = new Date();
        sp = {
        'id_nuochoa' : id_nuochoa,
        'ten_nuochoa' : ten_nuochoa,
        'gioitinh' : gt,
        'xuatxu' : xuatxu,
        'dungtich' : dungtich,
        'dongia' : dongia,
        'soluong' : 1,
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
                    $(".noticedGioHang").text("Thêm vào giỏ hàng chưa thành công do số lượng sản phẩm đã quá 20 sản phẩm!").css("color", "red");
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
    }else{
        var now = new Date();
        sp = [{
            'id_nuochoa' : id_nuochoa,
            'ten_nuochoa' : ten_nuochoa,
            'gioitinh' : gt,
            'xuatxu' : xuatxu,
            'dungtich' : dungtich,
            'dongia' : dongia,
            'soluong' : 1,
            'img_link' : img_link,
            'time': now,
        }]
        var myArrayJSON = JSON.stringify(sp);
        document.cookie = "myCart=" + myArrayJSON;
        tongSanPham = sp.reduce((tong, arr) => tong + arr.soluong, 0);
        $(".numberOfCart").text(tongSanPham);
    }
})