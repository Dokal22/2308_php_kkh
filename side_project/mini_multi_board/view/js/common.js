const BTN_DETAIL = document.querySelector('#btnDetail');
const BTN_MODAL_CLOSE = document.querySelector('#btnModalClose');

BTN_DETAIL.addEventListener('click', () => {
    const MODAL = document.querySelector('#modal');
    // MODAL.classList.toggle('displayNone'); // 클래스 넣기 빼기?
    MODAL.classList.remove('displayNone'); // 클래스 넣기 빼기?
});

BTN_MODAL_CLOSE.addEventListener('click', () => {
    const MODAL = document.querySelector('#modal');
    // MODAL.classList.toggle('displayNone'); // 클래스 넣기 빼기?
    MODAL.classList.add('displayNone'); // 클래스 넣기 빼기?
});