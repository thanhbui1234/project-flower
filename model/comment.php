<?php
include './model/connect.php';?>
<?php

function showcmt()
{
    $id = $_GET['id'];
    $sql = "SELECT users.name,comments.content,users.image,users.userName,comments.date
    FROM ((comments
    INNER JOIN products ON comments.product = products.id)
    INNER JOIN users ON comments.user = users.id)
    where products.id = '$id'";
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $showcmt;
    $showcmt = $statement->fetchAll();
}

function addcmt()
{
    if (isset($_POST['submit'])) {
        $noidung = $_POST['noidung'];
        $id = $_GET['id'];
        $datecmt = date("Y-m-d H:i a ");
        $sqls = "INSERT INTO comments (content,product,user,date) VALUES ('$noidung','$id','$_SESSION[userId]','$datecmt')";
        global $conn;
        $statement = $conn->prepare($sqls);

        if ($statement->execute()) {

        }
    }
}
