function validateForm(){
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(filter.test($("#email").val())){
        $(".helpEmail").text("Email của bạn đã hợp lệ!").css("color", "white");
        return true;
    }else{
        $(".helpEmail").text("Email của bạn chưa hợp lệ!").css("color", "red");
        return false;
    }
}
function validateForm_2(){
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(filter.test($("#email").val())){
        $(".helpEmail").text("Email của bạn đã hợp lệ!").css("color", "white");
        check_return("email", "index.php?controller=khachhang&action=checkEmailNhanTin", function(result){
            if(result==true){
                return true;
            }else{
                return false;
            }
        })
    }else{
        $(".helpEmail").text("Email của bạn chưa hợp lệ!").css("color", "red");
        return false;
    }
}

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
                        $(".helpEmail").text("Email đã tồn tại trong hệ thống!").css("color","red");
                        is_valid = false;
                    }
                    else{
                        $(".helpEmail").text("Email của bạn đã hợp lệ!").css("color", "white");
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
