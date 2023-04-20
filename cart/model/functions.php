<?php
include 'connect.php';
function getCart()
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_POST['add_cart']) && ($_POST['add_cart'])) {
        $id = $_POST['idProduct'];
        $name = $_POST['name'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $deal = $_POST['price'] * ($_POST['deal'] / 100);
        $amount = $_POST['amount'];
        $sum = ($price - $deal) * $amount;
        $check = 0;
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i][6] == $id) {
                $check = 1;
                $new_amount = $amount + $_SESSION['cart'][$i][4];
                $new_sum = ($price - $deal) * $new_amount;
                $_SESSION['cart'][$i][4] = $new_amount;
                $_SESSION['cart'][$i][5] = $new_sum;
                break;
            }
        }
        if ($check == 0) {
            $product_added = [$name, $image, $price, $deal, $amount, $sum, $id];
            $_SESSION['cart'][] = $product_added;
            global $product_added;
        }
    }
}
function createBill()
{

    session_start();
    global $conn;
    $customer = $_POST['customer'];
    $userId = $_SESSION['userId'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $total = $_POST['total'];
    $dateCreate = date("Y-m-d H:i a ");
    $sql = "insert into bills (customer,userId,phone,email,address,total,date) values ('$customer','$userId','$phone','$email','$address','$total','$dateCreate')";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $id = $conn->lastInsertId();
    return $id;
}
function addCart()
{
    $bill = createBill();
    global $conn;

    $arr = $_POST['arrQuanlity'];

    $check = 0;
    foreach ($_SESSION['cart'] as $cart) {
        $name = $cart[0];
        $image = $cart[1];
        $price = $cart[2];
        $deal = $cart[3];
        $amount = $cart[4];
        $sum = $cart[5];
        $idProduct = $cart[6];
        $sql = "insert into bill_detail (bill,idProduct,productName,image,price,deal,amount,sum) values ('$bill','$idProduct','$name','$image','$price','$deal','$amount','$sum')";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            $check = 1;
        }

    }
    if ($check == 1) {
        header('location: /project-flower/index.php');
    }
    unset($_SESSION['cart']);
    //header('location: /project-flower/index.php');
}