// 도큐먼트 오브젝 모델 DOM
// html 접근할 것임

// -----------
// 요소 선택
// -----------
    const TITLE = document.getElementById('title'); // 반환 : 콜렉션
    const TITLE2 = document.getElementById('title');
    const SUB = document.getElementById('subtitle');

    TITLE.style.color = 'blue';
    TITLE.style.fontSize = '5rem';
    SUB.style.backgroundColor = 'beige';

    //태그명으로, 태그는 배열로 가져옴
    const H1 = document.getElementsByTagName('h1'); // 반환 : 콜렉션
    H1[1].style.color = 'red';

    // 클래스로, 얘는 '.'넣어줘야 함
    const NONE = document.getElementsByClassName('.none-li'); // 반환 : 콜렉션

    // CSS 선택자로, 첫번째만
    const S_ID = document.querySelector('#subtitle2');
    const S_NONE = document.querySelector('.none-li');

    // CSS 선택자로, 전체
    const S_NONE_ALL = document.querySelectorAll('.none-li'); // 반환 : 노드리스트(반복불가? 배열출력말하는건가)
    
    
    // 급 실습
    // S_NONE_ALL[5].style.color = 'red';
    // S_NONE_ALL[8].style.color = 'green';
    

// -----------
// 요소 조작
// -----------
    // textContent = '졸지마유'
    TITLE.textContent = '꺅';
    const DIV1 = document.querySelector('#div1');
    DIV1.textContent = '뭘보쇼';

    // innerHTML 안에 태그
    DIV1.innerHTML = '<b>뭘 봤슈</b>';

    // setAttribute 태그 안에 속성추가
    const TEXT = document.querySelector('input');
    TEXT.setAttribute('placeholder','펭귄은 얼음을 깨먹어');

        // 속성 간단하게 주는 것도 잇음
        const INTXT = document.getElementById('in-txt');
        INTXT.classList='eminem';
        INTXT.placeholder='withoutme';

    // removeAttribute 속성 제거
    INTXT.removeAttribute('placeholder');

// -----------------
// 요소 스타일링
// -----------------
    // style
    TITLE.style.color = 'pink';

    // classList : 클래스로 스타일 설정
    TITLE.classList.add('class1','class2','class3');
    TITLE.classList.remove('class1','class3');

// -----------------
// 새로운 요소 생성
// -----------------
    // 요소 만들기
    const LI = document.createElement('li');

    // 삽입할 부모 요소 접근
    const UL = document.querySelector('#ul');

    // 부모요소의 가장 마지막 위치에 삽입
    UL.appendChild(LI);

    LI.textContent = 'textcon';
    // LI.innerHTML = '<b>inner</b>';

    // 요소를 특정 위치에 삽입하는 방법
    const SPACE = document.querySelector('li:nth-child(3)');
    UL.insertBefore(LI, SPACE);

    // 해당 요소 지우는 법
    LI.remove();

// 실습
    // 1. 사과 위에 장기
    const JANG = document.createElement('li');
    JANG.textContent = '삼국지';
    const SPACE2 = document.querySelector('li:nth-child(4)');
    UL.insertBefore(JANG, SPACE2)

    // 2. 어메이징 베이지 배경
    const AMG = document.querySelector('.none-li:last-child');
    AMG.style.backgroundColor = 'beige';

    // 3. 짝 : 빨, 홀 : 파
    const NONE_LI_ALL = document.getElementsByTagName('li');
    for(let i = 0; i<NONE_LI_ALL.length;i++){
        if(i%2===1){
            NONE_LI_ALL[i].style.color = 'red';
        } else {
            NONE_LI_ALL[i].style.color = 'blue';
        }
    }