<?php get_header(); ?>
<div id="main-content-wp" class="fixed-layout clearfix category-product-page mx-0 mx-lg-5">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="trang-chu.html" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a class="active" href="san-pham/<?php echo $product['slug']; ?>" title="">Tìm kiếm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row">
            <div class="section sidebar" id="filter-product-wp">
                <form method="GET">
                    <div class="section-head">
                        <h3 class="section-title">Bộ lọc <button style="float: right;color: #7d7d7d;">Lọc</button></h3>
                    </div>
                    <div class="section-detail">
                        <?php $filter = get_filter_by_type(2);
                        if (!empty($filter)) {
                        ?>
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="2">Thương hiệu</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($filter as $item) {
                                        $checked = 'checked';
                                        if ($item['filter_id'] != $filter_active['r_cat']) {
                                            $checked = '';
                                        }
                                    ?>
                                        <tr>
                                            <td style="width: 20px;"><input type="radio" name="r_cat" <?php echo $checked; ?> value="<?php echo $item['filter_id']; ?>"></td>
                                            <td><?php echo $item['title']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>

                        <?php $filter = get_filter_by_type(1);
                        if (!empty($filter)) {
                        ?>
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="2">Lọc theo giá :</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($filter as $item) {
                                        $checked = 'checked';
                                        if ($item['filter_id'] != $filter_active['r_price']) {
                                            $checked = '';
                                        }
                                    ?>
                                        <tr>
                                            <td style="width: 20px;"><input type="radio" name="r_price" <?php echo $checked; ?> value="<?php echo $item['filter_id']; ?>"></td>
                                            <td><?php echo $item['title']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </form>
            </div>
            <div class="main-content search-page">
                <div class="section" id="list-product-wp">
                    <?php if (!empty($product['data'])) { ?>

                        <div class="filter-wp fl-right">
                            <p class="desc">Tổng <?php echo $product['total']; ?> sản phẩm</p>
                            <div class="form-filter">
                                <form method="GET" action="">
                                    <?php
                                    $select = array(2 => 'Mới nhất', 1 => 'Bán chạy', 3 => 'Giá cao nhất', 4 => 'Giá thấp nhất');
                                    echo show_select($select, $ordinal, array('name' => 'ordinal'));
                                    ?>
                                    <button>Sắp xếp</button>
                                </form>
                            </div>
                        </div>
                        <div class="section" id="list-product-wp">
                            <div class="section-detail">

                                <ul class="list-item clearfix">
                                    <?php foreach ($product['data'] as $item) { ?>
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
                    <?php } else { ?>
                        <p id="data-empty">Không tìm thấy sản phẩm nào</p>
                    <?php } ?>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail">
                        <?php
                        if ($paging['total_page'] > 1) {
                            echo paging_basic($paging['total_page'], $paging['active'], array('class' => 'list-item clearfix', 'url_page' => $paging['url'], 'label_active' => 'active'));
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>