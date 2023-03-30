<?php
include 'connect.php'; ?>
<?php


function showcmt()
{
    $sql = "SELECT comments.content,users.image,users.userName,comments.date,products.name,comments.id,comments.trangthai
    FROM ((comments
    INNER JOIN products ON comments.product = products.id)
    INNER JOIN users ON comments.user = users.id)";
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $showcmt;
    $showcmt = $statement->fetchAll();
}

function updatecmt1()
{
    $id = $_GET['id'];
    $sql = "UPDATE comments
    SET status = '2', trangthai= 'chưa duyệt'
    WHERE id = $id";
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    header("location: index.php?act=comment");
}

function updatecmt2()
{
    $id = $_GET['id'];
    $sql = "UPDATE comments
    SET status = '1', trangthai= 'đã duyệt'
    WHERE id = $id";
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    header("location: index.php?act=comment");
}

function delcmt()
{
    global $conn;
    $id = $_GET['id'];
    $sql = "delete from comments where id = $id";
    $statement = $conn->prepare($sql);
    $statement->execute();
    header("location: index.php?act=comment");
}

?>
