<!-- <?php ob_start()?> -->
<?php include './layout/header.php'?>

<?php include './layout/sidebar.php'?>

<?php include './layout/nav.php'?>

<?php require_once './models/product.php'?>
<?php require_once './models/categories.php'?>



<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;

switch ($act) {
    case 'addProd':
        addProducts();
        selectOptionCategory();
        include '../admin/view/products/addProd.php';
        break;
    case 'listProd':
        showProducts();
        include '../admin/view/products/listProd.php';
        break;

    case 'categories':
        deleteCategories();
        addCategories();
        include '../admin/view/categories/categories.php';
        break;

    default:

        include './view/home/home.php';
        break;
}

?>









<?php include './layout/footer.php'?>