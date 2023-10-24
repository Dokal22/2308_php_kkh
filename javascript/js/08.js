let mwuya = '급 \"이스케이프\" 문자'; // 쌍따옴표 홑따옴표 같이 동시 문자열


//조건문
// if(0){

// }else if(0){

// }else{

// }

let age = 30;
switch(age){
    case 20:
        console.log("20대");
        break;
    case 30:
        console.log("30대");
        break;
    default:
        console.log("몰루");
        break;
}

//반복문 ( while, do_while, for, foreach, for...in, for...of )
//  foreach : 배열만 가능 => 오브제 X?
let arr = [1,2,3,4];
arr.forEach(function(val, key){
    console.log(`${key} : ${val}`);
    console.log(key + ' : ' +val);
});
arr.forEach((val, key) => { // 방법이 다양하다
    console.log(`${key} : ${val}`);
});

// for...in : 모든 객체 루프 가능, key에만 접근
let obj = {
    key1: 'val1'
    ,key2: 'val2'
    ,key3: 'val3'
}
for( let key in obj ) { // php랑 반대 ($arr as $key => val)
    console.log(key);
    console.log(obj[key]);
}

// for...of : 모든 iterable객체 루프 가능,val에만 접근
//                   ^(string, array, map, set, typearray)
for( let val of arr ) { // php랑 반대 ($arr as $key => val)
    console.log(val);
}

// 실습 : 정렬해주세요.
let sort_arr = [8,4,7,2,6,10,13,1,9,16];
let i = 0;
let j = 0;
let tmp = 0;
// for(j=0;j<sort_arr.length;j++){
//     for(i=0;i<sort_arr.length-j-1;i++){ // i<sort_arr.length-j 에 쌤꺼 보고 -1 함
//         if(sort_arr[i]>sort_arr[i+1]){
//             tmp = sort_arr[i];
//             sort_arr[i] = sort_arr[i+1];
//             sort_arr[i+1] = tmp;
//         }
//     }
// }


// foreach하는거 같은데 현재가a 그 앞이 b로 해서 
// 1일 때 작동이 뒤쪽(>>)으로 미는거고 
// -1일 때 앞쪽(<<)으로 미는 원리를 적용한 듯
sort_arr.sort(function(a, b){ 
    // if(a > b) return 0;
    // if(a === b) return 0;
    if(a < b) return -1;
});

// 함수 선언 방식
// arr.sort(function(a, b)  {
//     return a - b;
//   });

// 화살표 방식
// arr.sort((a, b) => a - b); // php 7버전 이후로 가능...?