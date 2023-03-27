<?php
include 'connect.php';

function showNameAvt()
{

    if (isset($_SESSION['userId'])) {
        global $conn;
        $sql = "SELECT userName ,image from users WHERE id = $_SESSION[userId]";
        $stament = $conn->query($sql);
        $stament->execute();
        global $dataUser;
        $dataUser = $stament->fetchAll();

    }

}
