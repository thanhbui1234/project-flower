
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
      title: "Bạn có chắc chắn muốn xoá không!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText:
        "<a class='btn btn-success' href='index.php?act=delcmt&id=" +
        btnData +
        "'>Xoá</a>",
      cancelButtonText: "Thôi!",
      reverseButtons: true,
    });
  });
});

