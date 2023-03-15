<?php
include_once 'connect.php';

function addCategories()
{
    if (isset($_POST['addCategory'])) {

        global $conn;
        $categories = $_POST['category'];
        $sql = " insert into categories  (name) values ('$categories')";
        $statement = $conn->prepare($sql);
        $statement->execute();

    }
}

function showCategories()
{
    global $conn;
    $sql = " select * from categories";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataCategories;
    $dataCategories = $statement->fetchAll();
    // print_r($dataCategories);
}
