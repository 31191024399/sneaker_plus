<?php get_header(); ?>

<div id="main-content-wp" class="fixed-layout clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="<?php echo base_url(); ?>trang-chu.html" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>san-pham/<?php echo $product['slug'] . '-' . $product['product_id'] . '.html'; ?>" class="active" title=""><?php echo $product['name']; ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" src="<?php echo get_media_by_id($product['thumb'], 'url'); ?>" data-zoom-image="<?php echo get_media_by_id($product['thumb'], 'url'); ?>" />
                        </a>
                        <div id="list-thumb">
                            <?php
                            if (!empty($product['img_involve'])) {
                                $img_involve = implode(',', json_decode($product['img_involve']));
                                $list_img = db_fetch_array(" SELECT url FROM tbl_media WHERE media_id IN({$img_involve})");
                                foreach ($list_img as $item) {
                            ?>
                                    <a href="" data-image="<?php echo $item['url']; ?>" data-zoom-image="<?php echo $item['url']; ?>">
                                        <img id="zoom" src="<?php echo $item['url']; ?>" />
                                    </a>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="<?php echo get_media_by_id($product['thumb'], 'url'); ?>" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $product['name']; ?></h3>
                        <?php
                        $new = empty($product['discount']) ? $product['price'] : $product['discount'];
                        $old = !empty($product['discount']) ? $product['price'] : false;
                        ?>
                        <span class="price"><?php echo currency_format($new); ?></span>
                        <span class="old"><?php if ($old) {
                                                echo currency_format($old);
                                            } ?></span>
                        <form method="post" action="?mod=product&controller=cart&action=add&id=<?php echo $product['product_id']; ?>">
                            <div id="num-order-wp">
                                <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                <input type="text" name="qty" value="1" id="num-order">
                                <a title="" id="plus"><i class="fa fa-plus"></i></a>
                            </div>
                            <div id="num-order-wp">
                                Size:
                                <?php
                                echo show_select($product['size'], $chosenSize, ['name' => $chosenSize]);
                                ?>
                            </div>
                            <button name="add" class="add-cart">Thêm giỏ hàng</button>
                        </form>
                        <div class="desc mt-4">
                            <?php echo $product['info']; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (!empty($list_involve)) {
            ?>
                <div class="section" id="feature-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Cùng chuyên mục</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            <?php foreach ($list_involve as $item) { ?>
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

<?php get_footer(); ?>