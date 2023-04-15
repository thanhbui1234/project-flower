<?php include './layout/header.php'?>

<?php include './model/functions.php'?>




<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;?>



<?php switch ($act) {

    case 'register';
        checkUniqeEmail();
        checkUniqePhone();
        checkUniqeUserName();
        register();
        include './view/register.php';

        break;

        case 'forgotpass';
        forgotpass();
        include './view/forgotpass.php';

        break; 

    default:
        login();
        include './view/home.php';

        break;

}?>




<!-- Footer-->

<?php include './layout/footer.php'?>