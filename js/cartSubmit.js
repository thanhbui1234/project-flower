const regaxPhone =
  /^(\+{0,})(\d{0,})([(]{1}\d{1,3}[)]{0,}){0,}(\s?\d+|\+\d{2,3}\s{1}\d+|\d+){5}[\s|-]?\d+([\s|-]?\d+){1,2}(\s){0,}$/gm;
$ = document.querySelector.bind(document);
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "m-1 btn btn-success",
    cancelButton: "m-1 btn btn-danger",
  },
  buttonsStyling: false,
});

btnSubmit = $("#submitButton");
formCart = $("#formSubmitCart");
namee = $('input[name="customer"]');
phone = $('input[name="phone"]');
email = $('input[name="email"]');
adress = $('input[name="address"]');

formCart.addEventListener("submit", (e) => {
  e.preventDefault();

  if (namee.value === "") {
    return Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Họ tên có vấn đề",
    });
  }
  if (!regaxPhone.test(phone.value)) {
    return Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Số điện thoại có vấn đề",
    });
  }
  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)) {
    return Swal.fire({
      icon: "error",
      title: "Oops...",
      text: " Email có vấn đề",
    });
  }
  if (adress.value === "") {
    return Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Địa chỉ không được bỏ trống",
    });
  }

  btnSubmit.addEventListener("click", (e) => {
    e.preventDefault();
    return swalWithBootstrapButtons
      .fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Mua!",
        cancelButtonText: "Khong !",
        reverseButtons: true,
      })
      .then((result) => {
        if (result.isConfirmed) {
          formCart.submit();
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            "Cancelled",
            "Your imaginary file is safe :)",
            "error"
          );
        }
      });
  });
});
