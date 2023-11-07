// const BTN_DETAIL = document.querySelector('#btnDetail');
// const BTN_MODAL_CLOSE = document.querySelector('#btnModalClose');

// BTN_DETAIL.addEventListener('click', () => {
//     const MODAL = document.querySelector('#modal');
//     // MODAL.classList.toggle('displayNone'); // 클래스 넣기 빼기?
//     MODAL.classList.remove('displayNone'); // 클래스 넣기 빼기?
// });

// BTN_MODAL_CLOSE.addEventListener('click', () => {
//     const MODAL = document.querySelector('#modal');
//     // MODAL.classList.toggle('displayNone'); // 클래스 넣기 빼기?
//     MODAL.classList.add('displayNone'); // 클래스 넣기 빼기?
// });

let test;

// 상세 모달 제어
function openDetail(id) { // id는 우리 서버내부로 쓰이는 무의미한거라 겟으로 ㄱ~
    const URL = '/board/detail?id=' + id; // localhost생략

    fetch(URL)
        .then(res => res.json())
        .then(arr => {
            // 요소에 데이터 셋팅 
            const TITLE = document.querySelector('#b_title');
            const CONTENT = document.querySelector('#b_content');
            const IMG = document.querySelector('#b_img');
            const DATE = document.querySelector('#b_date');

            TITLE.innerHTML = arr.data.b_title;
            CONTENT.innerHTML = arr.data.b_content;
            IMG.setAttribute('src', arr.data.b_img);
            DATE.innerHTML = '작성일: ' + arr.data.created_at + ' / 수정일: ' + arr.data.updated_at;

            // 모달 오픈
            openModal();
        })
        .catch(err => console.log(err))
}

function openModal() {
    const MODAL = document.querySelector('#modalDetail');
    MODAL.classList.add('show');
    MODAL.style = 'display: block; background-color: rgba(0, 0, 0, 0.7);';
}

// 모달 닫기 함수
function closeDetailModal(id) { // id는 우리 서버내부로 쓰이는 무의미한거라 겟으로 ㄱ~
    const MODAL = document.querySelector('#modalDetail');
    MODAL.classList.remove('show');
    MODAL.style = 'display: none;';
}

function removeBoard(id) { // id는 우리 서버내부로 쓰이는 무의미한거라 겟으로 ㄱ~
    // const MODAL = document.querySelector('#modalDetail');
    // MODAL.classList.remove('show');
    // MODAL.style = 'display: none;';
}

function updateBoard(id) { // id는 우리 서버내부로 쓰이는 무의미한거라 겟으로 ㄱ~
    // const MODAL = document.querySelector('#modalDetail');
    // MODAL.classList.remove('show');
    // MODAL.style = 'display: none;';
}