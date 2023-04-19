// Khách hàng - Đăng ký - Email
$(document).ready(function(){
    $("#email").change(function(){
        let email = $("#email").val();
        if(email!=""){
            let form_datas = new FormData();
            form_datas.append('email',email);
            $.ajax({
                url: 'index.php?controller=khachhang&action=checkEmail', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    if(res == 1)
                        $("#emailHelp").text("Email đã tồn tại trong hệ thống").css("color","red");
                    else
                        $("#emailHelp").text("Email hợp lệ có thể đăng ký").css("color","green");
                }
            });
            return false;
        }
    })
})
// End

// Khách hàng - Đăng ký - SDT
$(document).ready(function(){
    $("#sdt").change(function(){
        let sdt = $("#sdt").val();
        if(sdt!=""){
            let form_datas = new FormData();
            form_datas.append('sodienthoai',sdt);
            $.ajax({
                url: 'index.php?controller=khachhang&action=checkSDT', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    if(res == 1)
                        $("#sdtHelp").text("Số điện thoại đã tồn tại trong hệ thống").css("color","red");
                    else
                        $("#sdtHelp").text("Số điện thoại hợp lệ có thể đăng ký").css("color","green");
                }
            });
            return false;
        }
    })
})
//End

// Khách hàng - Đổi mật khẩu
$(document).ready(function(){
    $("#matkhaucu").change(function(){
        let matkhaucu = $("#matkhaucu").val();
        if(matkhaucu!=""){
            let form_datas = new FormData();
            form_datas.append('matkhaucu',matkhaucu);
            $.ajax({
                url: 'index.php?controller=khachhang&action=checkMatKhau', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    if(res == 0){
                        $("#oldPassword-feedback").text("Mật khẩu chưa chính xác!").show().css('color','#b02a37');;
                    }else{
                        $("#oldPassword-feedback").text("Mật khẩu chính xác!").show().css('color','green');
                    }
                }
            });
            return false;
        }
    })
})
//End

function get(id_input, url_, id_help_, text_help_success, text_help_error){
    return new Promise(function(resolve, reject) {
        let data = $("#"+id_input).val();
        var array = [];
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
                    console.log(res);
                    if(res == 0){
                        $("#"+id_help_).text(text_help_error).css("color","red");
                        resolve(res);
                    }
                    else{
                        $("#"+id_help_).text(text_help_success).css("color","green");
                        resolve(res);
                    }
                },
            });
        }else{
            reject('Data is empty');
        }
    })
}