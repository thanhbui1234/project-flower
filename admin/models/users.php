<?php
include 'connect.php';

function showNameAvt()
{

    if (isset($_SESSION['userId'])) {
        global $conn;
        $sql = "SELECT userName ,image from users WHERE id = $_SESSION[userId] ";
        $stament = $conn->query($sql);
        $stament->execute();
        // global $dataUser;
        $dataUser = $stament->fetchAll();
        foreach ($dataUser as $user) {
            echo "<span class='mr-lg-3'>$user[userName]</span>";
            echo empty($user['image'])
            ? '<img class="mr-lg-5 rounded-circle" width="25" src="/../project-flower/layout/assets/img/avtDefault.jpg" alt="">'
            : "<img class=' ml-lg-2  rounded-circle' width='25' height='' src='/../project-flower/admin/uploads/$user[image]' alt=''>";

        }

    }

}
function showUsers()
{
    global $conn;
    $sql = "select * from users where role = 2 ";
    $stament = $conn->query($sql);
    $stament->execute();
    global $dataAllUsers;
    $dataAllUsers = $stament->fetchAll();

}
function deleteUsers()
{

    if (isset($_GET['deleteUser'])) {
        global $conn;
        $sql = "DELETE FROM users WHERE id = $_GET[deleteUser]";
        $stament = $conn->query($sql);
        if ($stament->execute()) {
            header('location: index.php?act=users');

        }
    }
}
