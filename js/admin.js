function formatStringPrice(money){
    money_str = money.toString().split("").reverse().join("");
    len = Math.round(money_str.length/3);
    str_ = "";
    if(len < 0){
        return money_str;
    }else{
        for(let i = 0; i <= len; i++){
            if(i < len){
                str_ += money_str.substring(i*3, i*3+3)+".";
            }else{
                str_ += money_str.substring(i*3, i*3+3);
            }
        }
    }
    str_final = str_.split("").reverse().join("")+"đ";
    return str_final.charAt(0) === "." ? str_final.substring(1) : str_final;
}
function checkFileExists(url) {
    return fetch(url, {
        method: 'HEAD'
    }).then(response => {
            if (response.ok) {
                return true;
            } else {
                return false;
            }
        })
        .catch(() => {
            return false;
        });
}
var count = localStorage.getItem('count') || -1;
$(document).ready(function(){
    $(document).on('click', '.xemThongTin', function() {
        $('#xemChiTiet').attr('href', 'index.php?controller=NuocHoa&action=ThongTin&id_nuochoa='+this.value);
    })
    $(document).on('click', '#xoaCauHoi', function(){
        var selectedRows = $('#myTable').DataTable().rows({ selected: true });
        var row_data = selectedRows.data();
        var array = [];
        for(let i = 0; i < row_data.length; i++){
            array.push(row_data[i]);
        }
        if(array.length >0){
            let form_datas = new FormData();
            cauhoi = JSON.stringify(array);
            form_datas.append('cauhoi', cauhoi);
            $.ajax({
                url: 'index.php?controller=CauHoi&action=deleteQuestion',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    if(res.indexOf("~") == -1){
                        var count = res;
                        console.log(count);
                        selectedRows.remove().draw();
                        $.NotificationApp.send("Xóa câu hỏi thành công","Bạn đã xóa thành công những câu hỏi đã chọn","bottom-right","rgba(0,0,0,0.2)","success")
                    }else{
                        var arr_lost = [];
                        var result = res.split("~");
                        var count = result[0];
                        arr_lost = JSON.parse(result[1]);
                        selectedRows.remove().draw();
                        var id_cauhoi_arr = arr_lost.map(item => item.id_cauhoi);
                        var id_cauhoi_str = id_cauhoi_arr.join(',');
                        $.NotificationApp.send("Xóa câu hỏi thất bại", "Bạn đã xóa thành công 1 vài câu hỏi đã chọn nhưng còn các câu hỏi "+id_cauhoi_str+" chưa được xóa. Vui lòng load lại trang web!","bottom-right","rgba(0,0,0,0.2)","error", 12000)
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status == 404) {
                        console.log("Error")
                    }else{
                        console.log("Error")
                    }
                }
            });
        }else{
            $.NotificationApp.send("Xóa câu hỏi thất bại", "Chưa có câu hỏi nào được chọn!","bottom-right","rgba(0,0,0,0.2)","error")
        }
    })
    $(".getQuestion").click(function(){
        if($("#example-month").val() == ""){
            $.NotificationApp.send("Lấy câu hỏi thất bại", "Hãy chọn tháng cần lấy danh sách câu hỏi!","bottom-right","rgba(0,0,0,0.2)","error")
        }else{
            var my = $("#example-month").val().split("-");
            var mth = my[1]+"-"+my[0];
            var link = "../BTL_PTPM/questions/"+mth+"/"+mth+".xlsx";
            checkFileExists(link).then(result => { if(result == true){
                window.location.href = link;
                $.NotificationApp.send("Lấy danh sách câu hỏi thành công!","Lấy danh sách câu hỏi thành công vui lòng xem trong phần tải xuống!","bottom-right","rgba(0,0,0,0.2)","success")
            }else{
                $.NotificationApp.send("Lấy danh sách câu hỏi thất bại!", "Tháng bạn chọn không có câu hỏi đã xóa hoặc bị lỗi trên đường truyền!","bottom-right","rgba(0,0,0,0.2)","error")
            }})
            .catch(error => console.log(error))
        }
    })
})