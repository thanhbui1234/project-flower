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
        $amount = $_POST['prod_amount'];
        $tag = $_POST['prod_tag'];
    

    // Validate product

            $sql = "INSERT INTO products (name, image, price, deal, category, date, description, amount, tag) VALUES ('$name', '$image', '$price', '$deal', '$category', '$date', '$description', '$amount', '$tag')";

            $statement = $conn->prepare($sql);
            if ($statement->execute()) {
                header("location:index.php?act=listProd");
            }
    
            
                // $price_old = $price;
            
                // $product_deal_price = ($price * $deal) / 100;
            
                // $price = $price_old - $product_deal_price;
        }

    }

function showProducts(){
    global $conn;
    $sql = "SELECT * FROM products";
    $statement = $conn -> prepare($sql);
    $statement -> execute();
    global $dataProducts;
    $dataProducts = $statement -> fetchAll();
}

function selectNameCategory($category) {
    if ($category) {
        global $conn;
        $sql = "SELECT name FROM categories WHERE id = $category";
        $statement = $conn ->query($sql);
        $statement ->execute();
        global $dataNameCategory;
        $dataNameCategory = $statement ->fetchAll();
    }
}

function selectCategory($category){
    if (isset($category)){
        global $conn;
        $sql = "SELECT * FROM categories WHERE id = $category";
        $statement = $conn -> prepare($sql);
        $statement -> execute();
        global $dataNameCate;
        $dataNameCate = $statement -> fetchAll();
    }
}


function selectDifferentCategory($data) {
    if (isset($data)) {
        global $conn;
        $sql = "SELECT * FROM categories WHERE name != '$data'";
        $statement = $conn -> prepare($sql);
        $statement -> execute();
        global $dataDifferentCategory;
        $dataDifferentCategory = $statement -> fetchAll();
    }
}

function updateProduct() {
    if (isset($_POST['updateProd'])) {
        global $conn;
        $id = $_GET["id"];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $name = $_POST['prod_name'];
        $image = $_FILES['prod_img']['name'];

        if (empty($image)) {
            $sql_img = "SELECT image FROM products WHERE id = $id";
            $statement_img = $conn -> prepare($sql_img);
            $statement_img -> execute();

            $data_img = $statement_img -> fetchAll();

            foreach ( $data_img as $value ) {
                $image = $value['image']; 
            } 
        }

        $prod_image_tmp = $_FILES['prod_img']['tmp_name'];
        $target_dir = './uploads/';
        $target_file = $target_dir . $image;
        move_uploaded_file($prod_image_tmp, $target_file);

        $price = $_POST['prod_price'];
        $deal = $_POST['prod_deal'];
        $category = $_POST['prod_category'];
        $date = date("Y-m-d H:i a ");
        $description = $_POST['prod_desc'];
        $amount = $_POST['prod_amount'];
        $tag = $_POST['prod_tag'];

        global $errUpdate;
        $errUpdate = [];

        if (empty($name)) {
            $errUpdate['name'] = 'Bạn thiếu tên sản phẩm';
        }

        if (!is_numeric($price)) {
            $errUpdate['price'] = 'Giá có vấn đề';
        }

        if ($amount < 0) {
            $errUpdate['amount'] = 'Số lượng có vấn đề';
        }

        if (empty($errUpdate)) {
            global $conn;

            $sql = "UPDATE products SET name = '$name', image = '$image', price = '$price', deal = '$deal', category = '$category', date = '$date', description = '$description', amount = '$amount', tag = '$tag' WHERE id = $id";

            $statement = $conn-> prepare($sql);

            if ($statement -> execute()) {

                header("location: index.php?act=listProd");
            }
        }
    }
}

function showProdUpdate() {
    if (isset($_GET['id'])) {
        global $conn;
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = $id";
        $statement = $conn->prepare($sql);
        $statement -> execute();
        global $dataProdUpdate;
        $dataProdUpdate = $statement -> fetchAll();
    }
}

function deleteProduct() {
    if (isset($_GET['deleteProduct'])) {
        global $conn;
        $id = $_GET['deleteProduct'];
        $sql = "DELETE FROM products WHERE id = $id";
        $statement = $conn->prepare($sql);
        if($statement -> execute()) {
            header("location: index.php?act=listProd");
        }
    }
}

function applyProd() {
    if (isset($_POST['apply'])) {
        if (!empty($_POST['checkBoxArr'])) {
            global $conn;
            $checkboxes = $_POST['checkBoxArr'];
            foreach ($checkboxes as $checkbox) {
                $option = $_POST['option'];
                
                switch ($option) {
                    case "delete":
                        $sql = "DELETE FROM products WHERE id = $checkbox";
                        $statement = $conn->query($sql);
                        if ($statement -> execute()) {
                            header("location: index.php?act=listProd");
                        }
                        break;

                    default:
                        echo "<script>Swal.fire('Bạn phải chọn chức năng')</script>";
                        break;
                }

            }
        }
    }
}