<?php

include_once 'connect.php';

function countAll() {
    global $conn;

    $sqlProduct = "SELECT COUNT(*) FROM products";
    $statement = $conn->prepare($sqlProduct);
    $statement ->execute();
    global $countProducts;
    $countProducts = $statement -> fetchColumn();
    
    $sqlCategory = "SELECT COUNT(*) FROM categories";
    $statement = $conn->prepare($sqlCategory);
    $statement ->execute();
    global $countCategories;
    $countCategories = $statement -> fetchColumn();

    $sqlUser = "SELECT COUNT(*) FROM users";
    $statement = $conn->prepare($sqlUser);
    $statement ->execute();
    global $countUsers;
    $countUsers = $statement -> fetchColumn();

    $sqlComment = "SELECT COUNT(*) FROM comments";
    $statement = $conn->prepare($sqlComment);
    $statement ->execute();
    global $countComments;
    $countComments = $statement -> fetchColumn();

}