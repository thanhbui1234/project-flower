(function tabsUi() {
  const $ = document.querySelector.bind(document);
  const $$ = document.querySelectorAll.bind(document);

  const tabs = $$(".tab-item");
  const panes = $$(".tab-pane");

  const tabActive = $(".tab-item.active");
  const line = $(".tabs .line");
  line.style.left = tabActive.offsetLeft + "px";
  line.style.width = tabActive.offsetWidth + "px";

  tabs.forEach((tab, index) => {
    const pane = panes[index];
    tab.onclick = function () {
      $(".tab-item.active").classList.remove("active");
      $(".tab-pane.active").classList.remove("active");

      line.style.left = this.offsetLeft + "px";
      line.style.width = this.offsetWidth + "px";

      this.classList.add("active");
      pane.classList.add("active");
    };
  });
})();

(cancelBill = () => {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: " border border-light  m-3",
      cancelButton: "btn btn-danger",
    },
    buttonsStyling: false,
  });

  btnCancel = document.querySelectorAll(".btn-cancel");

  btnCancel.forEach((btn) => {
    var btnData = btn.getAttribute("data-id");

    btn.addEventListener("click", () => {
      swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText:
          "<a class='btn btn-success' href='index.php?act=order&CancelBill=" +
          btnData +
          "'> Yes delete it </a> ",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
      });
    });
  });
})();

(disebelBtn = () => {
  // localStorage.setItem("student", JSON.stringify(students));

  // var students = JSON.parse(localStorage.getItem("student"));
  // console.log(students);
  var dataDisible = [];

  btndelivered = document.querySelectorAll(".delivered");

  btndelivered.forEach((btn) => {
    btn.onclick = function () {
      dataBtn = this.getAttribute("data-id");
      dataDisible.push(dataBtn);
      localStorage.setItem("dataDisible", JSON.stringify(dataDisible));
    };
  });

  dataDisible = JSON.parse(localStorage.getItem("dataDisible"));
})();
