<?php
include_once 'connect.php';

function showCategories()
{
    global $conn;
    $sql = "SELECT * from categories ";
    $statement = $conn->prepare($sql);
    $statement->execute();

    global $dataCategories;
    $dataCategories = $statement->fetchAll();

}
