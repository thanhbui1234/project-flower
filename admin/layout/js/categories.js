const form = document.querySelector("#form-addCategories");
var inputAddCate = document.querySelector('input[name="category"]');
// console.log(input);

form.addEventListener("submit", (e) => {
  if (inputAddCate.value.length < 1) {
    e.preventDefault();
    return Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Trường này không được bỏ trống",
    });
  }
});

const deleteCategories = document.querySelectorAll(".delete_categories");

deleteCategories.forEach((btn) => {
  var idDelete = btn.getAttribute("data-id");
  console.log(idDelete);
  btn.addEventListener("click", (e) => {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText:
        '<a class="text-white" href="index.php?act=categories&delete=' +
        idDelete +
        '">Xóa</a>',
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire("Deleted!", "Your file has been deleted.", "success");
      }
    });
  });
});
x;
