const search = document.querySelector('input[name="search"]');

const formSearch = document.querySelector("#search");

formSearch.addEventListener("submit", (e) => {
  if (search.value === "") {
    e.preventDefault();
  }
});
