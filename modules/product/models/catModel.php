<?php

function get_cat_by_id($id)
{
    $result = db_fetch_row("SELECT * FROM tbl_category WHERE cat_id = {$id} && active = 1");
    if (!empty($result)) {
        return $result;
    }
    return false;
}
function get_cat_by_slug($slug)
{
    $reult = db_fetch_row("SELECT * FROM tbl_category WHERE slug = '{$slug}' && active = 1");
    if (!empty($reult)) {
        return $reult;
    }
    return false;
}

function get_list_cat_product()
{
    return db_fetch_array('SELECT * FROM tbl_category WHERE active = 1 ');
}

function get_filter_by_type($type)
{
    return db_fetch_array(" SELECT * FROM tbl_filter WHERE type = {$type} && active = 1");
}

function get_filter_by_id($id, $index = null)
{
    $result = db_fetch_row("SELECT * FROM `tbl_filter` WHERE `filter_id` = {$id} ");
    if (empty($result)) {
        return false;
    }
    if (empty($index)) {
        return $result;
    } else {
        if (key_exists($index, $result)) {
            return $result[$index];
        } else {
            return false;
        }
    }
}

function search_product_by_q($q, $page)
{
    $sql = "SELECT product_id,name,price,slug,discount,tbl_media.url FROM tbl_product INNER JOIN tbl_media ON tbl_product.thumb = tbl_media.media_id WHERE name LIKE '%{$q}%' && tbl_product.active = 1 ";
    $total = total_page_by_query($sql, 10);
    $data['sql'] = $sql;
    if ($total > 0) {
        $start = $page * 10 - 10;
        $sql .= " LIMIT {$start},10 ";
        $return = add_path_product($sql);
        $data['data'] = $return;
        $data['total'] = $total;
        return $data;
    }
    return false;
}
