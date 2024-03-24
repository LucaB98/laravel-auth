const deleteForms = document.querySelectorAll('.delete-form');
const modal = document.getElementById('modal');
const confirmationButton = document.getElementById('modal-confirmation-button');
const modalBody = document.querySelector('.modal-body');
const modalTitle = document.querySelector('.modal-title');


let activeForm = null;



deleteForms.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();

        activeForm = form;

        confirmationButton.innerText = 'Conferma';
        confirmationButton.className = 'btn btn-danger';
        modalTitle.innerText = 'Elimina Progetto';
        modalBody.innerText = 'Sei sicuro di voler elimininare questo post?';

    })
});

confirmationButton.addEventListener('click', () => {
    if (activeForm) activeForm.submit();
});

modal.addEventListener('hidden.bs.modal', () => {
    activeForm = null;
})