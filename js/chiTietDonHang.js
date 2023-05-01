$('input[type="radio"]').change(function() {
    var value = $(this).val();
    for(let i = 1; i <=5; i++){
        $(".star-review-"+i).removeClass("bi-star-fill").removeClass("bi-star").addClass("bi-star");
    }
    for(let i = 1; i <= parseInt(value); i++){
        $(".star-review-"+i).removeClass("bi-star").addClass("bi-star-fill");
    }
})

$(".btn-danhgia").click(function(){
    $('.submit-danhgia').val("");
    $('.submit-danhgia').val(id_donhang+"_"+this.value);
})

$(".btn-updatedanhgia").click(function(){
    $('.submit-updatedanhgia').val("");
    $('.submit-updatedanhgia').val(id_donhang+"_"+this.value);
    $('.note-DanhGia-update').val(daDanhGia[this.value]);
    var star = parseInt(starDanhGia[this.value]);
    for(let i = 1; i <=5; i++){
        $(".star-review-"+i).removeClass("bi-star-fill").removeClass("bi-star").addClass("bi-star");
    }
    for(let i = 1; i <= star; i++){
        $(".star-review-"+i).removeClass("bi-star").addClass("bi-star-fill");
    }
    $('input[name="updatedanhgia"]').filter('[value="' + star + '"]').prop('checked', true);
})

function validationForm(){
    if($('input[name="danhgia"]:checked').val() == undefined){
        $(".helpSP").text("Hãy chọn đánh giá chất lượng sản phẩm (nhấn vào sao tương ứng)!").css("color", "red");
        return false;
    }else{
        if($(".note-DanhGia").val() == '' || $(".note-DanhGia").val().length < 10){
            $(".helpDG").text("Hãy nhập đánh giá cho sản phẩm (Tối thiểu 10 ký tự)!").css("color", "red");
            return false;
        }else{
            return true;
        }
    }
}

function validationFormUpdate(){
    if($('input[name="updatedanhgia"]:checked').val() == undefined){
        $(".helpSP").text("Hãy cập nhật đánh giá chất lượng sản phẩm (nhấn vào sao tương ứng)!").css("color", "red");
        return false;
    }else{
        if($(".note-DanhGia-update").val() == '' || $(".note-DanhGia-update").val().length < 10){
            $(".helpDG").text("Hãy nhập cập nhật đánh giá cho sản phẩm (Tối thiểu 10 ký tự)!").css("color", "red");
            return false;
        }else{
            return true;
        }
    }
}