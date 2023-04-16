<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include './model/connect.php'?>
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Quên mật khẩu</h2>
            <h3 class="section-subheading text-muted">
                Shop X uy tín số 1 thế giới
            </h3>
        </div>
<?php

 

   if(isset($_POST['submit'])){
    global $true;
    if ($true==false) {

        echo "<script>swal( 'Lỗi' ,  'Không tồn tại email' ,  'error' );</script>";
    
    }
   }
 
  global $send;
  if ($send==true) {

      echo "<script>swal( 'Thành công' ,  'kiểm tra email của bạn để lấy mật khẩu mới' ,  'success' );</script>";
  
  }
?>
        <form id="contactForm" method="POST" action="" >
            <div class="row align-items-stretch mb-5">
                <div class="">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" name="email"  type="email" placeholder="Your Email *"
                           />

                     


                    </div>
                  

                    <div id="notregister" class="">
                        <span> <a
                                href="/project-flower/login/login.php?act=register">Đăng ký</a>  <a href="/project-flower/login/login.php?act=false">|| Đăng
                            nhập</a></span>
                      
                    </div>

                </div>

            </div>


            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase "    name="submit" type="submit">
                    Gửi đi
                </button>
            </div>
        </form>
    </div>
</section>
