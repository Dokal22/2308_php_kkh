// 함수

// 함수생성

// 함수선언식 : 호이스팅 됨
function fnc_sum(a, b) {
    return a + b;
}

// 함수표현식 : 호이스팅 안됨(변수는 자리만 마련,,,)
let fnc1 = function(a, b) {// 이름 없는 익명 함수
    return a + b;
}

// 이름 없는 익명 함수
// function () {
//     return 1;
// }

// 콜백함수 : 다시 호출되는 함수 ~~함수와 함수를 합칠 수 있을 듯?
function fnc_callBack( call ) {
    call();
}

fnc_callBack(function() {
    console.log("익명함수");
})

// 자동 함수 만들기
let tt = Function('a', 'b', 'return a + b;');

// 화살표 함수(arrow Function)
let f1 = function() { return "f1";}
let f2 = () => "f2";
//      ~~확장
let f3 = a => a + '출력띠';
let f4 = (a, b) => a + b + '출력띠';
let f5 = (a, b) => {if(a>b){' a > b + 출력띠';}};