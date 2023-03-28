const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: " border border-light",
    cancelButton: "btn btn-danger",
  },
  buttonsStyling: false,
});

const btn = document.querySelectorAll("button");

btn.forEach((button) => {
  var idBtn = button.getAttribute("data-id");
  console.log(idBtn);
  button.addEventListener("click", (e) => {
    return swalWithBootstrapButtons.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText:
        "<a class='btn btn-success' href='index.php?act=users&deleteUser=" +
        idBtn +
        "'>Yes</a>",
      cancelButtonText: "No, cancel!",
      reverseButtons: false,
    });
  });
});
