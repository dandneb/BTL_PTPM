$(document).ready(async function () {
    let form_datas = new FormData();
    try {
        form_datas.append('id_nuochoa', id_nuochoa);
        let res = await $.ajax({
            url: "index.php?controller=NuocHoa&action=getDanhGia",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_datas,
            type: 'post',
        });
        myArr = JSON.parse(res).data;
        localStorage.setItem('myArr', JSON.stringify(myArr));
        console.log(myArr)
        
        var data = myArr;
        function search_product(data) {
            var container = $('#myList');
            container.pagination({
                dataSource: data,
                totalNumber: data.length,
                pageSize: 10,
                formatResult: function (data) {
                    var result = [];
                    for (var i = 0, len = data.length; i < len; i++) {
                        var rate = Math.round(parseFloat(data[i].xephang));
                        var html_rate = '';
                        for(let j = 1; j <= rate; j++){
                            html_rate += '<i class="bi bi-star-fill text-warning me-1"></i>';
                        }
                        if(rate < 5){
                            for(let j = rate+1; j <= 5; j++){
                                html_rate += '<i class="bi bi-star text-warning me-1"></i>';
                            }
                        }
                        result.push(`<div class="d-flex justify-content-between">
                                        <p class="title-review p-13-bold mb-0 ms-2" style="font-size: 18px !important; font-weight: bold; opacity: 0.7">${data[i].hoten}</p>
                                        <p class="time-review p-13-bold mb-0 me-2" style="opacity: 0.8">${moment(data[i].ngaydanhgia, 'YYYY/MM/DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss')}</p>
                                    </div>
                                    <div class="content-reivew bg-white rounded p-1 mb-2" style="width:97%; margin-left:1.5%;">
                                        <div>
                                            <div class="vote">
                                                <span class="p-13-bold mb-0">Đánh giá:</span>
                                                `+html_rate+`
                                            </div>
                                            <div>
                                                <span class="p-13-bold mb-0">Nhận xét:</span> <span class="p-13 mb-0">${data[i].noidungdanhgia}</span>
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
            search_product(myArr);
        }else{
            var link = '';
            if(login == false)
                link = '<a href="index.php?controller=KhachHang&action=DangNhap"><button class="rounded text-white border-0" style="padding:4px; background-color:#80BB35;">Gửi đánh giá của bạn</button></a>';
            else
                link = '<a href="index.php?controller=KhachHang&action=DonHang"><button class="rounded text-white border-0" style="padding:4px; background-color:#80BB35;">Gửi đánh giá của bạn</button></a>';
            $(".main-review").html(`<div class="col-md-12 border d-flex justify-content-center" style="margin-left: 1.5%; width: 97%; background-color:#F2F8EA">
                                        <div class="nav-review" style="padding: 25px 0px">
                                            <p class="p-14 text-center">Hiện tại sản phẩm chưa có đánh giá nào, bạn hãy trở thành người đầu tiên đánh giá cho sản phẩm này</p>
                                            <div class="d-flex justify-content-center">
                                                `+link+`
                                            </div>
                                        </div>
                                    </div>`);
        }
    } catch (error) {
        console.log(error);
    }
})