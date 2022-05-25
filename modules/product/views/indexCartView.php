<?php get_header(); ?>
<div id="main-content-wp" class="cart-page fixed-layout m-0 mx-md-5">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="<?php echo base_url(); ?>trang-chu.html" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a class="active" href="<?php echo base_url(); ?>gio-hang" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <?php

        if ($cart) {
        ?>
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">
                    <form method="post" action="?mod=product&controller=cart&action=update">

                        <table class="table">
                            <thead>
                                <tr>
                                    <td class="py-2 px-0">Tên sản phẩm</td>
                                    <td class="py-2 px-0 d-none d-sm-block">Giá sản phẩm</td>
                                    <td class="py-2 px-0">Số lượng</td>
                                    <td class="py-2 px-0" colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($cart['buy'] as $item) {
                                ?>
                                    <tr>
                                        <td>
                                            <a href="san-pham/<?php echo $item['slug'] . '-' . $item['id'] . '.html'; ?>" title="" class="thumb">
                                                <img src="<?php echo get_media_by_id($item['thumb'], 'url'); ?>" alt="">
                                                <p><?php echo $item['name'] ?></p>
                                            </a>
                                        </td>
                                        <td class="d-none d-sm-table-cell"><?php echo currency_format($item['price']); ?></td>
                                        <td>
                                            <input type="number" min="0" name="qty[<?php echo $item['id']; ?>]" value="<?php echo $item['qty']; ?>" class="num-order">
                                        </td>
                                        <td><?php echo currency_format($item['sub_total']); ?></td>
                                        <td>
                                            <a href="?mod=product&controller=cart&action=drop&id=<?php echo $item['id']; ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right pr-2">Giá trị đơn hàng: <span><?php echo currency_format($cart['info']['total']); ?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right pr-2">Khuyến mãi: <span>-<?php echo currency_format($cart['info']['percent']); ?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right pr-2">Thành tiền: <span><?php echo currency_format($cart['info']['total'] - $cart['info']['percent']); ?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div id="discount" class="d-flex justify-content-between float-right mb-4 pr-2">
                                            <label for="discount_code" class="mr-4">Mã khuyến mãi</label>
                                            <input type="text" maxlength="100" name="discount_code" value="<?php echo isset($cart['info']['discount_code']) ? $cart['info']['discount_code'] : ""; ?>" id="discount_code">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="">
                                                <button name='update' id="update-cart">Cập nhật giỏ hàng</button>
                                                <a href="<?php echo base_url() . 'gio-hang/thanh-toan.html'; ?>" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                    <a href="<?php echo base_url() . 'trang-chu.html'; ?>" title="" id="buy-more">Mua tiếp</a><br />
                    <a href="?mod=product&controller=cart&action=drop&all" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
            </div>
        <?php } else { ?>
            <p id="data-empty">Bạn chưa thêm sản phẩm nào vào giỏ hàng <a href="<?php echo base_url() . 'trang-chu.html'; ?>" title="" id="buy-more"> Click vào đây để mua hàng </a><br /></p>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>