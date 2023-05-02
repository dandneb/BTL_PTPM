$(document).ready(async function () {
    let form_datas = new FormData();
    let res = await $.ajax({
        url: "index.php?controller=NuocHoa&action=getKienThuc&all="+pl,
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_datas,
        type: 'post',
    });
    myArr = JSON.parse(res).data;
    var data = myArr;
    var container = $('#myList');
    container.pagination({
        dataSource: data,
        totalNumber: data.length,
        pageSize: 3,
        formatResult: function (data) {
            var result = [];
            for (var i = 0, len = data.length; i < len; i++) {
                var date = moment(data[i].ngaydang, "YYYY-MM-DD");
                var formattedDate = date.format("DD/MM/YYYY");
                var mota = data[i].mota;
                if(mota.length > 360){
                    mota = mota.substr(0, 360) + '...';
                }
                result.push(`<div class="col-md-12 mb-3">
                                <a class="blog-item-thumbnail" href="index.php?controller=NuocHoa&action=BaiViet&id_baiviet=${data[i].id_baiviet_blog}">
                                    <img src="${data[i].img_link}" alt="">
                                </a>
                                <div class="blog-items-main">
                                    <div>
                                        <a>
                                            <h6>${data[i].tieude}</h6>
                                        </a>
                                        <p class="post-time">${formattedDate} - PARFUMERIEVN</p>
                                    </div>
                                    <p class="mt-3" data-toggle="tooltip" title="${data[i].mota}">${mota}</p>
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
            dataHtml+="</div>";
            container.prev().html(dataHtml);
        }
    })
})