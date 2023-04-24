<?php
$str = "Ngoài các tiêu chí tìm địa chỉ cung cấp nước hoa uy tín, chất lượng. Thì chúng ta cũng cần lưu ý với một số các dấu hiệu chứng tỏ đơn vị không đảm bảo đó là: $&Địa chỉ bán nước hoa không có tên cửa hàng, thường chỉ rao bán thông qua tài khoản cá nhân mà thôi. Tất cả các phản hồi của khách hàng đều chỉ “một màu”, không chân thật. Luôn đưa ra các chương trình sale, tri ân quanh năm. Thậm chí rằng chương trình sale đó có thể lên đến 50%, 60% hoặc cao đến 80%... Hình ảnh sản phẩm kém, bị vỡ và có số điện thoại, địa chỉ của đơn vị khác nhưng bị che.. Tư vấn sản phẩm không chuyên nghiệp vì không hiểu rõ về từng sản phẩm và giá cả của các mẫu đó… Lợi dụng tâm lý khách hàng muốn mua hàng rẻ nên đã rao bán hàng giả với mức giá khá thấp để đánh lừa khách hàng…$ Do vậy để trở thành một người tiêu dùng thông minh, trước khi chọn mua chúng ta cần có sự xem xét thật cẩn thận, kỹ càng về từng mẫu sản phẩm. Cũng như trang bị cho mình đầy đủ các kiến thức về nước hoa, thương hiệu cung cấp nước hoa nổi tiếng thị trường.";
$str_new = explode("$", $str);
foreach($str_new as $item){
    if($item[0] != "&"){
?>
<p><?php echo $item ?></p>
<?php
    }else{
        $ul = substr($item, 1);
        $li = preg_split('/\.\ |\…\ /', $ul);
        ?>
        <ul>
            <?php
            foreach($li as $l){
            ?>
            <li><?php echo $l ?></li>
            <?php
            }
            ?>
            <?php
            ?>
        </ul>
        <?php
    }
}
?>