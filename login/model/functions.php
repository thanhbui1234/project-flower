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
            echo $_SESSION['address'] = $user['address'];
            echo $_SESSION['phone'] = $user['phone'];
            echo $_SESSION['email'] = $user['email'];
            header('location: /project-flower/index.php');

        } else {

            return $errLogin['falsePassword'] = 'Mat khau sai';

        }

    }

}




function rand_string($length){
    $chars="qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
    $size= strlen($chars);
    $str='';
    for($i=0;$i<$length;$i++){
        $str.=$chars[rand(0,$size-1)];
    }
    return $str;
}

function forgotpass()
{
  

    if (isset($_POST["email"])) {
    $email=$_POST["email"];
    global $conn;
    $sql = " select userName from users where email = '$email'";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $dataPassword = $statement->fetchAll();
    global $true;
    $true=true;
   
    if(empty($dataPassword)){
   
        $true=false;
    }else{
        require("PHPMailer-master/src/PHPMailer.php");
        require("PHPMailer-master/src/SMTP.php");
        require("PHPMailer-master/src/Exception.php");
        $mail = new PHPMailer\PHPMailer\PHPMailer(); 
        $mail->IsSMTP(); // enable SMTP
    
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "nvhuy113114@gmail.com";
        $mail->Password = "meyckqrpblzhzukk";
        $mail->SetFrom("nvhuy113114@gmail.com");
        $mail->Subject = "Update Password";
       
        foreach ($dataPassword as $a) {
         
            $randpass= rand_string(8);
            $mail->Body = "<h3> Dear ".$a["userName"].'</h3>';
            $mail->Body .= "We have received a request to re-issue your password recently.<br>";
            $mail->Body .= "We have update and sent you a new password.<br>";
            $mail->Body .= "Your new password is : <b>$randpass</b>";


        }
        global $send;
        $send=false;
        $mail->AddAddress($email);
    
        if($mail->Send()){
            $send=true;
      
        }
           $hash=password_hash($randpass, PASSWORD_DEFAULT);
           $sql = " UPDATE `users` SET `password`='$hash' WHERE email='$email' ";
           global $conn;
           $statement = $conn->prepare($sql);
           $statement->execute();
           


         

    }
  
   


}
}

?>



<!-- <script>
alert('ok');
</script> -->
