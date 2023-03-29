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
        $sql = "SELECT * FROM bills WHERE status IN ('confirmed','delivering')";
        $statement = $conn -> prepare($sql);
        $statement -> execute();
        global $bills;
        $bills = $statement -> fetchAll();
    }
    function confirmBill() {
        if (isset($_GET["id"])) {
            global $conn;
            $id = $_GET["id"];
            $sql = "UPDATE bills SET status = 'delivering' WHERE id = $id";
            $statement = $conn-> prepare($sql);
            if ($statement -> execute()) {
                header("location: index.php?act=bills");
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