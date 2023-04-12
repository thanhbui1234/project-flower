
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "border border-white m-2 ",
    cancelButton: "m-2 btn btn-danger",
  },
  buttonsStyling: false,
});

const btn = document.querySelectorAll(".btn-delete");
console.log(btn);

btn.forEach((btnDelete) => {
  btnData = btnDelete.getAttribute("data-id");
  btnDelete.addEventListener("click", (e) => {
    return swalWithBootstrapButtons.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText:
        "<a class='btn btn-success' href='index.php?act=comment&delete=" +
        btnData +
        "'>Yes delete it</a>",
      cancelButtonText: "No, cancel!",
      reverseButtons: true,
    });
  });
});

