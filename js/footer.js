$card = $(".card");
$product_price = $(".product-price");
$card.on("mouseleave", function() {
    $product_price.css({
        transition: '0.4s ease-in-out',
    });
})
var tongSanPham = 0;
if (document.cookie.indexOf("myCart") != -1) {
    var myArrayCookie = document.cookie.replace(/(?:(?:^|.*;\s*)myCart\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var myArray = JSON.parse(myArrayCookie);
    tongSanPham = myArray.reduce((tong, arr) => tong + arr.soluong, 0);
}
$(".numberOfCart").text(tongSanPham);
$(".slsp").text("("+tongSanPham+") sản phẩm.")

$(".btn-add").click(function(){
    if($(this).text()=="add"){
        var a = $(this).parent().find("a").text();
        var ul = $(this).parent().parent().find("ul");
        ul.css("display","block");
        $(this).text("remove");
    }else{
        var a = $(this).parent().find("a").text();
        var ul = $(this).parent().parent().find("ul");
        ul.css("display","none");
        $(this).text("add");
    }
})

(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()

const offcanvasElementList = document.querySelectorAll('.offcanvas')
const offcanvasList = [...offcanvasElementList].map(offcanvasEl => new bootstrap.Offcanvas(offcanvasEl))

