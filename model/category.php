<?php include './model/connect.php'; ?>

<?php
function load_name_category()
{
    $sql = "SELECT * FROM categories order by name";
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $load_name_category;
    $load_name_category = $statement->fetchAll();
}

function loadcategory()
{
    if (isset($_GET['id']) && ($_GET['id'] > 0))
        $id = $_GET['id'];
    $sql = "SELECT * FROM products where category= " . $id;
    global $conn;
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $loadcategory;
    $loadcategory = $statement->fetchAll();
}
?>
