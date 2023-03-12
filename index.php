<?php include './layout/header.php'?>

<body id="page-top">
    <?php include './layout/nav.php'?>


    <?php isset($_GET['act']) ? $url = $_GET['act'] : $url = false;

switch ($url) {

    case 'he';
        echo "hi";
        break;
    case 'search';

        echo " tim kiem san pham";
        include './view/search/search.php';
        break;

        case 'profile';
        include './view/profile/profile.php';   
        break;

    default:
        include './view/products/product.php';
        break;
}

?>



    <?php include './layout/footer.php'?>