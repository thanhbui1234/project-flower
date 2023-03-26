<?php 
include 'connect.php';


function thongKe(){
    global $conn;
    $sql = "SELECT categories.id as categoryID, categories.name as categoryName, count(products.id) as countProd, min(products.price) as minPrice, max(products.price) as maxPrice, avg(products.price) as avgPrice FROM products LEFT JOIN categories ON categories.id = products.category GROUP BY categories.id ORDER BY categories.id ASC";
    $statement = $conn->query($sql);
    $statement -> execute();
    global $listThongKe;
    $listThongKe = $statement->fetchAll();
}