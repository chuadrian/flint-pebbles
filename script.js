


const addEventOnElements = function (elements, eventType, callBack) {
    for (let i = 0, len = elements.length; i < len; i++){
        elements[i].addEventListener(eventType, callback);
    }
}





const preloader = document.querySelector("[data-preloader]");

window.addEventListener("load", function () {
    preloader.classList.add("loaded");
    document.body.classList.add("loaded");
});


//submit form logic

document.addEventListener("DOMContentLoaded", function () {
    const modal = new bootstrap.Modal(document.getElementById('reg-modal'));
    const regButton = document.getElementById('reg-button');
    const emailInput = document.getElementById('modal-email');
    const nameInput = document.getElementById('modal-text');
    const spinner = document.getElementById('spinner');
    const regButtonLabel = document.getElementById('reg-button-label');

    modal.show();

    regButton.addEventListener('click', async function () {
        const email = emailInput.value.trim();
        const name = nameInput.value.trim();

        if (!email || !name) {
            alert('Please fill in both fields.');
            return;
        }

        regButton.disabled = true;
        regButtonLabel.textContent = 'Subscribing...';
        spinner.classList.remove('d-none');

        try {
            const response = await fetch('send_email.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ email, name })
            });

            const result = await response.json();

            if (result.success) {
                alert('Subscription successful!');
            } else {
                alert('Subscription failed. Please try again later.');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred. Please try again later.');
        } finally {
            regButton.disabled = false;
            regButtonLabel.textContent = 'Subscribe';
            spinner.classList.add('d-none');
        }
    });
});
  

