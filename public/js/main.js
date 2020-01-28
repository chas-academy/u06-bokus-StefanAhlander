/** Some JS to add functionality for adding and subtracting books from a list of books.
 *  The event handlers updates the value property of the corresponding (sibling) input field.
 */

let subtractBtn = document.querySelectorAll(".subtract_book");
let addBtn = document.querySelectorAll(".add_book");

function subtract() {
    let valueElm = this.parentNode.querySelector("input");
    if (valueElm.value > 0) valueElm.value = valueElm.value - 1;
}

function add() {
    let valueElm = this.parentNode.querySelector("input");
    valueElm.value = Number(valueElm.value) + 1;
}

subtractBtn.forEach(e => e.addEventListener("click", subtract));
addBtn.forEach(e => e.addEventListener("click", add));
