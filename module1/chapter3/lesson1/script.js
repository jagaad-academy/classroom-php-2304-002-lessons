let buttonElement = document.getElementById("buttonSend");

buttonElement.addEventListener('click', (event) => {
    let nameInput = document.getElementById('name');
    let emailInput = document.getElementById('mail');
    let message = document.getElementById('msg');

    let alertString = nameInput.value + emailInput.value + message.value;

    alert(alertString);
});
