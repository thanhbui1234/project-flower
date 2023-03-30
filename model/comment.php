<?php
include './model/connect.php'; ?>
<?php


function showcmt()
{
    $id = $_GET['id'];
    $sql = "SELECT users.name,comments.content,users.image,users.userName,comments.date,comments.id,comments.status
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
        $sqls = "INSERT INTO comments (content,product,user,date,status,trangthai) VALUES ('$noidung','$id','$_SESSION[userId]','$datecmt','1','chưa duyệt')";
        global $conn;
        $statement = $conn->prepare($sqls);

        if ($statement->execute()) {
            header("location: index.php?act=aboutproducts&id=$id");
        }
    }
}

function deleteCmt()
{
    if (isset($_GET['id']) && ($_GET['id']) > 0) {
        global $conn;
        $id = $_GET['id'];
        $sql = "DELETE FROM comments WHERE id = $id";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
        }
    }
}

function showstatus()
{
    $sql = "SELECT * FROM comments";
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $showstatus;
    $showstatus = $statement->fetchAll();
}


?>