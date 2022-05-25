<?php
$info_sytem = get_info_sytem();
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $info_sytem['title']; ?></title>
    <meta charset="UTF-8">
    <base href="<?php echo base_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="public/js/fancybox-master/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/fancybox-master/dist/jquery.fancybox.min.js"></script>
    <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
    <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_PI/sdk.js#xfbml=1&version=v2.11';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-body" class="clearfix">
                    <div class="wp-inner d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mx-md-5">

                        <a href="trang-chu.html" title="" id="logo" class="fl-left"><img src="public/images/LOGO - blk.png" alt="" width="102" height="60"></a>
                        <div id="search-wp" class="fl-left">
                            <form method="GET" action="<?php echo base_url() . 'san-pham/giay'; ?>" class="d-flex flex-wrap align-items-center justify-content-center">
                                <input class="mb-2 mb-sm-0" type="text" name="q" id="s" value="<?php echo set_value('q'); ?>" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s">Tìm kiếm</button>
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <?php $cart = get_cart(); ?>
                            <div id="cart-wp" class="ml-0">
                                <div id="btn-cart" class="my-4">
                                    <a href="gio-hang">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?php if ($cart) echo $cart['info']['qty']; ?></span>
                                    </a>
                                </div>
                                <?php
                                if ($cart) {
                                ?>
                                    <div id="dropdown">
                                        <p class="desc">Có <span><?php echo $cart['info']['qty']; ?> sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            <?php foreach ($cart['buy'] as $item) { ?>
                                                <li class="clearfix">
                                                    <a href="" title="san-pham/<?php echo $item['slug'] . '-' . $item['id'] . '.html'; ?>" class="thumb fl-left">
                                                        <img src="<?php echo get_media_by_id($item['thumb'], 'url'); ?>" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="san-pham/<?php echo $item['slug'] . '-' . $item['id'] . '.html'; ?>" title="" class="product-name"><?php echo $item['name']; ?></a>
                                                        <p class="price"><?php echo currency_format($item['price']); ?></p>
                                                        <p class="qty">Số lượng: <span><?php echo $item['qty']; ?></span></p>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right"><?php echo currency_format($cart['info']['total']); ?></p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="gio-hang" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="gio-hang/thanh-toan.html" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </dic>
                                    </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
