// 두 수 받아서 더한 값 리턴
let a = (a,b)=> a+b


// 1. php 출력 
function phpPrint(){
    console.log('php');
}
// 2. 504 출력 
function five04Print(){
    console.log('504');
}
// 3. 풀스택 출력 
function fullPrint(){
    console.log('풀스택');
}

// 함수1->3s
setTimeout(phpPrint,3000);
// 함수1->5s
setTimeout(five04Print,5000);
// 함수1->0s
fullPrint();

// 현재시간 구하기
let now = new Date();
now.toLocaleDateString();
now.toLocaleString();


// -----------------
// confirm 창 띄우기
// -----------------
    // let c = confirm('ttt'); // 반환 boolean
    // if(c){
    //     window.location.href='https://wecanit.tistory.com/33';
    // }


// 버튼 -> 네이버 이동
    const BTN = document.getElementsByTagName('button');
    function toNaver(){
        window.location.href='https://naver.com';
    };
    // BTN[0].addEventListener('click',toNaver);

    BTN[0].onclick = toNaver;