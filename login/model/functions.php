<?php
include 'connect.php';

function register()
{
    if (isset($_POST['register'])) {
        global $conn;

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $userName = htmlspecialchars($_POST['userName']);
        $password = htmlspecialchars($_POST['password']);
        $password2 = htmlspecialchars($_POST['password2']);
        $dateRegister = date("Y-m-d H:i a ");

        $arr = ['cost' => 12];
        $phone;
        $password = password_hash($password, PASSWORD_BCRYPT, $arr);

        $sql = " insert into users (name , password ,userName ,phone ,email,date ) ";
        $sql .= " values ( '$name','$password','$userName','$phone','$email','$dateRegister' ) ";
        $statement = $conn->prepare($sql);

        if ($statement->execute()) {
            echo "<script>Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Bạn đã đăng ký thành công',
  showConfirmButton: false,
  timer: 1500
})</script>";
        }

    }

}
function checkUniqeEmail()
{

    global $conn;
    $sql = "SELECT email from users ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataEmailUnique = $statement->fetchAll();
    global $arrEmailUniqeue;
    $arrEmailUniqeue = [];

    foreach ($dataEmailUnique as $email) {

        array_push($arrEmailUniqeue, $email);
    }

}
function checkUniqePhone()
{

    global $conn;
    $sql = "SELECT phone from users ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataPhoneUnique = $statement->fetchAll();
    global $arrPhoneUniqeue;
    $arrPhoneUniqeue = [];

    foreach ($dataPhoneUnique as $phone) {

        array_push($arrPhoneUniqeue, $phone);
    }

}

function checkUniqeUserName()
{
    global $conn;
    $sql = "SELECT userName from users ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $datauserNameUnique = $statement->fetchAll();
    global $arruserNameUniqeue;
    $arruserNameUniqeue = [];

    foreach ($datauserNameUnique as $userName) {

        array_push($arruserNameUniqeue, $userName);
    }

}
function login()
{
    if (isset($_POST['login'])) {

        global $conn;

        $userName = htmlspecialchars($_POST['userName']);
        $password = htmlspecialchars($_POST['password']);
        global $errLogin;
        $errLogin = [];

        if (empty($userName)) {
            return $errLogin['userName'] = 'Bạn phải nhập tài khoản đăng nhập';

        }

        try {
            if (empty($password)) {
                return $errLogin['password'] = 'Bạn phải nhập mật khẩu';

            }

            $sql = "select * from users where userName = '$userName' ";
            $statement = $conn->prepare($sql);
            $statement->execute();

            $dataLogin = $statement->fetchAll();
            if (empty($dataLogin)) {
                return $errLogin['falseUserName'] = 'Tai khoan sai';
            }
            foreach ($dataLogin as $user) {

                $userPassword = $user['password'];
            }

            if ((password_verify($password, $userPassword))) {
                session_start();
                echo $_SESSION['userId'] = $user['id'];
                echo $_SESSION['user_fullName'] = $user['name'];
                echo $_SESSION['userName'] = $user['userName'];
                echo $_SESSION['role'] = $user['role'];
                echo $_SESSION['address'] = $user['address'];
                echo $_SESSION['phone'] = $user['phone'];
                echo $_SESSION['email'] = $user['email'];
                header('location: /project-flower/index.php');

            } else {

                return $errLogin['falsePassword'] = 'Mat khau sai';

            }

        } catch (Exception $e) {
            echo ': ' . $e->getMessage();

        }

    }

}

?>



<!-- <script>
alert('ok');
</script> -->