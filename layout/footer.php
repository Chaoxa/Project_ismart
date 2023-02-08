<div id="footer-wp" class="dark">
    <div id="foot-body">
        <div class="wp-inner clearfix">
            <div class="block" id="info-company">
                <h3 class="title">
                    <style>
                        #logo h1 {
                            font-size: 30px;
                        }
                    </style>
                    <a href="?page=home" title="" id="logo" class="fl-left">
                        <h1><b class="text-danger">TQ</b> <b class="text-primary">Store</b></h1>
                    </a>
                </h3>
                <br>
                <p class="desc dark">ISMART luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                <div id="payment">
                    <div class="thumb">
                        <img src="public/images/img-foot.png" alt="">
                    </div>
                </div>
            </div>
            <div class="block menu-ft" id="info-shop">
                <h3 class="title">Thông tin cửa hàng</h3>
                <ul class="list-item">
                    <li>
                        <p class="dark">306 - Sơn Đồng - Hoài Đức - Hà Nội</p>
                    </li>
                    <li>
                        <p class="dark">0375.284.572 - 0989.989.989</p>
                    </li>
                    <li>
                        <p class="dark">tranquy52003@gmail.com</p>
                    </li>
                </ul>
            </div>
            <div class="block menu-ft policy" id="info-shop">
                <h3 class="title">Chính sách mua hàng</h3>
                <ul class="list-item">
                    <li>
                        <a href="" title="" class="dark">Quy định - chính sách</a>
                    </li>
                    <li>
                        <a href="" title="" class="dark">Chính sách bảo hành - đổi trả</a>
                    </li>
                    <li>
                        <a href="" title="" class="dark">Chính sách hội viện</a>
                    </li>
                    <li>
                        <a href="" title="" class="dark">Giao hàng - lắp đặt</a>
                    </li>
                </ul>
            </div>
            <div class="block" id="newfeed">
                <h3 class="title">Bảng tin</h3>
                <p class="desc dark">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                <div id="form-reg">
                    <form method="POST" action="">
                        <input type="email" name="email" id="email" placeholder="Nhập email tại đây">
                        <button type="submit" id="sm-reg">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="wp-inner">
            <p id="copyright">© Bản quyền thuộc về unitop.vn | Php Master</p>
        </div>
    </div>
</div>
</div>
<div id="menu-respon">
    <a href="?page=home" title="" class="logo">VSHOP</a>
    <div id="menu-respon-wp">
        <ul class="" id="main-menu-respon">
            <li>
                <a href="?page=home" title>Trang chủ</a>
            </li>
            <li>
                <a href="?page=category_product" title>Điện thoại</a>
                <ul class="sub-menu">
                    <li>
                        <a href="?page=category_product" title="">Iphone</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Samsung</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?page=category_product" title="">Iphone X</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Iphone 8</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Nokia</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="?page=category_product" title>Máy tính bảng</a>
            </li>
            <li>
                <a href="?page=category_product" title>Laptop</a>
            </li>
            <li>
                <a href="?page=category_product" title>Đồ dùng sinh hoạt</a>
            </li>
            <li>
                <a href="?page=blog" title>Blog</a>
            </li>
            <li>
                <a href="#" title>Liên hệ</a>
            </li>
        </ul>
    </div>
</div>
<div id="btn-top"><img src="public/images/icon-to-top.png" alt="" /></div>
<div id="fb-root"></div>
<script>
    $(document).ready(function() {
        $(".add-cart").click(function() {
            // alert('oke');
            var id = $(this).attr("data-id");

            var data = {
                id: id,
            };
            // console.log(data);

            $.ajax({
                url: "?mod=cart&action=add_cart",
                method: "POST",
                data: data,
                dataType: "json",
                success: function(result) {
                    $(".num_cart").text(result.num_cart);
                    global_result = result.list_cart;
                    // console.log(global_result);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        });
    });

    document.querySelector(".add-cart");
    $(document).on("click", ".add-cart", function() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success m-1",
                cancelButton: "btn btn-danger m-1",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Đã thêm sản phẩm vào giỏ hàng",
                text: "Bạn có muốn đi vào giỏ hàng không?",
                icon: "success",
                showCancelButton: true,
                confirmButtonText: "Vào giỏ hàng",
                cancelButtonText: "Không,Ở lại đây",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    window.location = "?mod=cart&action=show";
                }
            });
    });

    (function(d, s, id) {
        var js,
            fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src =
            "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
        fjs.parentNode.insertBefore(js, fjs);
    })(document, "script", "facebook-jssdk");

    let darkMode = false;

    const savedDarkMode = localStorage.getItem("darkMode");
    if (savedDarkMode === "true") {
        darkMode = true;
    }
    document.querySelectorAll(".dark").forEach(function(element) {
        if (darkMode) {
            element.style.background = "#000";
            element.style.color = "#33CC33";
        } else {
            element.style.background = "#fff";
            element.style.color = "#000";
        }
    });
    const toggleIcon = document.querySelector(".toggle-icon");
    toggleIcon.innerHTML = darkMode ?
        '<i class="bi bi-brightness-high-fill"></i>' :
        '<i class="bi bi-moon-stars-fill"></i>';

    function toggleDarkMode() {
        darkMode = !darkMode;

        document.querySelectorAll(".dark").forEach(function(element) {
            if (darkMode) {
                element.style.background = "#000";
                element.style.color = "#33CC33";
            } else {
                element.style.background = "#fff";
                element.style.color = "#000";
            }
        });

        const toggleIcon = document.querySelector(".toggle-icon");
        toggleIcon.innerHTML = darkMode ?
            '<i class="bi bi-brightness-high-fill"></i>' :
            '<i class="bi bi-moon-stars-fill"></i>';

        return localStorage.setItem("darkMode", darkMode);
    }
</script>
</body>

</html>