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

        if (empty($password)) {
            $errLogin['password'] = 'Bạn phải nhập mật khẩu';

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

            header('location: /project-flower/index.php');

        } else {

            return $errLogin['falsePassword'] = 'Mat khau sai';

        }

    }

}


?>


<!-- <script>
alert('ok');
</script> -->
