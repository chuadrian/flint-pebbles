


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


document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.getElementById('submit-button');
    const emailInput = document.getElementById('modal-email');
    const nameInput = document.getElementById('modal-text');

    function validateInputs() {
      const email = emailInput.value.trim();
      const name = nameInput.value.trim();
      const emailValid = email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/);
      const nameValid = name.length > 0;
      
      submitButton.disabled = !(emailValid && nameValid);
    }

    emailInput.addEventListener('input', validateInputs);
    nameInput.addEventListener('input', validateInputs);

    submitButton.addEventListener('click', function handleClick() {
      // Create loader spinner
      const spinner = document.createElement('div');
      spinner.classList.add('spinner-border', 'text-light');
      spinner.setAttribute('role', 'status');
      spinner.innerHTML = '<span class="visually-hidden">Loading...</span>';

      // Replace button text with spinner
      submitButton.innerHTML = ''; // Clear any existing text
      submitButton.appendChild(spinner);
      submitButton.disabled = true;

      setTimeout(() => {
        submitButton.textContent = 'Success!';
        submitButton.disabled = false;

        // Create and add success message container
        const successContainer = document.createElement('div');
        successContainer.classList.add('alert', 'alert-success', 'd-flex', 'justify-content-center', 'align-items-center', 'mt-3');

        const successIcon = document.createElement('span');
        successIcon.classList.add('bi', 'bi-check-circle-fill', 'me-2'); // Add Bootstrap icon

        const successText = document.createElement('span');
        successText.textContent = 'You have successfully signed up!';

        successContainer.appendChild(successIcon);
        successContainer.appendChild(successText);

        const modalBody = submitButton.closest('.modal-content').querySelector('.modal-body');
        modalBody.appendChild(successContainer);
      }, 2000);
    });
});
  
