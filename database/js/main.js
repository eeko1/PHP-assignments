'use strict';
const modifyLinks = document.querySelectorAll('.modify-link');
const modifyModal = document.querySelector('#modify-modal');

modifyLinks.forEach((link) => {
    link.addEventListener('click', async (evt) => {
        evt.preventDefault();
        const id = link.dataset.id;
        const response = await fetch('modifyForm.php?id=' + id);
        const html = await response.text();
        modifyModal.insertAdjacentHTML('beforeend', html);
        modifyModal.showModal();
    })
})