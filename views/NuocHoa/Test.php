<?php
                    //foreach ($kienthuc as $item) {
                    ?>
                        <div class="col-md-12 mb-3">
                            <a class="blog-item-thumbnail" href="index.php?controller=NuocHoa&action=BaiViet&id_baiviet=<?php echo $item['id_baiviet_blog'] ?>">
                                <img src="<?php echo $item['img_link'] ?>" alt="">
                            </a>
                            <div class="blog-items-main">
                                <div>
                                    <a>
                                        <h6><?php echo $item['tieude'] ?></h6>
                                    </a>
                                    <?php
                                    $timestamp = strtotime($item['ngaydang']);
                                    $date = date("d/m/Y", $timestamp);
                                    ?>
                                    <p class="post-time"><?php echo $date ?> - PARFUMERIEVN</p>
                                </div>
                                <p class="mt-3" data-toggle="tooltip" title="<?php echo $item['mota'] ?>"><?php echo substr($item['mota'], 0, 360) . "..." ?></p>
                            </div>
                        </div>
                    <?php
                    //}
                    ?>