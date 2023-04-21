<?php
include_once 'connect.php';

function showDataUser()
{
    if (isset($_SESSION["userId"])) {
        global $conn;
    }

    $id = $_SESSION["userId"];
    $sql = "SELECT * FROM users WHERE id=$id";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataUser;
    $dataUser = $statement->fetchAll();

}
function updateProfile()
{

    if (isset($_POST["saveProfile"])) {
        global $conn;
        $id = $_SESSION["userId"];
        $userName = $_POST["user_profile"];
        $Email = $_POST["email_profile"];
        $Address = $_POST["address_profile"];
        $Phone = $_POST["phone_profile"];

        // if(empty($_FILES["pickimg"]["name"])){ //kiểm tra xem có chọn ảnh hay không bằng cách check key "name" có trả về chuỗi rỗng hay không
        //     $Image = $_POST["old-img"];//nếu "name" trả về rỗng thì thực hiện lấy tên ảnh cũ từ $_POST theo key "old-image" để gán cho biến $productImage
        // }else{ //ngược lại nếu "name" không rỗng
        //     $Image =  $_FILES["pickimg"]["name"]; //lấy ra tên ảnh từ file mới chọn và gán cho biến $productImage
        //     move_uploaded_file($_FILES["pickimg"]["tmp_name"],"/../project-flower/admin/uploads/".$_FILES["pickimg"]["name"]);//thực hiện chuyển file từ thư mục tạm vào thư mục image
        // }
        $img = $_FILES["pickimg"]["name"];

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
        $targe_dir = './admin/uploads/';
        $target_file = $targe_dir . $img;
        move_uploaded_file($avt_image_tmp, $target_file);

        $sql = " UPDATE `users` SET `name`='$userName',`address`='$Address',`phone`='$Phone',`email`='$Email' , `image`='$img'  WHERE id=$id ";
        global $conn;
        $statement = $conn->prepare($sql);
       
        global $ok;
            $ok = "false";
           if( $statement->execute()){
              $ok="success";
           }
       
    }

}

function getAvtUser()
{

    if (isset($_SESSION['userId'])) {

        global $conn;
        $sql = "SELECT image  from users WHERE id = $_SESSION[userId]";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $avt;
        $avt = $statement->fetchAll();

        foreach ($avt as $avtt) {
        echo empty($avtt['image'])
        ? '<img class="mr-lg-5 rounded-circle" width="25" src="/../project-flower/layout/assets/img/avtDefault.jpg" alt="">'
        : "<img class='pr-lg-5 rounded-circle' width='27' src='/../project-flower/admin/uploads/$avtt[image]' alt=''>";
        }
     
    }

}   

    function changePasswrod()
{
    if (isset($_POST['savechangepass'])) {

        $password = htmlspecialchars($_POST['recentpass']);

        $newPasswrod = htmlspecialchars($_POST['newpass']);

        $id = $_SESSION['userId'];

        global $conn;

        $sql = " select password from users where id = $id";

        global $errChangePassword;
        $errChangePassword = [];

        $statement = $conn->prepare($sql);
        $statement->execute();
        $dataPassword = $statement->fetchAll();
        foreach ($dataPassword as $passwordOld) {
            $passwordhientai = $passwordOld['password'];

        }

        if (!password_verify($password, $passwordhientai)) {

            $errChangePassword['nowPassword'] = 'Mật khẩu không đúng';

        }

        if (empty($errChangePassword)) {

            $arr = ['cost' => 12];
            $newPasswrod = password_hash($newPasswrod, PASSWORD_BCRYPT, $arr);
            $sqlUpdatePassword = "update users set password = '$newPasswrod' where id =  $id ";
            $statementPassword = $conn->prepare($sqlUpdatePassword);
            global $success;
            $success = "false";
           if( $statementPassword->execute()){
              $success="success";
           }

              

           

        }

    }

}

?>
