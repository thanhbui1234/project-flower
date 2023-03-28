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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $sql = "SELECT * from products  WHERE id=" . $id;
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $showaboutproducts;
    $showaboutproducts = $statement->fetch();
}

function view()
{

    if (isset($_GET['id'])) {
        global $conn;
        $id = $_GET['id'];
        $sql = "update products set view = view +1 where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();

    }
}
