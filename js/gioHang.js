$(document).ready(function(){
    if (document.cookie.indexOf("myCart") != -1) {
        var myArrayCookie = document.cookie.replace(/(?:(?:^|.*;\s*)myCart\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var myArray = JSON.parse(myArrayCookie);
        if(myArray.length > 0){
            myArray.forEach(function(item){
                $('.gio_hang').append(`
                <div class="row row-sp" style="padding: 15px 0px;">
                    <div class="col-md-3 card_gio_hang">
                        <img src="${item.img_link}" alt="">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-7">
                                <a href="" class="p-14-bold" style="text-decoration:none; color:black;">${item.ten_nuochoa + " / "+ item.gioitinh + " / "+ item.xuatxu + " / Chiết " + item.dungtich + "ml"}</a>
                            </div>
                            <div class="col-md-2">
                                <p class="p-15-bold">${parseInt(item.dongia).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</p>
                            </div>
                            <div class="col-md-3">
                                <div class="swatch">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-reduceSoLuong" type="button" style="border-radius: 0; background-color: unset !important; border: 1px solid #F1F1F1;">-</button>
                                        </div>
                                        <input type="text" class="form-control" style="flex:none; width: 50px; border-left: 0; border-right: 0;" value="${item.soluong}">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-addSoLuong" type="button" style="border-radius: 0; background-color: unset !important; border: 1px solid #F1F1F1;">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a class="p-14 xoaSanPham">Xóa</a>
                            </div>
                        </div>
                    </div>
                </div>
                `);
            })
            function re_caculator(myArray){
                var thanhtien = myArray.reduce((tong, arr) => tong + parseInt(arr.soluong)*parseInt(arr.dongia), 0);
                $(".tam-tinh").text(thanhtien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }))
                $(".thanh-tien").text(thanhtien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }))
                tongSanPham = myArray.reduce((tong, arr) => tong + arr.soluong, 0);
                $(".numberOfCart").text(tongSanPham);
                $(".slsp").text("("+tongSanPham+") sản phẩm.")
            }
            var thanhtien = myArray.reduce((tong, arr) => tong + parseInt(arr.soluong)*parseInt(arr.dongia), 0);
            $(".tam-tinh").text(thanhtien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }))
            $(".thanh-tien").text(thanhtien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }))
            $(".btn-addSoLuong").click(function() {
                var index = $('.btn-addSoLuong').index(this);
                var myArrayCookie = document.cookie.replace(/(?:(?:^|.*;\s*)myCart\s*\=\s*([^;]*).*$)|^.*$/, "$1");
                var myArray = JSON.parse(myArrayCookie);
                if(myArray[index].soluong < 100){
                    myArray[index].soluong += parseInt(1);
                    var input = $(this).closest('.input-group').find('input');
                    input.val(parseInt(input.val())+1);
                    var myArrayJSON = JSON.stringify(myArray);
                    document.cookie = "myCart=" + myArrayJSON;
                    re_caculator(myArray);
                }
            });
            $(".btn-reduceSoLuong").click(function() {
                var index = $('.btn-reduceSoLuong').index(this);
                var myArrayCookie = document.cookie.replace(/(?:(?:^|.*;\s*)myCart\s*\=\s*([^;]*).*$)|^.*$/, "$1");
                var myArray = JSON.parse(myArrayCookie);
                if(myArray[index].soluong > 1){
                    myArray[index].soluong -= parseInt(1);
                    var input = $(this).closest('.input-group').find('input');
                    input.val(parseInt(input.val())-1);
                    var myArrayJSON = JSON.stringify(myArray);
                    document.cookie = "myCart=" + myArrayJSON;
                    re_caculator(myArray);
                }
            });
            $(".xoaSanPham").click(function(){
                var inx = parseInt($('.xoaSanPham').index(this));
                var myArrayCookie = document.cookie.replace(/(?:(?:^|.*;\s*)myCart\s*\=\s*([^;]*).*$)|^.*$/, "$1");
                var myArray = JSON.parse(myArrayCookie);
                var newArray = myArray.filter((item, index) => index != inx);
                var myArrayJSON = JSON.stringify(newArray);
                document.cookie = "myCart=" + myArrayJSON;
                $(this).closest(".row-sp").html("");
                re_caculator(newArray);
                if(newArray.length < 1){
                    $(".row-main-giohang").html(`
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="images/ticket/empty-bags.jpg" style="max-width: 200px;" class="ms-auto me-auto">
                        <a href="index.php" class="btn btn-success mb-2 rounded-0" style="width: 20%;height: 100%;" >TIẾP TỤC MUA SẮM</a>
                    </div>
                    `);
                    document.cookie = "myCart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                }
            })
        }else{
            $(".row-main-giohang").html(`
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="images/ticket/empty-bags.jpg" style="max-width: 200px;" class="ms-auto me-auto">
                <a href="index.php" class="btn btn-success mb-2 rounded-0" style="width: 20%;height: 100%;" >TIẾP TỤC MUA SẮM</a>
            </div>
            `);
        }
    }else{
        $(".row-main-giohang").html(`
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img src="images/ticket/empty-bags.jpg" style="max-width: 200px;" class="ms-auto me-auto">
            <a href="index.php" class="btn btn-success mb-2 rounded-0" style="width: 20%;height: 100%;" >TIẾP TỤC MUA SẮM</a>
        </div>
        `);
        console.log("OK");
    }
})