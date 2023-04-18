//Quản lý - Lấy số lượng sản phẩm
$(document).ready(function(){
    $("#dungtich").change(function(){
        let id_nuochoa = $("#my_link").text().split(":")[1].trim();
        let dungtich = $("#dungtich").val();
        if(dungtich!="" && id_nuochoa != ""){
            let form_datas = new FormData();
            form_datas.append('dungtich',dungtich);
            form_datas.append('id_nuochoa',id_nuochoa);
            $.ajax({
                url: 'index.php?controller=nhanvien&action=getSoLuong',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    var title = "";
                    $("#soluong").removeAttr('disabled');
                    if(res['soluong'] == 0){
                        $("#soluong").val("0");
                        $("#label_soluong").text("Sản phẩm hiện tại còn hàng.");
                    }
                    else{
                        $("#soluong").val("1");
                        $("#label_soluong").text("Sản phẩm hiện tại hết hàng.");
                    }
                }
            });
            return false;
        }
    })
})
//End

function checkMail(id_input){
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return filter.test($("#"+id_input).val());
}

function check(id_input, url_, id_help_, text_help_success, text_help_error){
    $(document).ready(function(){
        $("#"+id_input).change(function(){
            if(id_input == "email"){
                if (!checkMail("email")) {
                    $("#"+id_help_).text("Định dạng email không hợp lệ").css("color","red");
                }else{
                    let data = $("#"+id_input).val();
                    if(data!=""){
                        let form_datas = new FormData();
                        form_datas.append('data',data);
                        $.ajax({
                            url: url_, // gửi đến file upload.php 
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_datas,
                            type: 'post',
                            success: function(res) {
                                if(res == 1)
                                    $("#"+id_help_).text(text_help_error).css("color","red");
                                else
                                    $("#"+id_help_).text(text_help_success).css("color","green");
                            },
                        });
                        return false;
                    }
                }
            }else{
                let data = $("#"+id_input).val();
                if(data!=""){
                    let form_datas = new FormData();
                    form_datas.append('data',data);
                    $.ajax({
                        url: url_, // gửi đến file upload.php 
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_datas,
                        type: 'post',
                        success: function(res) {
                            if(res == 1)
                                $("#"+id_help_).text(text_help_error).css("color","red");
                            else
                                $("#"+id_help_).text(text_help_success).css("color","green");
                        },
                    });
                    return false;
                }
            }
        })
    })
};

function check_return(id_input, url_, callback){
    $(document).ready(function(){
        let is_valid = false; // tạo biến cờ
        let data = $("#"+id_input).val();
        if(data!=""){
            let form_datas = new FormData();
            form_datas.append('data',data);
            $.ajax({
                url: url_, // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    if(res == 1){
                        is_valid = false;
                    }
                    else{
                        is_valid = true;
                    }
                    if(callback){
                        callback(is_valid);
                    }
                },
            });
            return false;
        }
    })
}