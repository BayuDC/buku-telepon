const invalidInputFields = document.querySelectorAll('.uk-form-danger.uk-input');
[...invalidInputFields].forEach(field => {
    const keyDown = () => {
        field.classList.remove('uk-form-danger');
        field.removeEventListener('keydown', keyDown);
    };
    field.addEventListener('keydown', keyDown);
});
