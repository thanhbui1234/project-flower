<?php 
    function showBill(){
        global $conn;
        $sql = "SELECT * FROM bills WHERE status IN ('No_confirm','delivering')";
        $statement = $conn -> prepare($sql);
        $statement -> execute();
        global $bills;
        $bills = $statement -> fetchAll();
    }
    function deleteBill() {
        if (isset($_GET['deleteBill'])) {
            global $conn;
            $id = $_GET['deleteBill'];
            $sql = "DELETE FROM bills WHERE id = $id";
            $statement = $conn->prepare($sql);
            if($statement -> execute()) {
                header("location: index.php?act=bills");
            }
        }
    }
    function confirmBill() {
        if (isset($_POST['confirmBill'])) {
            global $conn;
            $id = $_GET["id"];
            }
            global $conn;
            $sql = "UPDATE bills SET status = 'delivering' WHERE id = $id ";
            $statement = $conn-> prepare($sql);
            if ($statement -> execute()) {
                header("location: index.php?act=listProd");
                }
            }
?>