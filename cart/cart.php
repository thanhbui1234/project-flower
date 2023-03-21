<?php include './layout/header.php'?>

<?php include './model/functions.php'?>



<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;?>



<?php switch ($act) {

    default:
        include './view/showCart.php';
        break;

}?>




<!-- Footer-->

<?php include './layout/footer.php'?>