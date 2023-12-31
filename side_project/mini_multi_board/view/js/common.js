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


// 상세 모달 제어
function openDetail(open_id) { // id는 우리 서버내부로 쓰이는 무의미한거라 겟으로 ㄱ~
    const URL = '/board/detail?id=' + open_id; // localhost생략

    fetch(URL)
        .then(res => res.json())
        .then(arr => {
            // 요소에 데이터 셋팅 
            const TITLE = document.querySelector('#b_title');
            const CONTENT = document.querySelector('#b_content');
            const IMG = document.querySelector('#b_img');
            const DATE = document.querySelector('#b_date');
            // const DELETE =document.querySelector('#btn-delete');
            const DEL_INPUT = document.querySelector('#del_id');
            const BTN_DEL = document.querySelector('#btn_del');


            TITLE.innerHTML = arr.data.b_title;
            CONTENT.innerHTML = arr.data.b_content;
            IMG.setAttribute('src', arr.data.b_img);
            DATE.innerHTML = '작성일: ' + arr.data.created_at + ' / 수정일: ' + arr.data.updated_at;
            // DELETE.setAttribute('href', '/board/delete?b_id=' + arr.data.id + '&b_type=' + arr.data.b_type);
            DEL_INPUT.value = arr.data.id;

            // 삭제 버튼 표시
            if (arr.data.uflg === "1") {
                BTN_DEL.classList.remove('d-none');
            } else {
                BTN_DEL.classList.add('d-none');
            }

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
function closeDetailModal() { // id는 우리 서버내부로 쓰이는 무의미한거라 겟으로 ㄱ~
    const MODAL = document.querySelector('#modalDetail');
    MODAL.classList.remove('show');
    MODAL.style = 'display: none;';
}

function deleteCard() {
    const B_PK = document.querySelector('#del_id').value;
    const URL = '/board/remove?id=' + B_PK;

    fetch(URL)
        .then(res => res.json())
        .then(arr => {
            if (arr.errflg === "0") {
                // 모달 닫기
                closeDetailModal();

                // 카드 삭제
                const MAIN = document.querySelector('main');
                const DEL_CARD = document.querySelector('#card' + arr.id)
                MAIN.removeChild(DEL_CARD);
            } else {
                alert(arr.msg);
            }
        })
        .catch(err => console.log(err))
}// spa 싱글페이지: js로 바로바로 동적페이지 해주는거, 싱글페이지 어플리케이션

function updateBoard() { // id는 우리 서버내부로 쓰이는 무의미한거라 겟으로 ㄱ~
    // const MODAL = document.querySelector('#modalDetail');
    // MODAL.classList.remove('show');
    // MODAL.style = 'display: none;';
}

//아이디 중복 체크
function idChk() {
    const U_ID = document.querySelector('#u_id').value;
    const ERRMSG = document.querySelector('#idChkMsg');
    ERRMSG.innerHTML = ""; // 리셋

    const URL = '/user/idchk?u_id=' + U_ID;
    // const HEADER_GET = { // fetch를 post로 갔다오게 하는 법(정해져있음)
    //     method: 'GET'
    //     , body: {
    //         "u_id": U_ID.value
    //     }
    // }
    // fetch POST 인터넷 방식
    // const HEADER_POST = { // fetch를 post로 갔다오게 하는 법(정해져있음)
    //     method: 'POST',
    //     body: JSON.stringify({
    //         email: id,
    //         password: pw,
    //     })
    // }

    // fetch POST 쌤 방식
    // const formData = new FormData();
    // formData.append("u_id", U_ID.value);

    // const HEADER_POST = { 
    //     method: 'POST'
    //     , body: formData
    // };


    fetch(URL)
        .then(res => res.json())
        .then(arr => {
            if (arr.errflg === '0') {
                ERRMSG.innerHTML = '사용 가능한 아이디입니다.';
                ERRMSG.classList = 'text-success';
            } else {
                ERRMSG.innerHTML = '사용할 수 없는 아이디입니다.';
                ERRMSG.classList = 'text-danger';
            }
        })
        .catch(err => console.log(err))
}