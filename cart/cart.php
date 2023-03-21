<?php include './layout/header.php'?>

<?php include './model/functions.php'?>



<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;?>



<?php switch ($act) {
    case 'createBill':
        include './view/showBill.php';
        break;
    case 'submit':
        addCart();
        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Đơn hàng đã được gửi đi',
            showConfirmButton: false,
            timer: 1500
          })</script>";
        header('location: /project-flower/index.php');  
        break;
    default:
        include './view/showCart.php';
        break;

}?>




<!-- Footer-->

<?php include './layout/footer.php'?>