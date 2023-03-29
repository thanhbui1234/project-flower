const selectAllBoxes = document.querySelector('#selectAllBoxes');

const selectAllBoxesChild = document.querySelectorAll('.selectAllBoxesChild');

selectAllBoxes.addEventListener('click', (e) => {
    selectAllBoxesChild.forEach(element => {
        // console.log(element);
        if (selectAllBoxes.checked == true) {
            element.checked = true;
        } else {
            element.checked = false;
        }
    });
})