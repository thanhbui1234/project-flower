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
function deleteCategories()
{
    if (isset($_GET['delete'])) {
        global $conn;
        $id = $_GET['delete'];
        $sql = "delete from categories where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
    }
}
function showDataUpdate()
{
    if (isset($_GET['update'])) {
        global $conn;
        $id = $_GET['update'];
        $sql = " select name from categories where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataUpdateCate;
        $dataUpdateCate = $statement->fetchAll();

    }

}
function updateCate()
{
    if (isset($_POST['updateCategory'])) {
        global $conn;
        $id = $_GET['update'];
        $name = $_POST['category2'];

        $sql = "update categories set name = '$name' where id = $id ";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header('location: index.php?act=categories&successUpdate');

        }

    }

}
