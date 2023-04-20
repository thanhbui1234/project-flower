<?php showDataUser();?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
global $ok;
if ($ok=="success") {

    echo "<script>swal( 'Thành công' ,  'Cập nhật thành công' ,  'success' );</script>";

}?>
<section class="bg-light container  mt-5 p-lg-3  bg-body" id="">
    <div class="rounded shadow p-lg-4" id="formbg">
    <h2 class="h2">Hồ sơ của tôi</h2><br>
<p class="p">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
<hr class="hr">

<div class="bcsprofile">
    <div>
    <form id="formProfile"  enctype="multipart/form-data" action="#" style="max-width:500px;margin:auto" method="POST"  >
<?php foreach($dataUser as $user){?>
<div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" placeholder="Username" value="<?php echo $user["name"]?>" name="user_profile">
</div>

<div class="input-container">
  <i class="fa fa-envelope icon"></i>
  <input class="input-field" type="text" placeholder="Email" value="<?php echo $user["email"]?>" name="email_profile">
</div>

<div class="input-container">
  <i class="fa fa-city icon"></i>
  <input class="input-field" type="text" placeholder="address" value="<?php echo $user["address"]?>"  name="address_profile">
</div>

<div class="input-container">
<i class="fa fa-phone icon"></i>
  <input  class="input-field" type="text" placeholder="PhoneNumber" value="<?php echo $user["phone"]?>" name="phone_profile">
</div>


<button type="submit"  class="saveupdate" name="saveProfile">SAVE UPDATE</button>

    </div>
   
   <div>
   <?php echo empty($user['image']) ? "<img   class='imgprofile'   src='/../project-flower/layout/assets/img/avtDefault.jpg' alt=''><br>" : "<img class='imgprofile'  src='/../project-flower/admin/uploads/$user[image]' alt=''><br>"; ?>
  
    <label class="pick"  for="pickanh">Chọn ảnh</label>
    <input type="file" hidden  name="pickimg" id="pickanh">
   </div>

</div><?php }?>
</form>
    </div>
  
</section>
<script>
const form = document.querySelector("#formProfile");
var user = document.querySelector('input[name="user_profile"]');
var email = document.querySelector('input[name="email_profile"]');
var address = document.querySelector('input[name="address_profile"]');
var phone = document.querySelector('input[name="phone_profile"]');


form.addEventListener("submit", (e) => {

  if (user.value.length<1 || email.value.length<1 || phone.value.length<1 ) {
    e.preventDefault();
    return swal( "Lỗi rồi" ,  "Bạn không được bỏ trống bất kỳ trường nào!" ,  "error" );
  }else if(user.value.length<6 ){
    e.preventDefault();
    return swal( "Lỗi UserName" ,  "Bạn không được ghi tên quá ngắn!" ,  "error" );
  }else if(!isNaN(user.value) || user.value.includes("@") || user.value.includes("!") || user.value.includes("#") || user.value.includes("$") || user.value.includes("%")){
    e.preventDefault();
    return swal( "Lỗi UserName" ,  "Tên người dùng không hợp lệ" ,  "error" );
  }else if( email.value.length<10 || !email.value.includes("@") || !email.value.includes(".")){
    e.preventDefault();
    return swal( "Lỗi Email" ,  "Email không hợp lệ!" ,  "error" );
  }else if(phone.value.length!=10 && phone.value.length!=11){
    e.preventDefault();
    return swal( "Lỗi PhoneNumber" ,  "Số điện thoại không hợp lệ!" ,  "error" );
  }else if(isNaN(phone.value) || !phone.value.startsWith("0")){
    e.preventDefault();
    return swal( "Lỗi PhoneNumber" ,  "Số điện thoại không hợp lệ!" ,  "error" );
  }else if( address.value.includes("@") || address.value.includes("!") || address.value.includes("#") || address.value.includes("$") || address.value.includes("%") ){
    e.preventDefault();
    return swal( "Lỗi Địa chỉ" ,  "Địa chỉ không hợp lệ" ,  "error" );
  }
 
 


   
  
});


