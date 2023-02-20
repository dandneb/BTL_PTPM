<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style/header.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style\swiper-bundle.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: "Segoe UI", "Roboto", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol" !important;
            font-weight: 500 !important;
        }

        .card-thanh-toan img {
            width: 50px;
            height: 50px;
            position: relative;
        }

        .card-thanh-toan .so_luong {
            background-color: #07503d;
            height: 17px;
            width: 18px;
            text-align: center;
            color: white;
            border-radius: 100%;
            position: absolute;
            top: -10%;
            right: -10%;
        }

        .p_cost {
            font-size: 14px;
            color: #717171;
            font-weight: 600;
        }
    </style>
</head>

<body class="p-0 m-0 border-0" style="background-color: #FFF">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <img class="logo" src="images\header\checkout_logo.png" alt="">
        </div>
        <form class="row g-3 needs-validation mt-3" style="display: flex;" novalidate>
            <div class="col-md-4 pe-4">
                <div class="row g-3">
                    <div class="col-md-12">
                        <h5 class="">Thông tin mua hàng</h5>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Email (tùy chọn)">
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Họ và tên" required>
                        <div class="invalid-feedback">
                            Hãy nhập tên của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Số điện thoại" required>
                        <div class="invalid-feedback">
                            Hãy nhập số điện thoại của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Địa chỉ" required>
                        <div class="invalid-feedback">
                            Hãy nhập địa chỉ của bạn!
                        </div>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" id="validationCustom04" placeholder="Tỉnh thành" required>
                            <option selected disabled value="">Tỉnh thành</option>
                            <option>...</option>
                        </select>
                        <div class="invalid-feedback">
                            Hãy chọn tỉnh thành của bạn!
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label p-15">
                                Giao hàng đến địa chỉ khác
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Ghi chú (tùy chọn)"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ps-4 pe-4">
                <div class="row">
                    <div class="col-md-12 mb-3 p-0">
                        <h5 class="">Thông tin mua hàng</h5>
                    </div>
                    <div class="alert alert-info rounded-0" style="padding: 6px 16px;" role="alert">
                        <span class="p-15">Vui lòng nhập thông tin giao hàng!</span>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="accordion accordion-flush border" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <div style="padding: 4px">
                                        <input class="collapsed" name="thanh-toan" type="radio" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        </input>
                                        <span class="p-15">Thanh toán qua VNPAY-QR</span>
                                    </div>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <div style="padding: 4px">
                                        <input class="collapsed" name="thanh-toan" type="radio" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        <span class="p-15">Chuyển khoản qua ngân hàng</span>
                                        </input>
                                    </div>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <div style="padding: 4px">
                                        <input class="collapsed" name="thanh-toan" type="radio" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        <span class="p-15">Thanh toán qua ngân hàng (COD)</span>
                                        </input>
                                    </div>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ps-4 pe-4">
                <div class="row">
                    <div class="col-md-12 mb-3 p-0 border-bottom pb-2">
                        <h5 class="">Đơn hàng (3 sản phẩm)</h5>
                    </div>
                    <div class="col-md-12 mb-3 p-0 border-bottom pb-2">
                        <div class="card-thanh-toan mb-2">
                            <div class="row">
                                <div class="col-md-2">
                                    <div style="position: relative;">
                                        <img src="images\nuocHoaNam\Roja Dove\Roja Dove Elysium Pour Homme Parfum Cologne\7.jpg" alt="">
                                        <p class="p-12-bold so_luong">1</p>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div>
                                        <p class="p-14-bold">Le Labo Santal 33 EDP</p>
                                        <p class="p-12">Unisex / USA / Chiết 10ml</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p class="p_cost">675.000₫</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-thanh-toan mb-2">
                            <div class="row">
                                <div class="col-md-2">
                                    <div style="position: relative;">
                                        <img src="images\nuocHoaNam\Roja Dove\Roja Dove Elysium Pour Homme Parfum Cologne\7.jpg" alt="">
                                        <p class="p-12-bold so_luong">1</p>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div>
                                        <p class="p-14-bold">Le Labo Santal 33 EDP</p>
                                        <p class="p-12">Unisex / USA / Chiết 10ml</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p class="p_cost">675.000₫</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2 p-0 border-bottom pb-2">
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Mã giảm giá">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success p-14-bold text-white" type="submit">Áp dụng</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2 p-0 border-bottom pb-2">
                        <div class="d-flex justify-content-between">
                            <p class="p_cost">Tạm tính</p>
                            <p class="p_cost">1.345.000₫</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="p_cost">Phí vận chuyển</p>
                            <p class="p_cost">-</p>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2 p-0 border-bottom pb-2">
                        <div class="d-flex justify-content-between">
                            <p class="p_cost" style="font-size:16px;">Tổng cộng</p>
                            <p class="p_cost" style="font-size:21px; color:#07503d;">1.345.000₫</p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success" type="submit">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
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
    </script>
</body>

</html>