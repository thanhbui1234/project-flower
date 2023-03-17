   <?php session_start()?>
   <?php include './layout/header.php'?>

   <body id="page-top">
       <?php include './layout/nav.php'?>

       <?php require_once './model/search.php'?>


       <?php isset($_GET['act']) ? $url = $_GET['act'] : $url = false;

switch ($url) {

    case 'aboutproduct';
        include './view/products/aboutproduct.php';
        break;
    case 'search';
        search();
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



       <?php include './layout/footer.php'?>