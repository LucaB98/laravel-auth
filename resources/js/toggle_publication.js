const togglePublicationForms = document.querySelectorAll('.publication-form');
togglePublicationForms.forEach(form => {

    form.addEventListener('click', () => {
        form.submit();
    })
})