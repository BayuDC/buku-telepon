const invalidInputFields = document.querySelectorAll('.uk-form-danger.uk-input');
[...invalidInputFields].forEach(field => {
    const keyDown = () => {
        field.classList.remove('uk-form-danger');
        field.removeEventListener('keydown', keyDown);
    };
    field.addEventListener('keydown', keyDown);
});

const inputPicture = document.getElementById('picture');
const btnReset = document.getElementById('btn-reset-img');
const imgPreview = document.getElementById('img-preview');
const alertPicture = document.getElementById('alert-picture');
inputPicture?.addEventListener('change', () => {
    const reader = new FileReader();
    reader.readAsDataURL(inputPicture.files[0]);
    reader.onload = () => {
        imgPreview.src = reader.result;
        btnReset.parentElement.classList.remove('uk-hidden');
        alertPicture.classList.add('uk-hidden');
        imgPreview.onload = () => {
            imgPreview.classList.remove('uk-hidden');
            inputPicture.parentElement.parentElement.classList.add('uk-margin-bottom', 'margin-right-s');
        };
    };
});
btnReset?.addEventListener('click', () => {
    inputPicture.value = null;
    inputPicture.nextElementSibling.value = null;
    imgPreview.src = '';
    imgPreview.classList.add('uk-hidden');
    btnReset.parentElement.classList.add('uk-hidden');
    inputPicture.parentElement.parentElement.classList.remove('uk-margin-bottom', 'margin-right-s');
});
