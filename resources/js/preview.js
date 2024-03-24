const placeholder = "https://marcolanci.it/boolean/assets/placeholder.png";
const input = document.getElementById('image');
const preview = document.getElementById('preview');
const changeImagebutton = document.getElementById('change-image-button');
const previousImageField = document.getElementById('previous-image-field');

let blobUrl;

input.addEventListener('change', () => {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        blobUrl = URL.createObjectURL(file);
        preview.src = blobUrl;
    } else {
        preview.src = placeholder;
    }
});

window.addEventListener('beforeunload', () => {
    if (blobUrl) URL.revokeObjectURL(blobUrl);
});

changeImagebutton.addEventListener('click', () => {
    previousImageField.classList.add('d-none');
    input.classList.remove('d-none');
    preview.src = placeholder;
    input.click();
})
