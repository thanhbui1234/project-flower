<?php
include_once 'connect.php';

function showDataUser(){
if(isset($_SESSION["userId"]))
global $conn;
$id=$_SESSION["userId"];
$sql="SELECT * FROM users WHERE id=$id";
$statement = $conn->prepare($sql);
$statement->execute();
global $dataUser;
$dataUser= $statement->fetchAll();


}
function updateProfile(){
    if(isset($_POST["saveProfile"])){
        global $conn;
        $id= $_SESSION["userId"];
        $userName= $_POST["user_profile"]; 
        $Email= $_POST["email_profile"];
        $Address= $_POST["address_profile"];
        $Phone= $_POST["phone_profile"];
        
        
    // if(empty($_FILES["pickimg"]["name"])){ //kiểm tra xem có chọn ảnh hay không bằng cách check key "name" có trả về chuỗi rỗng hay không
    //     $Image = $_POST["old-img"];//nếu "name" trả về rỗng thì thực hiện lấy tên ảnh cũ từ $_POST theo key "old-image" để gán cho biến $productImage
    // }else{ //ngược lại nếu "name" không rỗng
    //     $Image =  $_FILES["pickimg"]["name"]; //lấy ra tên ảnh từ file mới chọn và gán cho biến $productImage
    //     move_uploaded_file($_FILES["pickimg"]["tmp_name"],"/../project-flower/admin/uploads/".$_FILES["pickimg"]["name"]);//thực hiện chuyển file từ thư mục tạm vào thư mục image
    // }
       $img=$_FILES["pickimg"]["name"];

      if (empty($img)) {
        $sqlavt = "select image from users where id = $id "; 
        $statementAvt = $conn->prepare($sqlavt);
        $statementAvt->execute();
        $dataAvt = $statementAvt->fetchAll();
        foreach ($dataAvt as $avtt) {

            $img = $avtt['image'];
        }
     
        

    }

    $avt_image_tmp = $_FILES['pickimg']['tmp_name'];
    $targe_dir = '../admin/uploads/';
    $target_file = $targe_dir . $img;
    move_uploaded_file($avt_image_tmp, $target_file);
    
    $sql = " UPDATE `users` SET `name`='$userName',`address`='$Address',`phone`='$Phone',`email`='$Email' WHERE id=$id ";
    global $conn;
    $statement = $conn->prepare($sql);
$statement->execute();
        }
    
    
    }


?>