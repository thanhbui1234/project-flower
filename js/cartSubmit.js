const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "m-1 btn btn-success",
    cancelButton: "m-1 btn btn-danger",
  },
  buttonsStyling: false,
});

btnSubmit = document.querySelector("#submitButton");
formCart = document.querySelector("#formSubmitCart");

btnSubmit.addEventListener("click", (e) => {
  e.preventDefault();
  return swalWithBootstrapButtons
    .fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Mày đã chắc chưa!",
      cancelButtonText: "Đéo!",
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
