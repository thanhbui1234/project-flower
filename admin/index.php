<!-- <?php ob_start()?> -->
<?php include './layout/header.php'?>


<?php include './layout/sidebar.php'?>


<?php include './layout/nav.php'?>





<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;

switch ($act) {
    case 'addProd':

        break;

    default:

        // include './view/home/home.php';
        break;
}

?>









<?php include './layout/footer.php'?>