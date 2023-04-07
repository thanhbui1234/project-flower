<?php include './model/connect.php';

function waitAccpetOrder()
{
    if (isset($_SESSION['userId'])) {

        global $conn;

        $sql = "select id ,total from bills where status = 'No_confirm' and userId = $_SESSION[userId] order by id desc   ";
        $statemnet = $conn->prepare($sql);
        $statemnet->execute();
        global $dataWaitAccpetOrder;
        $dataWaitAccpetOrder = $statemnet->fetchAll();

    }
}

function selectAboutBill($id)
{

    if (isset($id)) {

        global $conn;
        $sql = "SELECT image , productName, amount from bill_detail where bill = $id";
        $statemnet = $conn->prepare($sql);
        $statemnet->execute();
        global $dataAboutBill;
        $dataAboutBill = $statemnet->fetchAll();

    }

}

function cancelBill()
{

    if (isset($_GET['CancelBill'])) {

        global $conn;
        $id = $_GET['CancelBill'];
        $sql = " update bills set status = 'canceled' where id = $id";
        $statemnet = $conn->prepare($sql);
        $statemnet->execute();

    }

}

function showCancelBill()
{if (isset($_SESSION['userId'])) {

    global $conn;

    $sql = "select id ,total from bills where status = 'canceled' and userId = $_SESSION[userId]   order by id desc  ";
    $statemnet = $conn->prepare($sql);
    $statemnet->execute();
    global $dataCancellBill;
    $dataCancellBill = $statemnet->fetchAll();

}

}

function selectCancelBill($id)
{
    if (isset($id)) {

        global $conn;
        $sql = "SELECT image , productName, amount from bill_detail where bill = $id";
        $statemnet = $conn->prepare($sql);
        $statemnet->execute();
        global $dataAboutBillCancel;
        $dataAboutBillCancel = $statemnet->fetchAll();

    }

}

function showDeleveringBill()
{
    if (isset($_SESSION['userId'])) {

        global $conn;
        $sql = "select id ,total from bills where status = 'delivering' and userId = $_SESSION[userId]   ";
        $statemnet = $conn->prepare($sql);
        $statemnet->execute();
        global $dataDelivering;
        $dataDelivering = $statemnet->fetchAll();

    }

}
function selectAboutDeliveringBill($id)
{

    if (isset($id)) {

        global $conn;
        $sql = "SELECT image , productName, amount from bill_detail where bill = $id";
        $statemnet = $conn->prepare($sql);
        $statemnet->execute();
        global $dataAboutDeliveringBill;
        $dataAboutDeliveringBill = $statemnet->fetchAll();
        echo (count($dataAboutDeliveringBill));

    }

}

function showBillsDelivered()
{
    if (isset($_SESSION['userId'])) {

        global $conn;
        $sql = "select id ,total from bills where status = 'delivered' and userId = $_SESSION[userId]   ";
        $statemnet = $conn->prepare($sql);
        $statemnet->execute();
        global $dataDelivered;
        $dataDelivered = $statemnet->fetchAll();

    }

}

function selectAboutDelivered($id)
{

    if (isset($id)) {

        global $conn;
        $sql = "SELECT image , productName, amount from bill_detail where bill = $id";
        $statemnet = $conn->prepare($sql);
        $statemnet->execute();
        global $dataAboutDelivered;
        $dataAboutDelivered = $statemnet->fetchAll();
        echo (count($dataAboutDelivered));

    }

}