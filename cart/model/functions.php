<?php
    include 'connect.php';
    function getCart(){
    if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    if(isset($_POST['add_cart'])&&($_POST['add_cart']))
    {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $deal = $_POST['price']*($_POST['deal']/100);
    $amount = $_POST['amount'];
    $sum = ($price - $deal)*$amount;
    $check = 0;
    for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
        if($_SESSION['cart'][$i][0]==$name){
            $check = 1;
            $new_amount=$amount+$_SESSION['cart'][$i][4];
            $new_sum = ($price - $deal)*$new_amount;
            $_SESSION['cart'][$i][4] = $new_amount;
            $_SESSION['cart'][$i][5] = $new_sum;
            break;
        }
    }
    if($check == 0){
    $product_added = [$name,$image,$price,$deal,$amount,$sum];
    $_SESSION['cart'][] = $product_added;
    }  
    }
}
?>
