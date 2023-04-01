<?php
include './model/connect.php';
function showproduct()
{

    global $conn;
    $sql = "SELECT * FROM products ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataProduct;
    $dataProduct = count($statement->fetchAll());
    $perPage = 9;
    global $countPage;
    $countPage = (ceil($dataProduct / $perPage));

    isset($_GET['page']) ? $pageGet = $_GET['page'] : $pageGet = '';

    ($pageGet == '' || $pageGet == 1) ? $pageSelect = 0 : $pageSelect = ($pageGet * $perPage) - $perPage;

    $sqlShowProd = "SELECT * FROM products order by id  desc limit $pageSelect , $perPage ";
    $statementShowProd = $conn->prepare($sqlShowProd);
    $statementShowProd->execute();
    global $showproducts;
    $showproducts = $statementShowProd->fetchAll();

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
