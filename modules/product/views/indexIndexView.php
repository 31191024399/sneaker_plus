<?php
get_header();
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <section id="home">
            <!-- Slider -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./public/images/banner/4.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./public/images/banner/7.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./public/images/banner/6.webp" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <div class="main-content">
            <?php
            if (!empty($list_favorite)) {
            ?>
                <div class="section" id="feature-product-wp">
                    <div class="container text-center mt-5 py-5">
                        <h3>Bộ sưu tập mới</h3>
                        <!-- Seperate content -->
                        <hr class="mx-auto">
                        <p>Bộ sưu tập mùa hè mới của shop.</p>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            <?php foreach ($list_favorite as $item) { ?>
                                <li>
                                    <a href="<?php echo $item['path']['detail']; ?>" title="" class="thumb">
                                        <img src="<?php echo $item['url']; ?>">
                                    </a>
                                    <a href="<?php echo $item['path']['detail']; ?>" title="" class="product-name"><?php echo $item['name']; ?></a>
                                    <div class="price">
                                        <?php
                                        $new = empty($item['discount']) ? $item['price'] : $item['discount'];
                                        $old = !empty($item['discount']) ? $item['price'] : false;
                                        ?>
                                        <span class="new"><?php echo currency_format($new); ?></span>
                                        <span class="old"><?php if ($old) {
                                                                echo currency_format($old);
                                                            } ?></span>
                                    </div>
                                    <div class="action clearfix d-flex justify-content-center">
                                        <a href="<?php echo $item['path']['cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>
            <?php } ?>

            <section class="my-5 py-5" id="parallaxBanner">
                <div class="container">
                    <h4>Khuyến mãi mùa mới</h4>
                    <h1>
                        Bộ sưu tập mùa hè<br>
                        GIẢM TỚI 50%!
                    </h1>
                    <button class="text-uppercase">Mua ngay</button>
                </div>
            </section>

            <?php
            if (!empty($list_new)) {
            ?>
                <div class="section" id="feature-product-wp">
                    <div class="container text-center mt-5 py-5">
                        <h3>Sản phẩm mới</h3>
                        <!-- Seperate content -->
                        <hr class="mx-auto">
                        <p>Sản phẩm mới ra mắt vào đầu tháng 5.</p>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            <?php foreach ($list_new as $item) { ?>
                                <li>
                                    <a href="<?php echo $item['path']['detail']; ?>" title="" class="thumb">
                                        <img src="<?php echo $item['url']; ?>">
                                    </a>
                                    <a href="<?php echo $item['path']['detail']; ?>" title="" class="product-name"><?php echo $item['name']; ?></a>
                                    <div class="price">
                                        <?php
                                        $new = empty($item['discount']) ? $item['price'] : $item['discount'];
                                        $old = !empty($item['discount']) ? $item['price'] : false;
                                        ?>
                                        <span class="new"><?php echo currency_format($new); ?></span>
                                        <span class="old"><?php if ($old) {
                                                                echo currency_format($old);
                                                            } ?></span>
                                    </div>
                                    <div class="action clearfix d-flex justify-content-center">
                                        <a href="<?php echo $item['path']['cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>
            <?php } ?>

            <?php
            if (!empty($list_hot)) {
            ?>
                <div class="section" id="feature-product-wp">
                    <div class="container text-center mt-5 py-5">
                        <h3>Sản phẩm bán chạy</h3>
                        <!-- Seperate content -->
                        <hr class="mx-auto">
                        <p>Dòng sản phẩm bán chạy nhất trong quý 1</p>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            <?php foreach ($list_hot as $item) { ?>
                                <li>
                                    <a href="<?php echo $item['path']['detail']; ?>" title="" class="thumb">
                                        <img src="<?php echo $item['url']; ?>">
                                    </a>
                                    <a href="<?php echo $item['path']['detail']; ?>" title="" class="product-name"><?php echo $item['name']; ?></a>
                                    <div class="price">
                                        <?php
                                        $new = empty($item['discount']) ? $item['price'] : $item['discount'];
                                        $old = !empty($item['discount']) ? $item['price'] : false;
                                        ?>
                                        <span class="new"><?php echo currency_format($new); ?></span>
                                        <span class="old"><?php if ($old) {
                                                                echo currency_format($old);
                                                            } ?></span>
                                    </div>
                                    <div class="action clearfix d-flex justify-content-center">
                                        <a href="<?php echo $item['path']['cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>
            <?php } ?>

            <?php
            if (!empty($list_discount)) {
            ?>
                <div class="section" id="feature-product-wp">
                    <div class="container text-center mt-5 py-5">
                        <h3>Sản phẩm giảm giá</h3>
                        <!-- Seperate content -->
                        <hr class="mx-auto">
                        <p>Các sản phẩm giảm giá trong tháng 5</p>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            <?php foreach ($list_discount as $item) { ?>
                                <li>
                                    <a href="<?php echo $item['path']['detail']; ?>" title="" class="thumb">
                                        <img src="<?php echo $item['url']; ?>">
                                    </a>
                                    <a href="<?php echo $item['path']['detail']; ?>" title="" class="product-name"><?php echo $item['name']; ?></a>
                                    <div class="price">
                                        <?php
                                        $new = empty($item['discount']) ? $item['price'] : $item['discount'];
                                        $old = !empty($item['discount']) ? $item['price'] : false;
                                        ?>
                                        <span class="new"><?php echo currency_format($new); ?></span>
                                        <span class="old"><?php if ($old) {
                                                                echo currency_format($old);
                                                            } ?></span>
                                    </div>
                                    <div class="action clearfix d-flex justify-content-center">
                                        <a href="<?php echo $item['path']['cart']; ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>