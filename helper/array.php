<?php

#chức năng : Lấy ra các phần tử được chỉ định 
#$index : Là một array chứa các chỉ mục cần lấy 
#$data : Là mảng chứa dữ liệu cần lấy 
function get_colums_in_array($index = array(), $data = array())
{
    if (empty($index) || empty($data)) {
        return false;
    }
    $result = array();
    foreach ($index as $v) {
        if (isset($data[$v])) {
            $result[$v] = $data[$v];
        } else {
            $result[$v] = null;
        }
    }
    return $result;
}
