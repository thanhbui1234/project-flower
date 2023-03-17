<?php
include_once 'connect.php';

// function showCon()
// {
//     global $conn;
//     print_r($conn);

// }
// showCon();

function addProducts()

{


    if (isset($_POST['addProd'])) {
        global $conn;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $name = $_POST['prod_name'];
        $image = $_FILES['prod_img']['name'];
        $prod_image_tmp = $_FILES['prod_img']['tmp_name'];
        $target_dir = './uploads/';
        $target_file = $target_dir . $image;
        move_uploaded_file($prod_image_tmp, $target_file);

        $price = $_POST['prod_price'];
        $deal = $_POST['prod_deal'];
        $category = $_POST['prod_category'];
        $date = date("Y-m-d H:i a ");
        $description = $_POST['prod_desc'];
        $status = $_POST['prod_status'];

        $tag = $_POST['prod_tag'];


        $sql = "INSERT INTO products (name, image, price, deal, category, date, description, status, tag) VALUES ('$name', '$image', '$price', '$deal', '1
        ', '$date', '$description', '$status', '$tag')";


        $statement = $conn->prepare($sql);
        $statement->execute();

        // echo $name;
    }

    // Validate product
    // global $errProduct;
    // $errProduct = [];

    // if (empty($name)) {
    //     $errProduct['name'] = 'Bạn thiếu tên sản phẩm';
    // }

    // if ($category == 'default') {
    //     $errProduct['category'] = 'Bạn thiếu loại sản phẩm';
    // }

    // if (!is_numeric($price) || empty($price)) {
    //     $errProduct['price'] = 'Giá có vấn đề';
    // }

    // if (empty($image)) {
    //     $errProduct['image'] = 'Bạn thiếu hình ảnh';
    // }



    // $price_old = $price;

    // $product_deal_price = ($price * $deal) / 100;

    // $price = $price_old - $product_deal_price;

}

// function addProducts()
// {

//     if (isset($_POST['addProd'])) {
//         echo 'ok';
//     }
// }
