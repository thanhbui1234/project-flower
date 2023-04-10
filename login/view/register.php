<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Đăng ký tài khoản</h2>
            <h3 class="section-subheading text-muted">
                Khách hàng là thượng đế
            </h3>
        </div>





        <form action="#" method="POST" id="contactForm">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <input name="name" class="form-control " id="name" type="text" placeholder="Họ và tên *"
                            data-sb-validations="required" />


                    </div>


                    <div class="form-group">
                        <input name="email" class="form-control " id="email" type="email" placeholder="Email *"
                            data-sb-validations="required,email" />


                    </div>

                    <div class="form-group mb-md-0">
                        <input name="phone" class="form-control " id="phone" type="text" placeholder="Số điện thoại *"
                            data-sb-validations="required" />

                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input name="userName" class="form-control " id="name" type="text" placeholder="Tên tài khoản *"
                            data-sb-validations="required" />


                    </div>


                    <div class="form-group">
                        <input name="password" class="form-control " id="email" type="password" placeholder="Mật khẩu *"
                            data-sb-validations="required,email" />

                    </div>

                    <div class="form-group mb-md-0">
                        <input name="password2" class="form-control " id="phone" type="password"
                            placeholder="Xác nhận lại mật khẩu *" data-sb-validations="required" />
                    </div>


                </div>
                <div id="notregister" class="">
                    <P class="text-white"> Bạn đã có tài khoản <a href="/project-flower/login/login.php?act=false">Đăng
                            nhập</a>
                    </P>
                </div>

            </div>

            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase " name="register" id="submitButton" type="submit">
                    Đăng ký
                </button>
            </div>
        </form>
    </div>
</section>
<script>
const dataEmail = () => {
    const emailUnique = <?php echo json_encode($arrEmailUniqeue); ?>;
    const arrEmail = [];

    emailUnique.forEach((emaill, index) => {

        arrEmail.push(emaill.email);
    })
    return arrEmail;
}


const dataPhone = () => {
    const phoneUnique = <?php echo json_encode($arrPhoneUniqeue); ?>;
    const arrPhone = [];

    phoneUnique.forEach((phoneChild) => {

        arrPhone.push(phoneChild.phone);
    })
    return arrPhone;
}


const dataUserName = () => {
    const UserNameUnique = <?php echo json_encode($arruserNameUniqeue); ?>;
    const arrUserName = [];

    UserNameUnique.forEach((UserNameChild) => {

        arrUserName.push(UserNameChild.userName);
    })
    return arrUserName;
}


const validate = () => {
    const $ = document.querySelector.bind(document);
    var form_register = $("#contactForm");
    var hoten = $("input[name=name]");
    var email = $("input[name=email]");
    var phone = $("input[name=phone]");
    var userName = $("input[name=userName]");
    var password = $("input[name=password]");
    var password2 = $("input[name=password2]");
    arrEmail = dataEmail();
    arrPhone = dataPhone();
    arrUserName = dataUserName();




    form_register.addEventListener("submit", (e) => {
        if (hoten.value.length < 9 || !isNaN(Number(hoten.value))) {
            e.preventDefault();

            return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Họ tên có vấn đề",
            });
        }

        (valueEmail = email.oninput = function() {

            checkEmail = arrEmail.find((emailChild) => {
                return emailChild === email.value;
            })


            if (checkEmail) {
                e.preventDefault();

                return Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Email đã có người sử dụng ",
                });
            }

        })();



        (valuePhone = phone.oninput = function() {

            checkPhone = arrPhone.find((phoneChild) => {
                return phoneChild === phone.value;
            })


            if (checkPhone) {
                e.preventDefault();

                return Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Số điện thoại đã có người sử dụng ",
                });
            }

        })();
        (valueUserName = userName.oninput = function() {

            checkUserName = arrUserName.find((userNameChild) => {
                return userNameChild === userName.value;
            })


            if (checkUserName) {
                e.preventDefault();

                return Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Tên người dùng đã được đăng ký",
                });
            }

        })();

        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))) {
            e.preventDefault();

            return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Email có vấn đề!",
            });
        }


        if (
            phone.value.length < 10 || isNaN(phone.value) || !phone.value.startsWith("0")) {
            e.preventDefault();

            return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Lỗi số điện thoại rồi!",
            });
        }

        if (userName.value.length == 0) {
            e.preventDefault();

            return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Tên tài khoản không được bỏ trống!",
            });
        }

        if (userName.value.length <= 5) {
            e.preventDefault();

            return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Tên tài khoản phải lớn hơn 5 ký tự!",
            });
        }
        if (password.value.length == 0) {
            e.preventDefault();

            return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Mật khẩu không được bỏ trống!",
            });
        }

        if (password.value.length <= 5) {
            e.preventDefault();

            return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Mật khẩu phải trên 5 ký tự!",
            });
        }

        if (password2.value.length == 0) {
            e.preventDefault();
            return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Hãy nhật lại mật khẩu!",
            });
        }

        if (password.value !== password2.value) {
            e.preventDefault();
            return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Mật khẩu phải đúng!",
            });
        }
    });
};
validate();
</script>


</script>