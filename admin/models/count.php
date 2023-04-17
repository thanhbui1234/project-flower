<?php

include_once 'connect.php';

function countAll()
{
    global $conn;

    //Đếm sản phẩm
    $sqlProduct = "SELECT COUNT(*) FROM products";
    $statement = $conn->prepare($sqlProduct);
    $statement->execute();
    global $countProducts;
    $countProducts = $statement->fetchColumn();

    //Đếm loại sản phẩm
    $sqlCategory = "SELECT COUNT(*) FROM categories";
    $statement = $conn->prepare($sqlCategory);
    $statement->execute();
    global $countCategories;
    $countCategories = $statement->fetchColumn();

    //Đếm người dùng
    $sqlUser = "SELECT COUNT(*) FROM users";
    $statement = $conn->prepare($sqlUser);
    $statement->execute();
    global $countUsers;
    $countUsers = $statement->fetchColumn();

    //Đếm sản phẩm đang sale
    $sqlSaleProd = "SELECT COUNT(*) FROM products WHERE deal > 0";
    $statement = $conn->prepare($sqlSaleProd);
    $statement->execute();
    global $dataSaleProd;
    $dataSaleProd = $statement->fetchColumn();

    //Đếm comments
    $sqlComment = "SELECT COUNT(*) FROM comments";
    $statement = $conn->prepare($sqlComment);
    $statement->execute();
    global $countComments;
    $countComments = $statement->fetchColumn();

    //Đếm comments chưa duyệt
    $sqlCmtChuaduyet = "SELECT COUNT(*) FROM comments WHERE status = '1'";
    $statement = $conn->prepare($sqlCmtChuaduyet);
    $statement->execute();
    global $CmtChuaduyet;
    $CmtChuaduyet = $statement->fetchColumn();

    //Đếm đơn hàng chưa đc xác nhận
    $sqlProdunconfimred = "SELECT COUNT(*) FROM bills WHERE status = 'No_confirm'";
    $statement = $conn->prepare($sqlProdunconfimred);
    $statement->execute();
    global $Produnconfimred;
    $Produnconfimred = $statement->fetchColumn();

    //Đếm đơn hàng đã xác nhận
    $sqlProdconfirmed = "SELECT COUNT(*) FROM bills WHERE status = 'delivering'";
    $statement = $conn->prepare($sqlProdconfirmed);
    $statement->execute();
    global $Prodconfirmed;
    $Prodconfirmed = $statement->fetchColumn();

    //Sản phẩm có lượt xem nhiều nhất
    $sqlViewMax = "SELECT name, max(view) FROM products";
    $statement = $conn->prepare($sqlViewMax);
    $statement->execute();
    $ViewMax = $statement->fetchAll();
    foreach ($ViewMax as $ViewMax1) {
        global $dataViewMax;
        $dataViewMax = $ViewMax1['max(view)'];
    }

    $sqlSelectNameViewMax = "SELECT name FROM products WHERE view = '$dataViewMax'";
    $statement = $conn->prepare($sqlSelectNameViewMax);
    $statement->execute();
    global $dataNameViewMax;
    $dataNameViewMax = $statement->fetchAll();

    //Sản phẩm có lượt mua nhiều nhất
    $sqlbuyMax = "SELECT max(amount) FROM bill_detail INNER JOIN bills ON bills.id = bill_detail.bill WHERE status = 'delivered' ";
    $statement = $conn->prepare($sqlbuyMax);
    $statement->execute();
    $buyMax = $statement->fetchAll();
    foreach ($buyMax as $buyMax1) {
        global $dataBuymax;
        $dataBuymax = $buyMax1['max(amount)'];
    }
    $sqlSelectNameBuyMax = " SELECT productName FROM bill_detail WHERE amount = $dataBuymax ";
    $statement = $conn->prepare($sqlSelectNameBuyMax);
    $statement->execute();
    global $dataNameBuyMax;
    $dataNameBuyMax = $statement->fetchAll();

    //Doanh thu
    // $sqlbuyMax = "SELECT max(amount) FROM bill_detail INNER JOIN bills ON bills.id = bill_detail.bill WHERE status = 'delivering' ";
    // $statement = $conn->prepare($sqlbuyMax);
    // $statement->execute();

    // $sqlGetDate = "SELECT DATE_FORMAT(date, '%Y %m') FROM bills";
    // $statement = $conn->prepare($sqlGetDate);
    // $statement->execute();
    // print_r($statement->execute());
    // die();
}


function doanhthu()
{
    global $conn;

    $sqlGetDate = "SELECT sum(total) ,MONTH(date) from bills where status = 'delivered'  group by MONTH(date)  order by MONTH(date)  ";
    $statement = $conn->prepare($sqlGetDate);
    $statement->execute();
    // print_r($statement->execute());
    // die();
    global $dataDoanhthu;
    $dataDoanhthu = $statement->fetchAll();
    // foreach ($data as $value) {
    //     /////// show data
    //     echo "Tháng " . $value['MONTH(date)'] . ' Có tổng doanh thu là' . $value['sum(total)'] . '<br />';
    // }

}
