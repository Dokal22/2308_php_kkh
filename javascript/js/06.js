// --------------------
// 기본 데이터 타입 
// --------------------
// typeof <= javascript 타입 출력
// 숫자 number
let num = 1;
// 문자열 string
let str = "string";
// 불리언 boolean
let boo = true;
// 널 null
let nu = null;
// 언디파인드 undefined
let und;
// 심볼 symbol : 고유한 ID를 가진 데이터 타입
let symbol_1 = Symbol("symbol");
// symbol_1 = Symbol("symbola");
let symbol_2 = Symbol("symbol");





// 이외는 전부 객체타입

// 객체타입
// Object
// obj.food2 / obj['eat'] <= javascript 객체 접근
let obj = {
    food1: "탕수육"
    ,food2: "짜장면"
    ,food3: "라조기"
    ,eat: function() {
        console.log("야무지게 먹");
    }
    ,list: {
        list1: "리스트1"
        ,list2: "리스트2"
        ,list3: "리스트3"
    }
}
// Array
let arr = [1,2,3];
//arr.length <= javascript 배열 길이 출력
// Date
// Math


// 실습 : 자신의 정보를 객체로 만들기
let info ={
    age: "22"
    ,name: "Kim Gwan-ho"
    ,birth_day: "20020329"
    ,gender: "male"
    ,favorate: "game"
    ,favorate_food: "ttuckbbokki"
    ,graduated_highschool: "Kumo highschool"
}



// 갑자기 json => javascript를 ""로 감싸기 때문에 ''를 쓴다.