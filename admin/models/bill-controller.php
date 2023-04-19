<?php 
    function showBill(){
        global $conn;
        $sql = "SELECT * FROM bills WHERE status ='No_confirm'";
        $statement = $conn -> prepare($sql);
        $statement -> execute();
        global $bills;
        $bills = $statement -> fetchAll();
    }
    function showConfirmedBill(){
        global $conn;
        $sql = "SELECT * FROM bills WHERE status IN ('delivered','delivering')";
        $statement = $conn -> prepare($sql);
        $statement -> execute();
        global $bills;
        $bills = $statement -> fetchAll();
    }
    function updateAmount($id){
        global $conn;
        $sql = "SELECT * FROM bill_detail WHERE bill = $id";
        $statement = $conn -> prepare($sql);
        $statement -> execute();
        global $getProduct;
        $getProduct = $statement -> fetchAll();
        foreach($getProduct as $gP){
            extract($gP);
            $query = "UPDATE products SET amount = amount - $amount where id = $idProduct";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
        }
    }
    function checkStatus(){
        global $conn;
        $query = "UPDATE products SET status = 'Hết hàng' where amount = 0";
        $stmt = $conn -> prepare($query);
        $stmt -> execute();
    }
    function confirmBill() {
        if (isset($_GET["id"])) {
            global $conn;
            $id = $_GET["id"];
            updateAmount($id);
            checkStatus();
            $sql = "UPDATE bills SET status = 'delivering' WHERE id = $id";
            $statement = $conn-> prepare($sql);
            if ($statement -> execute()) {
                header("location: index.php?act=bills");
                }
            }
        }
    function deliveryConfirm() {
            if (isset($_GET["id"])) {
                global $conn;
                $id = $_GET["id"];
                $sql = "UPDATE bills SET status = 'delivered' WHERE id = $id";
                $statement = $conn-> prepare($sql);
                if ($statement -> execute()) {
                    header("location: index.php?act=confirmed-bill");
                    }
                }
        }
    function showInfor(){
        if (isset($_GET["id"])) {
            global $conn;
            $id = $_GET["id"];
            $sql = "SELECT * FROM bills WHERE id=$id";
            $statement = $conn -> prepare($sql);
            $statement -> execute();
            global $billInf;
            $billInf = $statement -> fetchAll();
        }
    }
    function showDetail(){
        if (isset($_GET["id"])) {
            global $conn;
            $id = $_GET["id"];
            $sql = "SELECT * FROM bill_detail WHERE bill=$id";
            $statement = $conn -> prepare($sql);
            $statement -> execute();
            global $products;
            $products = $statement -> fetchAll();
        }
    }
?>