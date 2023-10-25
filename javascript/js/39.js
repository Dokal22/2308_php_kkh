// 도큐먼트 오브젝 모델 DOM
// html 접근할 것임

// -----------
// 요소 선택
// -----------
    const TITLE = document.getElementById('title');
    const TITLE2 = document.getElementById('title');
    const SUB = document.getElementById('subtitle');

    TITLE.style.color = 'blue';
    TITLE.style.fontSize = '5rem';
    SUB.style.backgroundColor = 'beige';

    //태그명으로, 태그는 배열로 가져옴
    const H1 = document.getElementsByTagName('h1');
    H1[1].style.color = 'red';

    // 클래스로, 얘는 '.'넣어줘야 함
    const NONE = document.getElementsByClassName('.none-li');

    // CSS 선택자로, 첫번째만
    const S_ID = document.querySelector('#subtitle2');
    const S_NONE = document.querySelector('.none-li');

    // CSS 선택자로, 전체
    const S_NONE_ALL = document.querySelectorAll('.none-li');
    S_NONE_ALL[5].style.color = 'red';
    S_NONE_ALL[8].style.color = 'green';
    for(let i = 0; i<S_NONE_ALL.length;i++){
        if(i%2===0){
            S_NONE_ALL[i].style.color = 'red';
        } else {
            S_NONE_ALL[i].style.color = 'green';

        }
    }

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
