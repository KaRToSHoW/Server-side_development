const buttons = document.querySelectorAll('.pins, .operator.pins');
const input = document.querySelector('.screen');

const handleClick = (evt) => {
    evt.preventDefault();
    const data = evt.target.innerText;
    let currentValue = input.value;
    input.value = currentValue + data;
}

buttons.forEach((element) => {
    element.addEventListener('click', handleClick);
});