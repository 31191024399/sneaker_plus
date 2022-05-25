<?php
function construct()
{
    load_model('cat');
    load_model('index');
}
function indexAction()
{
    $data = array();
    $data['list_favorite'] = get_product_favorite();
    $data['list_discount'] = get_product_discount();
    $data['list_new'] = get_new_product();
    $data['list_hot'] = get_hot_product();
    load_view('indexIndex', $data);
}

function detailAction()
{
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $info_product = get_product_by_id($id);
    $info_product || redirect('?');
    $info_product['size'] = get_product_sizes($info_product);
    $info_product['defaultSize'] = reset($info_product['size']);
    $data['product'] = $info_product;
    $data['chosenSize'] = $info_product['defaultSize'];
    $data['list_favorite'] = get_product_favorite();
    $data['list_involve'] = get_product_involve($info_product['cat_id'], $id);
    load_view('detailIndex', $data);
}
