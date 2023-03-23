<?php include './layout/header.php';
include './model/product.php';
include './model/category.php';
include './model/user.php';

?>

<body id="page-top">
    <?php
load_name_category();
include './layout/nav.php';
?>

    <?php

showproduct();
?>

    <?php isset($_GET['act']) ? $url = $_GET['act'] : $url = false;

switch ($url) {

    case 'aboutproducts';
        showaboutproducts();
        showproduct();
        include './view/products/aboutproduct.php';
        break;

    case 'category';
        loadcategory();
        include './view/category/category.php';

        break;
    case 'search';
        search();
        include './view/search/search.php';
        break;

    case 'profile';
    updateProfile();
        include './view/profile/profile.php';
        break;

    case 'changepassword';
        include './view/profile/changepassword.php';
        break;
    default:
        include './view/products/product.php';
        break;
}

?>



    <?php include './layout/footer.php'?>