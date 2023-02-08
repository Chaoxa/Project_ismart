<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Check auth</title>
</head>

<body>
    <style>
        * {
            box-sizing: border-box;
        }

        .in-header {
            border-radius: 0.3rem;
            margin: 5px 2px;
        }

        #header img {
            max-height: 50px;
            width: auto;
        }

        #content .image {
            text-align: center;
            margin: 10px 0px;
        }

        #content .image img {
            max-width: 100px;
        }

        #content .desc {
            border: 2px red solid;
            margin: 10px 20px;
            border-radius: 1rem;
            padding: 10px;
        }

        #content .desc h2 {
            text-align: center;
            color: red;
        }

        #content .info-product {
            border: 1px solid;
            padding: 10px;
            margin: 10px 20px;
        }

        #content .icon {
            text-align: center;
        }

        #content .icon img {
            max-width: 100px;
            height: auto;
        }

        .notify {
            margin-top: 10px;
        }
    </style>
    <div id="wrapper">
        <div class="container">
            <div id="header">
                <div class="row">
                    <div class="bg-dark col-md-12 in-header">
                        <div class="row justify-content-between px-4">
                            <h1 class="text-white">Trần Quý</h1>
                            <img src="https://play-lh.googleusercontent.com/h9_cV-1LaBLdSmYhiSu-knE_BMJ0LGXL457FeQ5j2T5x70C47ieOTVqSWQ83oycbRn0=s256-rw" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div id="content">
                <div class="row">
                    <div class="col-md-12 image">
                        <img src="https://mobifonemoney.vn/images/news-media/quet-ma-qr-mobifone-money-2_08122022205609.png" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="desc">
                            <h2>Phần mềm kiểm tra hàng chính hãng</h2>
                        </div>
                    </div>
                </div>
                <?php
                if (!empty($product)) { ?>
                    <div class="info-product">
                        <div class="col-md-12">
                            <p>Tên sản phẩm: <b><?php echo $product['product_name'] ?></b></p>
                            <p>Mã sản phẩm: <b><?php echo $product['product_code'] ?></b></p>
                            <p>Giá: <b><?php echo price($product['new_price'], 'VNĐ') ?></b></p>
                            <p>Sản xuất: <b>Trần Quý</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mx-4 notify">
                            <div class="alert alert-success" role="alert">Chúc mừng bạn đã mua được sản phẩm chính hãng <b>Trần
                                    Quý</b>
                            </div>
                        </div>
                        <div class="col-sm-6 icon">
                            <img src="https://image.alokiddy.com.vn/Images/icon_thank.png" alt="">
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mx-4 notify">
                            <div class="alert alert-danger" role="alert">Sản phẩm này không phải sản phẩm chính hãng đến từ nhà sản xuất <b> Trần Quý</b>
                            </div>
                        </div>
                        <div class="col-sm-6 icon">
                            <img src="data:image/png;base64,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" alt="">
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>