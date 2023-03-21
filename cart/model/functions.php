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
    function createBill(){
        session_start();
        global $conn;
        $customer = $_SESSION['userId'];
        $dateCreate = date("Y-m-d H:i a ");
        $sql = "insert into bills (customer,date) values ('$customer','$dateCreate')";
        $statement = $conn -> prepare ($sql);
        $statement -> execute();
        $id = $conn -> lastInsertId();
        return $id;
    }
    function addCart(){
        $bill = createBill();
        global $conn;
        foreach($_SESSION['cart'] as $cart){
            $name = $cart[0];
            $image = $cart[1];
            $price = $cart[2];
            $deal = $cart[3];
            $amount = $cart[4];
            $sum = $cart[5];
            $sql = "insert into bill_detail (bill,productName,image,price,deal,amount,sum) values ('$bill','$name','$image','$price','$deal','$amount','$sum')";
            $statement = $conn -> prepare ($sql);
            $statement -> execute();
        }
        unset($_SESSION['cart']);   
    }
?>
