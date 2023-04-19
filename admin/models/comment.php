<?php
include 'connect.php';?>
<?php

function showcmt()
{
    $sql = "SELECT comments.product, comments.content,users.image,users.userName,comments.date,products.name,comments.id,comments.status,comments.img
    FROM ((comments
    INNER JOIN products ON comments.product = products.id)
    INNER JOIN users ON comments.user = users.id)";
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $showcmt;
    $showcmt = $statement->fetchAll();
}

function updatecmt()
{
    $id = $_GET['id'];
    $sql = "UPDATE comments
    SET status = '2'
    WHERE id = $id";
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    header("location: index.php?act=comment");
}

function delcmt()
{
    if (isset($_GET['delete'])) {
        global $conn;
        $id = $_GET['delete'];
        $sql = "DELETE FROM comments WHERE id = $id";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header("location: index.php?act=comment");
        }
    }
}
