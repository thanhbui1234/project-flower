<?php
include_once 'connect.php';

function search()
{

    if (isset($_POST['btnSubmitSearch'])) {
        global $conn;

        $value = $_POST['search'];

        $sql = "SELECT * from products WHERE tag like '%$value%' or name like '%$value%' and tag not like ' ,' ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataSearch;
        $dataSearch = $statement->fetchAll();
        // print_r($dataSearch);
    }

}
