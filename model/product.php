<?php
function showhome()
{
    $sql = "SELECT * FROM products WHere 1 order by id DESC limit 0,9";
    $dssanpham = pdo_query($sql);
    return $dssanpham;
}

function sohwspct($id)
{
    $sql = "SELECT * from products  WHERE id=" . $id;
    $spct = pdo_query_one($sql);
    return $spct;
}
?>