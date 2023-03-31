const search = document.querySelector('input[name="search"]');
console.log(search);

const formSearch = document.querySelector("#search");
formSearch.addEventListener("submit", function (e) {
  if (search.value == "") {
    e.preventDefault();
  }
});
