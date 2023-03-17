<?php
include './model/connect.php';
function showproduct()
{
    $sql = "SELECT * FROM products WHere 1 order by id DESC limit 0,9";
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $showproduct;
    $showproduct = $statement->fetchAll();
}

function showaboutproducts()
{
    if (isset($_GET['id']))
    $id = $_GET['id'];
    $sql = "SELECT * from products  WHERE id=" . $id;
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $showaboutproducts;
    $showaboutproducts = $statement->fetch();
}


