<?php
require "views/Admin/templates/header.php";
$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = str_shuffle($characters);
$id_nuochoa = substr($randomString, 0, 11);
?>
<div class="container-fluid" style="margin-top:15px">
    <!-- start page title -->
    <div class="row">
        <div class="col-md-10 ms-auto me-auto">
            <a class="btn btn-danger mb-2">Thêm nước hoa</a>
            <div style="color: red">
                <?php echo '<span>' . $error . '</span>' ?>
            </div>
            <form class="needs-validation" method="POST" action="" novalidate>
                <div class="row">
                    <div class="col-md-6 ms-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Mã nước hoa</label>
                            <input type="text" class="form-control" name="id_nuochoa" value="<?php echo $id_nuochoa ?>" id="validationCustom01" readonly required>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập tên nước hoa</label>
                            <input type="text" class="form-control" name="ten_nuochoa" id="validationCustom01" placeholder="Tên nước hoa" required>
                            <div class="invalid-feedback">
                                Hãy nhập tên nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <label class="form-label" for="validationCustom01">Giới tính</label>
                        <select class="form-select mb-3" name="gioitinh">
                            <option value="0" selected>Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Unisex</option>
                        </select>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Xuất xứ</label>
                            <input type="text" class="form-control" name="xuatxu" id="validationCustom01" placeholder="Xuất xứ" required>
                            <div class="invalid-feedback">
                                Hãy nhập xuất xứ của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="mota" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Mô tả</label>
                                <div class="invalid-feedback">
                                    Hãy nhập mô tả của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="thongtinchinh" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Thông tin chính</label>
                                <div class="invalid-feedback">
                                    Hãy nhập thông tin chính của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="tongquan" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Tổng quan</label>
                                <div class="invalid-feedback">
                                    Hãy nhập thông tin tổng quan của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="huongthom" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Hương thơm</label>
                                <div class="invalid-feedback">
                                    Hãy nhập hương thơm của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="loai_huongthom" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Loại hương thơm</label>
                                <div class="invalid-feedback">
                                    Hãy nhập loại hương thơm của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="thietke" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Thiết kế</label>
                                <div class="invalid-feedback">
                                    Hãy nhập thiết kế của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="dadanghoa" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Đa dạng hóa</label>
                                <div class="invalid-feedback">
                                    Hãy nhập thông tin đa dạng hóa của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="huongdansudung" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;" required></textarea>
                                <label for="floatingTextarea">Hướng dẫn sử dụng</label>
                                <div class="invalid-feedback">
                                    Hãy nhập hướng dẫn sử dụng của nước hoa!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập nhóm nước hoa</label>
                            <input type="text" class="form-control" name="nhomnuochoa" id="validationCustom01" placeholder="Nhóm nước hoa" required>
                            <div class="invalid-feedback">
                                Hãy nhập nhóm nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập độ tuổi khuyên dùng</label>
                            <input type="text" class="form-control" name="dotuoikhuyendung" id="validationCustom01" placeholder="Độ tuổi khuyên dùng" required>
                            <div class="invalid-feedback">
                                Hãy nhập độ tuổi khuyên dùng của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập năm ra mắt của nước hoa</label>
                            <input type="text" class="form-control" name="namramat" id="validationCustom01" placeholder="Năm ra mắt" required>
                            <div class="invalid-feedback">
                                Hãy nhập năm ra mắt của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập nồng độ nước hoa</label>
                            <input type="text" class="form-control" name="nongdo" id="validationCustom01" placeholder="Nồng độ" required>
                            <div class="invalid-feedback">
                                Hãy nhập nồng độ của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập nhà pha chế nước hoa</label>
                            <input type="text" class="form-control" name="nhaphache" id="validationCustom01" placeholder="Nhà pha chế" required>
                            <div class="invalid-feedback">
                                Hãy nhập nhà pha chế của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập độ lưu hương của nước hoa</label>
                            <input type="text" class="form-control" name="doluuhuong" id="validationCustom01" placeholder="Độ lưu hương" required>
                            <div class="invalid-feedback">
                                Hãy nhập độ lưu hương của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập phong cách của nước hoa</label>
                            <input type="text" class="form-control" name="phongcach" id="validationCustom01" placeholder="Phong cách" required>
                            <div class="invalid-feedback">
                                Hãy nhập phong cách của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập độ tỏa hương của nước hoa</label>
                            <input type="text" class="form-control" name="dotoahuong" id="validationCustom01" placeholder="Độ tỏa hương" required>
                            <div class="invalid-feedback">
                                Hãy nhập độ tỏa hương của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Nhập thời điểm phù hợp sử dụng của nước hoa</label>
                            <input type="text" class="form-control" name="thoidiemphuhop" id="validationCustom01" placeholder="Thời điểm phù hợp" required>
                            <div class="invalid-feedback">
                                Hãy nhập thời điểm phù hợp sử dụng của nước hoa!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 me-0">
                        <label class="form-label" for="validationCustom01">Chọn thương hiệu của nước hoa</label>
                        <select class="form-select mb-3" name="id_thuonghieu">
                            <?php
                            for ($i = 0; $i < count($thuonghieu); $i++) {
                                $th = $thuonghieu[$i];
                                if ($i == 0) {
                                    echo "<option value='{$th["id_thuonghieu"]}' selected>{$th["ten_thuonghieu"]}</option>";
                                } else {
                                    echo "<option value='{$th["id_thuonghieu"]}'>{$th["ten_thuonghieu"]}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 me-0">
                        <label class="form-label" for="validationCustom01">Chọn nhà cung cấp của nước hoa</label>
                        <select class="form-select mb-3" name="id_nhacungcap">
                            <?php
                            for ($i = 0; $i < count($nhacungcap); $i++) {
                                $ncc = $nhacungcap[$i];
                                if ($i == 0) {
                                    echo "<option value='{$ncc["id_nhacungcap"]}' selected>{$ncc["ten_nhacungcap"]}</option>";
                                } else {
                                    echo "<option value='{$ncc["id_nhacungcap"]}'>{$ncc["ten_nhacungcap"]}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Dung tích 10 -->
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 10ML</label>
                            <input type="text" class="form-control" name="ML_10" id="validationCustom01" value="10" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 10ML - Giá Nhập</label>
                            <input type="text" class="form-control" name="gia_nhap10" id="validationCustom01">
                        </div>
                    </div>
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 10ML - Giá Bán</label>
                            <input type="text" class="form-control" name="gia_ban10" id="validationCustom01">
                        </div>
                    </div>
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 10ML - Số lượng</label>
                            <input type="text" class="form-control" name="so_luong10" id="validationCustom01">
                        </div>
                    </div>
                    <!-- Dung tích 20 -->
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 20ML</label>
                            <input type="text" class="form-control" name="ML_20" id="validationCustom01" value="20" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 20ML - Giá Nhập</label>
                            <input type="text" class="form-control" name="gia_nhap20" id="validationCustom01">
                        </div>
                    </div>
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 20ML - Giá Bán</label>
                            <input type="text" class="form-control" name="gia_ban20" id="validationCustom01">
                        </div>
                    </div>
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 20ML - Số lượng</label>
                            <input type="text" class="form-control" name="so_luong20" id="validationCustom01">
                        </div>
                    </div>
                    <!-- Dung tích 100 -->
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 100ML</label>
                            <input type="text" class="form-control" name="ML_100" id="validationCustom01" value="100" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 100ML - Giá Nhập</label>
                            <input type="text" class="form-control" name="gia_nhap100" id="validationCustom01">
                        </div>
                    </div>
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 100ML - Giá Bán</label>
                            <input type="text" class="form-control" name="gia_ban100" id="validationCustom01">
                        </div>
                    </div>
                    <div class="col-md-3 me-0">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Dung tích 100ML - Số lượng</label>
                            <input type="text" class="form-control" name="so_luong100" id="validationCustom01">
                        </div>
                    </div>

                    <!-- Ảnh nước hoa -->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="file-upload-preview">
                            <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                <div class="fallback">
                                    <input name="file" type="file" multiple="">
                                </div>

                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                    <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                                        <strong>not</strong> actually uploaded.)</span>
                                </div>
                            </form>

                            <!-- Preview -->
                            <div class="dropzone-previews mt-3" id="file-previews"></div>
                        </div> <!-- end preview-->

                        <div class="tab-pane" id="file-upload-code">
                            <p>Make sure to include following js files at end of <code>body element</code></p>

                            <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- plugin js --&gt;
                                                        &lt;script src=&quot;assets/js/vendor/dropzone.min.js&quot;&gt;&lt;/script&gt;
                                                        &lt;!-- init js --&gt;
                                                        &lt;script src=&quot;assets/js/ui/component.fileupload.js&quot;&gt;&lt;/script&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->

                            <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- File Upload --&gt;
                                                        &lt;form action=&quot;/&quot; method=&quot;post&quot; class=&quot;dropzone&quot; id=&quot;myAwesomeDropzone&quot; data-plugin=&quot;dropzone&quot; data-previews-container=&quot;#file-previews&quot;
                                                            data-upload-preview-template=&quot;#uploadPreviewTemplate&quot;&gt;
                                                            &lt;div class=&quot;fallback&quot;&gt;
                                                                &lt;input name=&quot;file&quot; type=&quot;file&quot; multiple /&gt;
                                                            &lt;/div&gt;
                                                        
                                                            &lt;div class=&quot;dz-message needsclick&quot;&gt;
                                                                &lt;i class=&quot;h1 text-muted dripicons-cloud-upload&quot;&gt;&lt;/i&gt;
                                                                &lt;h3&gt;Drop files here or click to upload.&lt;/h3&gt;
                                                                &lt;span class=&quot;text-muted font-13&quot;&gt;(This is just a demo dropzone. Selected files are
                                                                    &lt;strong&gt;not&lt;/strong&gt; actually uploaded.)&lt;/span&gt;
                                                            &lt;/div&gt;
                                                        &lt;/form&gt;
                                                        
                                                        &lt;!-- Preview --&gt;
                                                        &lt;div class=&quot;dropzone-previews mt-3&quot; id=&quot;file-previews&quot;&gt;&lt;/div&gt;

                                                        &lt;!-- file preview template --&gt;
                                                        &lt;div class=&quot;d-none&quot; id=&quot;uploadPreviewTemplate&quot;&gt;
                                                            &lt;div class=&quot;card mt-1 mb-0 shadow-none border&quot;&gt;
                                                                &lt;div class=&quot;p-2&quot;&gt;
                                                                    &lt;div class=&quot;row align-items-center&quot;&gt;
                                                                        &lt;div class=&quot;col-auto&quot;&gt;
                                                                            &lt;img data-dz-thumbnail src=&quot;#&quot; class=&quot;avatar-sm rounded bg-light&quot; alt=&quot;&quot;&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;div class=&quot;col ps-0&quot;&gt;
                                                                            &lt;a href=&quot;javascript:void(0);&quot; class=&quot;text-muted fw-bold&quot; data-dz-name&gt;&lt;/a&gt;
                                                                            &lt;p class=&quot;mb-0&quot; data-dz-size&gt;&lt;/p&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;div class=&quot;col-auto&quot;&gt;
                                                                            &lt;!-- Button --&gt;
                                                                            &lt;a href=&quot;&quot; class=&quot;btn btn-link btn-lg text-muted&quot; data-dz-remove&gt;
                                                                                &lt;i class=&quot;dripicons-cross&quot;&gt;&lt;/i&gt;
                                                                            &lt;/a&gt;
                                                                        &lt;/div&gt;
                                                                    &lt;/div&gt;
                                                                &lt;/div&gt;
                                                            &lt;/div&gt;
                                                        &lt;/div&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                        </div> <!-- end preview code-->
                    </div> <!-- end tab-content-->
                </div>
                <button class="btn btn-primary mt-2" name="submit" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</div>

<?php
require "views/admin/templates/footer.php";
?>