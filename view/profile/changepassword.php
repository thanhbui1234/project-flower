<?php showDataUser();?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<section class="bg-light container  mt-5 p-lg-3  bg-body" id="abcchange">
<?php if (!isset($_SESSION['userId'])) {
    header('Location: /project-flower/index.php?act=false');
}
global $success;
if ($success=="success") {

    echo "<script>swal( 'Success' ,  'Mật khẩu đổi thành công' ,  'success' );</script>";

}

?>
<div class="rounded shadow p-lg-4" id="div-changepw" >

<h2 class="h2o">Đổi mật khẩu</h2><br>
<p class="pp">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
<hr>

<form action="#" style="max-width:600px" id="form-changepw" method="POST">

 <div class="input-change">
   <i class="fa fa-key icon-change"></i>
   <input class="input-field" type="password" placeholder="Mật khẩu hiện tại" name="recentpass">
 </div>
 <?php echo isset($errChangePassword['nowPassword']) ? "<script>swal( 'Lỗi' ,  'Mật khẩu không đúng!' ,  'error' );</script>" : ''; ?>

 <div class="input-change">
   <i class="fa fa-pencil icon-change"></i>
   <input class="input-field" type="password" placeholder="Mật khẩu mới" name="newpass">
 </div>
 
 <div class="input-change">
   <i class="fa fa-check icon-change"></i>
   <input class="input-field" type="password" placeholder="Nhập lại mật khẩu" name="repeatpass">
 </div>

 <button type="submit" name="savechangepass" class="btn-change">Save Change </button>
</form>

       
  
 
   
</div>
</section>
<script>
    var myform = document.querySelector('#form-changepw');
    var oldPassword = document.querySelector('input[name="recentpass"]');
    var newPassword = document.querySelector('input[name="newpass"]');
    var repateNewpassword = document.querySelector('input[name="repeatpass"]');

    myform.addEventListener('submit', (e) => {

        if (oldPassword.value.length < 5) {
            e.preventDefault();
            return swal( "Lỗi" ,  "Mật khẩu không được trống!" ,  "error" );
        }

        if (newPassword.value.length < 5) {
            e.preventDefault();
            return swal( "Lỗi" ,  "Mật khẩu mới không được trống!" ,  "error" );
        }

        if (newPassword.value !== repateNewpassword.value) {
            e.preventDefault();
            return swal( "Lỗi" ,  "Mật khẩu không trùng nhau!" ,  "error" );

        }




    })
    </script>