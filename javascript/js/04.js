console.log("본인 킹왕짱js");

// ------------------------------
// javascript자바스크립트 변수 선언법
// ------------------------------
//      var : 중복 선언 가능 , 재할당 가능, 함수레벨 스코프 <<<<<<<<협업에 비선호
//      let : 중복 선언 불가, 재할당 가능, 블록레벨 스코프 <<<<<<<<선호
let a ="asdf";
console.log(a);
// let a ="asdf";
console.log(a);// 변수 이름 재선언하면 안됨
a ="fdsa";
console.log(a);

// var랑 let 같이 쓰면 let이 강제한더라
// 아마 if 먼저 돌려서 변수명 같으면 바로 오류 시키는 듯

//      const : 상수, 중복선언 불가능, 재할당 불가능, 블록레벨 스코프
const B = 20;
// B = 2; //<<<<<<<<<<<<에러
console.log(B);


//1024
// ---------------
// 스코프 : 영역?
// ---------------
// 전역 스코프
let gender = "M";
// 함수레벨 스코프, 블록레벨 스코프
function test(){
    let test1 = "test1";
    var test1_1 = "test1_1";
    if(true){
        let test1 = "test2"; // 블록{} 레벨이라 if블록을 벗어날 수 없음
        var test1_1 = "test2_2";
        test1 = "test3";
        console.log(test1);
    }
    console.log(test1);
    console.log(gender);
}

// 상함수 : 안에 넘나듬
// 하블록 : 벗어나질 못함
//      헷갈릴거 같으면 아예 위에 다 선언하고 끌어다 쓰셈
//              ~~쓸데 없는지식 : js에선 { let test = 1; } 만 써도 작동



// ------------------------
// 호이스팅 (hoisting)
// ------------------------
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당하는 것

console.log(htest1());
console.log(hvar); // var는 호이스팅 때 자리만 마려함. 값 선언 없음.
// console.log(hlet); // 오류 : let은 호이스팅을 안하나?

function htest1() {
    hvar = "함수선언"; // 호이스팅 때 함수는 다 불러서 hvar에 들어감(undefined가 아님)
    return "htest1 함수입니다.";   
}

var hvar = "var로 선언";
let hlet = "let으로 선언";

