<?php

include_once 'connect.php';

function countAll()
{
    global $conn;

    $sqlProduct = "SELECT COUNT(*) FROM products";
    $statement = $conn->prepare($sqlProduct);
    $statement->execute();
    global $countProducts;
    $countProducts = $statement->fetchColumn();

    $sqlCategory = "SELECT COUNT(*) FROM categories";
    $statement = $conn->prepare($sqlCategory);
    $statement->execute();
    global $countCategories;
    $countCategories = $statement->fetchColumn();

    $sqlUser = "SELECT COUNT(*) FROM users";
    $statement = $conn->prepare($sqlUser);
    $statement->execute();
    global $countUsers;
    $countUsers = $statement->fetchColumn();

    $sqlSaleProd = "SELECT COUNT(*) FROM products WHERE deal > 0";
    $statement = $conn->prepare($sqlSaleProd);
    $statement->execute();
    global $dataSaleProd;
    $dataSaleProd = $statement->fetchColumn();

    $sqlComment = "SELECT COUNT(*) FROM comments";
    $statement = $conn->prepare($sqlComment);
    $statement->execute();
    global $countComments;
    $countComments = $statement->fetchColumn();

    $sqlCmtChuaduyet = "SELECT COUNT(*) FROM comments WHERE trangthai = 'chưa duyệt'";
    $statement = $conn->prepare($sqlCmtChuaduyet);
    $statement->execute();
    global $CmtChuaduyet;
    $CmtChuaduyet = $statement->fetchColumn();

    $sqlProdunconfimred = "SELECT COUNT(*) FROM bills WHERE status = 'No_confirm'";
    $statement = $conn->prepare($sqlProdunconfimred);
    $statement->execute();
    global $Produnconfimred;
    $Produnconfimred = $statement->fetchColumn();

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
    foreach($ViewMax as $ViewMax1) {
        global $dataViewMax;
        $dataViewMax = $ViewMax1['max(view)'];
    }
    
    $sqlSelectNameViewMax = "SELECT name FROM products WHERE view = '$dataViewMax'";
    $statement = $conn ->prepare($sqlSelectNameViewMax);
    $statement ->execute();
    global $dataNameViewMax;
    $dataNameViewMax = $statement ->fetchAll();

    
    //Sản phẩm có lượt mua nhiều nhất
    $sqlbuyMax = "SELECT max(amount) FROM bill_detail INNER JOIN bills ON bills.id = bill_detail.bill WHERE status = 'delivering' ";
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

    
}