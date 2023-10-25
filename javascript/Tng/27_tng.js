// 원본 없어지면 안됨. 오름차
const ARR_SORT = [6, 3, 5, 8, 92, 3, 7, 5, 100, 90, 40];

let arr = Array.from(ARR_SORT).sort((a,b) => a-b );

//짝수와 홀수를 분리해서 각각 새로운 배열을 만들어주세요.
const ARR2 = [5,7,3,4,5,1,2];

let arr2 = Array.from(ARR2);
let hol_jak = (a) => {
    a[0] = a.filter( a => a % 2 === 0 );
    a[1] = a.filter( a => a % 2 === 1 );
    a.splice(2);
    return a;
}
    // 쌤이 말한건 (배열, 홀)하면 출력해주는거

// 다음 문자열에서 구분문자를 '.'dptj ' '으로 변경
const STR1 = 'php504.meer.kat';
let str1 = STR1;
let reg = /./g; // replace일 때 바꾸기
console.log(str1.replaceAll('.', ' '));

// split('.') => [php, me, ka]
// join(' ') => 'php me ka'
// str1.replace(/\./g, ' ');



// !!!!!!!js에서는 기본이 function(&a)이기 때문에!!!!!!!!
// !!!!!!!!!!!!!!함수에 넣으면 무조건 바뀜!!!!!!!!!!!!!!!

// iterable = []
// not iterable = {}