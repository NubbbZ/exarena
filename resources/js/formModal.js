var myModal = new bootstrap.Modal(document.getElementById('formModal'));
window.addEventListener('openModal', event => {
    myModal.show();
});
window.addEventListener('closeModal', event => {
    myModal.hide();
});