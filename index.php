<?php include './layout/header.php';
include './model/pdo.php';
include './model/product.php';
?>

<body id="page-top">
    <?php include './layout/nav.php' ?>


    <?php
    $showhome = showhome();
    isset($_GET['act']) ? $url = $_GET['act'] : $url = false;

    switch ($url) {
        case 'aboutproducts';
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $spct = sohwspct($id);
                $showhome = showhome();
                include './view/products/aboutproduct.php';
            }
            break;
        case 'search';

            echo " tim kiem san pham";
            include './view/search/search.php';
            break;

        case 'profile';
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



    <?php include './layout/footer.php' ?>