<?php
function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field])) return "<p class ='error'> $error[$label_field] </p>";
}
?>
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
            margin: 30px 0px;
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

        #content .icon img {
            max-width: 100px;
            height: auto;
        }

        .notify {
            margin-top: 10px;
        }

        .addqr {
            border: 2px solid red;
            border-radius: 0.3rem;
            padding: 10px;
            margin: 10px 20px;

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
                            <h2>Thêm mã sản phẩm</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="addqr">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="number_id" placeholder="ID sản phẩm" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btn-submit" value="Tạo">
                                    <?php echo form_error('ID') ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>