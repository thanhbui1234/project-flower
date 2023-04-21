const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger",
    },
    buttonsStyling: false,
});

const deleteBtn = document.querySelectorAll(".deleteProd");

deleteBtn.forEach((btn) => {
    const dataId = btn.getAttribute("data-id");
    console.log(dataId);

    btn.addEventListener("click", (e) => {
        e.preventDefault();

        swalWithBootstrapButtons
            .fire({
                title: "Bạn có chắc không?",
                text: "Bạn muốn xóa sản phẩm này phải không?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText:
                    '<a class="text-white" href="index.php?act=listProd&deleteProduct=' + dataId + '">Xóa</a>',
                cancelButtonText: "No, cancel!",
                reverseButtons: false,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    return "";
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        "Cancelled",
                        "Ok không xóa nữa :)))",
                        "error"
                    );
                }
            });
    });
});
