const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: " border border-light",
    cancelButton: "btn btn-danger",
  },
  buttonsStyling: false,
});
const btn = document.querySelectorAll("button");

btn.forEach((button) => {
  button.addEventListener("click", (e) => {
    return swalWithBootstrapButtons
      .fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "<a class='btn btn-success' href=''>Yes</a>",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
      })
      .then((result) => {
        if (
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
