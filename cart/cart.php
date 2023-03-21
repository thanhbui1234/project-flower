<?php include './layout/header.php'?>

<?php include './model/functions.php'?>



<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;?>



<?php switch ($act) {
    case 'createBill':
        include './view/showBill.php';
        break;
    case 'submit':
        addCart();
        break;
    default:
        include './view/showCart.php';
        break;

}?>




<!-- Footer-->

<?php include './layout/footer.php'?>