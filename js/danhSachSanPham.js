var myArr = JSON.parse(localStorage.getItem('myArr')) || [];
$(document).ready(async function () {
    let form_datas = new FormData();
    var urls = "";
    if(check == 0){
        urls = "index.php?controller=NuocHoa&action=getNuocHoa&name="+names+"&filter=" + filter;
    }else{
        urls = "index.php?controller=NuocHoa&action=queryNuocHoa&query="+query;
    }
    try {
        let res = await $.ajax({
            url: urls,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_datas,
            type: 'post',
        });
        myArr = JSON.parse(res).data;
        localStorage.setItem('myArr', JSON.stringify(myArr));
        var data = myArr;
        function search_product(data) {
            var container = $('#myList');
            container.pagination({
                dataSource: data,
                totalNumber: data.length,
                pageSize: 6,
                formatResult: function (data) {
                    var result = [];
                    for (var i = 0, len = data.length; i < len; i++) {
                        result.push(`<div class="col-md-4">
                    <div class="swiper-slide text-decoration-none">
                        <div class="card rounded-0 product border-0">
                            <a style="height: 232px; display: flex; justify-content:center;" href="index.php?controller=NuocHoa&action=ThongTin&id_nuochoa=${data[i].id_nuochoa}">
                                <img src="${data[i].img_link}" alt="" class="product-img">
                            </a>
                            <div class="card-body">
                                <p class="card-text p-14-bold title-product text-black">${data[i].ten_nuochoa}</p>
                                <div class="vote">
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                </div>
                                <div>
                                    <div class="product-price p-14-bold text-success">
                                        ${data[i].min_gia.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) + " - " + data[i].max_gia.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}
                                    </div>
                                    <div class="product-menu hidden-menu">
                                        <button class="btn-menu" style="padding: 6px;"><i class="bi bi-cart-plus text-success"></i></button>
                                        <button class="btn-menu" style="padding: 6px;"><i class="bi bi-eye text-success"></i></button>
                                        <button class="btn-menu" style="padding: 6px;"><i class="bi bi-heart text-success"></i></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`);
                    }
                    return result;
                },
                callback: function (data, pagination) {
                    var dataHtml = '<div class="row">';
                    var pageStart = (pagination.pageNumber - 1) * pagination.pageSize;
                    var pageEnd = pageStart + pagination.pageSize;
                    var pageItems = data.slice(pageStart, pageEnd);
                    $.each(data, function (index, item) {
                        dataHtml += item;
                    });
                    dataHtml += '</div>';
                    container.prev().html(dataHtml);
                }
            })
        }
        if(myArr.length > 0){
            search_product(myArr)
        }else{
            search_product(myArr)
            $('#pagination-container').html("<p>Không tìm thấy sản phẩm phù hợp!</p>").css("color", "green").css("text-align", "center");
        }
        var selected = []
        var costs = []
        var newArr = []
        var selectedValue = "";
        var checker = false;
        $(".check-box-th").change(function(){
            if($(this).is(':checked')){
                selected.push($(this).val())
                newArr = myArr.filter(function(item){
                    return selected.includes(item.id_thuonghieu)
                })
                if(costs.length > 0){
                    newArr = newArr.filter(function(item){
                        for(let i = 0; i < costs.length; i++){
                            let cost = costs[i].split("_");
                            if(parseInt(item.min_gia) >= parseInt(cost[0]) && parseInt(item.min_gia) <= parseInt(cost[1])){
                                return true;
                            }
                        }
                        return false;
                    })
                }
                if(selectedValue != ""){
                    if(selectedValue == 0){
                        newArr.sort(function(a, b) {
                            return new Date(b.ngaybat_dauban) - new Date(a.ngaybat_dauban);
                        });
                    }else if(selectedValue == 1){
                        newArr.sort(function(a, b) {
                            return a.min_gia - b.min_gia;
                        });
                    }else{
                        newArr.sort(function(a, b) {
                            return b.min_gia - a.min_gia;
                        });
                    }
                }
                if(newArr.length > 0){
                    search_product(newArr)
                }else{
                    search_product(newArr)
                    $('#pagination-container').html("<p>Không tìm thấy sản phẩm phù hợp!</p>").css("color", "green").css("text-align", "center");
                }
            }else{
                var index = selected.indexOf($(this).val());
                if (index > -1) {
                    selected.splice(index, 1);
                }
                if(selected.length > 0){
                    newArr = myArr.filter(function(item){
                        return selected.includes(item.id_thuonghieu)
                    })
                    if(costs.length > 0){
                        newArr = newArr.filter(function(item){
                            for(let i = 0; i < costs.length; i++){
                                let cost = costs[i].split("_");
                                if(parseInt(item.min_gia) >= parseInt(cost[0]) && parseInt(item.min_gia) <= parseInt(cost[1])){
                                    return true;
                                }
                            }
                            return false;
                        })
                    }
                    if(selectedValue != ""){
                        if(selectedValue == 0){
                            newArr.sort(function(a, b) {
                                return new Date(b.ngaybat_dauban) - new Date(a.ngaybat_dauban);
                            });
                        }else if(selectedValue == 1){
                            newArr.sort(function(a, b) {
                                return a.min_gia - b.min_gia;
                            });
                        }else{
                            newArr.sort(function(a, b) {
                                return b.min_gia - a.min_gia;
                            });
                        }
                    }
                    if(newArr.length > 0){
                        search_product(newArr)
                    }else{
                        search_product(newArr)
                        $('#pagination-container').html("<p>Không tìm thấy sản phẩm phù hợp!</p>").css("color", "green").css("text-align", "center");
                    }
                }else{
                    if(costs.length > 0){
                        newArr = myArr.filter(function(item){
                            for(let i = 0; i < costs.length; i++){
                                let cost = costs[i].split("_");
                                if(parseInt(item.min_gia) >= parseInt(cost[0]) && parseInt(item.min_gia) <= parseInt(cost[1])){
                                    return true;
                                }
                            }
                            return false;
                        })
                        if(selectedValue != ""){
                            if(selectedValue == 0){
                                newArr.sort(function(a, b) {
                                    return new Date(b.ngaybat_dauban) - new Date(a.ngaybat_dauban);
                                });
                            }else if(selectedValue == 1){
                                newArr.sort(function(a, b) {
                                    return a.min_gia - b.min_gia;
                                });
                            }else{
                                newArr.sort(function(a, b) {
                                    return b.min_gia - a.min_gia;
                                });
                            }
                        }
                        if(newArr.length > 0){
                            search_product(newArr)
                        }else{
                            search_product(newArr)
                            $('#pagination-container').html("<p>Không tìm thấy sản phẩm phù hợp!</p>").css("color", "green").css("text-align", "center");
                        }
                    }else{
                        if(selectedValue != ""){
                            if(selectedValue == 0){
                                myArr.sort(function(a, b) {
                                    return new Date(b.ngaybat_dauban) - new Date(a.ngaybat_dauban);
                                });
                            }else if(selectedValue == 1){
                                myArr.sort(function(a, b) {
                                    return a.min_gia - b.min_gia;
                                });
                            }else{
                                myArr.sort(function(a, b) {
                                    return b.min_gia - a.min_gia;
                                });
                            }
                        }
                        search_product(myArr)
                    }
                }
            }
        })
        $(".price").change(function(){
            if($(this).is(':checked')){
                costs.push($(this).val())
                newArr = myArr.filter(function(item){
                    for(let i = 0; i < costs.length; i++){
                        let cost = costs[i].split("_");
                        if(parseInt(item.min_gia) >= parseInt(cost[0]) && parseInt(item.min_gia) <= parseInt(cost[1])){
                            return true;
                        }
                    }
                    return false;
                })
                if(selected.length > 0){
                    newArr = newArr.filter(function(item){
                        return selected.includes(item.id_thuonghieu)
                    })
                }
                if(selectedValue != ""){
                    if(selectedValue == 0){
                        newArr.sort(function(a, b) {
                            return new Date(b.ngaybat_dauban) - new Date(a.ngaybat_dauban);
                        });
                    }else if(selectedValue == 1){
                        newArr.sort(function(a, b) {
                            return a.min_gia - b.min_gia;
                        });
                    }else{
                        newArr.sort(function(a, b) {
                            return b.min_gia - a.min_gia;
                        });
                    }
                }
                if(newArr.length > 0){
                    search_product(newArr)
                }else{
                    search_product(newArr)
                    $('#pagination-container').html("<p>Không tìm thấy sản phẩm phù hợp!</p>").css("color", "green").css("text-align", "center");
                }
            }else{
                var index = costs.indexOf($(this).val());
                console.log(costs)
                if (index > -1) {
                    costs.splice(index, 1);
                }
                if(costs.length > 0){
                    newArr = myArr.filter(function(item){
                        for(let i = 0; i < costs.length; i++){
                            let cost = costs[i].split("_");
                            if(parseInt(item.min_gia) >= parseInt(cost[0]) && parseInt(item.min_gia) <= parseInt(cost[1])){
                                return true;
                            }
                        }
                        return false;
                    })
                    if(selected.length > 0){
                        newArr = newArr.filter(function(item){
                            return selected.includes(item.id_thuonghieu)
                        })
                    }
                    if(selectedValue != ""){
                        if(selectedValue == 0){
                            newArr.sort(function(a, b) {
                                return new Date(b.ngaybat_dauban) - new Date(a.ngaybat_dauban);
                            });
                        }else if(selectedValue == 1){
                            newArr.sort(function(a, b) {
                                return a.min_gia - b.min_gia;
                            });
                        }else{
                            newArr.sort(function(a, b) {
                                return b.min_gia - a.min_gia;
                            });
                        }
                    }
                    if(newArr.length > 0){
                        search_product(newArr)
                    }else{
                        search_product(newArr)
                        $('#pagination-container').html("<p>Không tìm thấy sản phẩm phù hợp!</p>").css("color", "green").css("text-align", "center");
                    }
                }else{
                    if(selected.length > 0){
                        newArr = newArr.filter(function(item){
                            return selected.includes(item.id_thuonghieu)
                        })
                        if(selectedValue != ""){
                            if(selectedValue == 0){
                                newArr.sort(function(a, b) {
                                    return new Date(b.ngaybat_dauban) - new Date(a.ngaybat_dauban);
                                });
                            }else if(selectedValue == 1){
                                newArr.sort(function(a, b) {
                                    return a.min_gia - b.min_gia;
                                });
                            }else{
                                newArr.sort(function(a, b) {
                                    return b.min_gia - a.min_gia;
                                });
                            }
                        }
                        if(newArr.length > 0){
                            search_product(newArr)
                        }else{
                            search_product(newArr)
                            $('#pagination-container').html("<p>Không tìm thấy sản phẩm phù hợp!</p>").css("color", "green").css("text-align", "center");
                        }
                    }else{
                        if(selectedValue != ""){
                            if(selectedValue == 0){
                                myArr.sort(function(a, b) {
                                    return new Date(b.ngaybat_dauban) - new Date(a.ngaybat_dauban);
                                });
                            }else if(selectedValue == 1){
                                myArr.sort(function(a, b) {
                                    return a.min_gia - b.min_gia;
                                });
                            }else{
                                myArr.sort(function(a, b) {
                                    return b.min_gia - a.min_gia;
                                });
                            }
                        }
                        search_product(myArr)
                    }
                    
                }
            }
        })
        $('input[name="sorted"]').click(function() {
            selectedValue = $(this).val();
            if(newArr.length > 0){
                if(selectedValue == 0){
                    newArr.sort(function(a, b) {
                        return new Date(b.ngaybat_dauban) - new Date(a.ngaybat_dauban);
                    });
                }else if(selectedValue == 1){
                    newArr.sort(function(a, b) {
                        return a.min_gia - b.min_gia;
                    });
                }else{
                    newArr.sort(function(a, b) {
                        return b.min_gia - a.min_gia;
                    });
                }
                search_product(newArr)
            }else if(newArr.length == 0 && costs.length > 0 || selected.length > 0){
                $('#pagination-container').html("<p>Không tìm thấy sản phẩm phù hợp!</p>").css("color", "green").css("text-align", "center");
            }else{
                if(selectedValue == 0){
                    myArr.sort(function(a, b) {
                        return new Date(b.ngaybat_dauban) - new Date(a.ngaybat_dauban);
                    });
                }else if(selectedValue == 1){
                    myArr.sort(function(a, b) {
                        return a.min_gia - b.min_gia;
                    });
                }else{
                    myArr.sort(function(a, b) {
                        return b.min_gia - a.min_gia;
                    });
                }
                search_product(myArr)
            }
        });
        var checker = false;
        $("#click-search").click(function (){
            var flags = false;
            if($("#search").val() !== ""){
                $(".trademark").html("");
                for(var i=0; i<thuonghieu.length; i++){
                    if (thuonghieu[i].ten_thuonghieu.toLowerCase().includes($("#search").val().toLowerCase())) {
                        $(".trademark").append(`
                        <div class="form-check" style="height:35px">
                            <input class="form-check-input check-box-th" type="checkbox" value="${thuonghieu[i].id_thuonghieu}">
                            <label class="form-check-label p-15" style="opacity: 0.8;" for="flexCheckDefault">
                                ${thuonghieu[i].ten_thuonghieu}
                            </label>
                        </div>
                        `);
                    }
                }
                checker = true;
                $("#danhSachSanPham").remove();
                $(".trademark").append('<script src="js/danhSachSanPham.js" id="danhSachSanPham"></script>');
            }else{
                if(checker == true){
                    $(".trademark").html("");
                    for(var i=0; i<thuonghieu.length; i++){
                        $(".trademark").append(`
                        <div class="form-check" style="height:35px">
                            <input class="form-check-input check-box-th" type="checkbox" value="${thuonghieu[i].id_thuonghieu}">
                            <label class="form-check-label p-15" style="opacity: 0.8;" for="flexCheckDefault">
                                ${thuonghieu[i].ten_thuonghieu}
                            </label>
                        </div>
                        `);
                    }
                    $("#danhSachSanPham").remove();
                    $(".trademark").append('<script src="js/danhSachSanPham.js" id="danhSachSanPham"></script>');
                    checker = false;
                }
            }
        })
        $("#search").on("input", function(){
            if(checker == true){
                if($("#search").val() == ""){
                    $(".trademark").html("");
                    for(var i=0; i<thuonghieu.length; i++){
                        $(".trademark").append(`
                        <div class="form-check" style="height:35px">
                            <input class="form-check-input check-box-th" type="checkbox" value="${thuonghieu[i].id_thuonghieu}">
                            <label class="form-check-label p-15" style="opacity: 0.8;" for="flexCheckDefault">
                                ${thuonghieu[i].ten_thuonghieu}
                            </label>
                        </div>
                        `);
                    }
                    $("#danhSachSanPham").remove();
                    $(".trademark").append('<script src="js/danhSachSanPham.js" id="danhSachSanPham"></script>');
                }
            }
        })

    } catch (error) {
        console.log(error);
    }
});


