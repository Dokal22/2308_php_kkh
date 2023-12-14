// 인라인 이벤트
// 40_이벤트.html 9~10

// ------------------
// 프로퍼티 리스너
// ------------------
    const BTNGOOGLE = document.getElementById('btn_google');
    BTNGOOGLE.onclick = function() {
        location.href = 'http://google.com';
    };

    
// ------------------
// 팝업창 열기
// ------------------
    // addEventListener(이벤트타입, 함수); : 한 선택자에 여러 함수 넣기(원래 안댐)
    const BTNDAUM = document.getElementById('btn_daum');
    let winOpen;

    function popOpen() {
        winOpen = open('http://www.daum.net', '', 'width=500 height=500, top=300, left=700'); // (주소/어디다가:_self,blank/속성)
    }
    function popClose() {
        winOpen.close();
    }

    BTNDAUM.addEventListener('click', popOpen ); // 함수파라미터(콜백함수)를 넘길 땐 ()를 빼야한다
    
    // ------------------
    // 팝업창 닫기
    // ------------------
    const BTNCLOSE = document.getElementById('btn_close');
    BTNCLOSE.addEventListener( 'click', popClose );
    
    // ------------------
    // 이벤트 삭제
    // ------------------
    BTNDAUM.removeEventListener( 'click', popOpen );
    BTNDAUM.addEventListener('click', popOpen ); // 함수파라미터(콜백함수)를 넘길 땐 ()를 빼야한다
    // BTNCLOSE.removeEventListener( 'click', popClose );

// ------------------
// 키보드 이벤트
// ------------------
    const INTXT = document.getElementById('intxt');
    INTXT.addEventListener('keyup', (e)=>console.log(e));

// ------------------
// 마우스 이벤트
// ------------------
    const DIV1 = document.querySelector('#div1');
    DIV1.addEventListener('mouseenter', () => {
        DIV1.style.backgroundColor = 'red';
        // alert('DIV1에 들어왔어요.');
        // prompt('삭제하시겠습니까?');
        // DIV1.style.transitionDelay = '250ms';
    });
    DIV1.addEventListener('mouseleave', () => {
        DIV1.style.backgroundColor = 'aquamarine';
    });