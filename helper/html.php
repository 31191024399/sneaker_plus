<?php

#Chức năng : Xuất dữ liệu theo kiểu select 
#$data  : Dữ liệu cần xuất
#$active : Phần tử đang hoạt động 
#$option : Chứa các lựa chọn thêm vào vd : id,class,name cho select 
function show_select($data, $active = 0, $option = array())
{
    $class = isset($option['class']) ? $option['class'] : null;
    $id = isset($option['id']) ? $option['id'] : null;
    $style = isset($option['style']) ? $option['style'] : null;
    $name = isset($option['name']) ? $option['name'] : null;
    if (!empty($data)) {
        $result = "<select class='{$class}' name='{$name}' id='{$id}' style='{$style}' >";
        foreach ($data as $k => $v) {
            $label_active = null;
            if ($k == $active) {
                $label_active = 'selected';
            }
            $result .= "<option value='{$k}' {$label_active}>{$v}</option>";
        }
        $result .= '</select>';
        return $result;
    }
}
