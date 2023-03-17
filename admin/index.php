<!-- <?php ob_start() ?> -->
<?php include './layout/header.php' ?>


<?php include './layout/sidebar.php' ?>


<?php include './layout/nav.php' ?>

<?php include './models/product.php' ?>



<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;

switch ($act) {
    case 'addProd':
        addProducts();
        include '../admin/view/products/addProd.php';
        break;
    case 'listProd':
        include '../admin/view/products/listProd.php';
        break;

    case 'categories':
        include '../admin/view/categories/categories.php';
        break;

    default:

        include './view/home/home.php';
        break;
}

?>









<?php include './layout/footer.php' ?>