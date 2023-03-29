<!-- <?php ob_start()?> -->
<?php include './layout/header.php'?>

<?php include './layout/sidebar.php'?>

<?php include './layout/nav.php'?>

<?php include './models/product.php'?>

<?php include './models/categories.php'?>


<?php include './models/count.php'?>




<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;

switch ($act) {
    case 'addProd':
        addProducts();
        showCategories();
        include '../admin/view/products/addProd.php';
        break;
    case 'listProd':
        showProducts();
        deleteProduct();
        applyProd();
        include '../admin/view/products/listProd.php';
        break;

    case 'update_prod';
        showProdUpdate();
        updateProduct();
        include '../admin/view/products/updateProd.php';
        break;

    case 'categories':
        addCategories();
        deleteCategories();
        include '../admin/view/categories/categories.php';
        break;
    case 'users':
        showUsers();
        deleteUsers();
        include '../admin/view/users/users.php';
        break;
    default:
        countAll();
        include './view/home/home.php';
        break;
}

?>









<?php include './layout/footer.php'?>