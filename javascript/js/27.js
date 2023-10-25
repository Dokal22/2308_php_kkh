let arr = [1,2,3,4,5];

//push() 메소드 : 배열에 값을 추가
arr.push(6);

// splice() : 배열의 요소를 삭제 또는 교체
arr.splice(2,1);// (인덱스 n부터, 몇 개 삭제)

arr.splice(3,1);
arr.splice(2,0,10); // 3번 째는 추가할 거
arr.splice(4,1,'드','개','재'); // 3번 째 후로는 추가할 거


// indexOf() : 배열에서 특정 요소를 찾는데 사용
arr.indexOf(4);

// lastIndexOf() : 배열에서 특정 요소 중 가장 마지막 위치의 값 반환
arr = [1,1,1,3,4,5,6,6,6,10];
arr.lastIndexOf(4);

// pop() : 배열의 가장 마지막 요소를 빼와서 반환
let i_pop = arr.pop();

// sort() : 배열을 정렬
arr = [5,6,23,67,6,45,4,35,3426,7,3];
// arr.sort((a,b)=>a-b);
arr.sort(function(a, b){ 
    if(a > b) return 1; // 난 희한하게 -1이 될 때만 바뀌는거같냐
                        // 그러면 a가 뒤에꺼고 b가 앞에꺼여야 한다.
                        // a-b=-1 => 오름차 : 왼쪽이 클 때 바꾼다(-1)
    // if(a === b) return 0;
    // if(a < b) return -1;
});

// 배열 데이터를 받아오기
let arr2 = Array.from(arr);

// includes() : 배열의 특정요소를 가지고 있는지 판별
arr = ['치킨', '육회비빔밥', '비엔나', '철판제육']
arr.includes('비엔나'); // true/false

// join() : 배열의 모든 요소를 연결해서 하나의 문자열을 리턴
arr.join(); // '치킨,육회비빔밥,비엔나,철판제육'
arr.join(' '); // '치킨육회비빔밥비엔나철판제육'
arr.join(' / '); // '치킨 / 육회비빔밥 / 비엔나 / 철판제육'

// map() : foreach같음, 원본유지
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    // 모든 요소의 값 * 2의 결과를 배열로 얻고싶어
    let arr3 = arr.map(a => a*2);

// sume() : 배열에 조건을 만족하는 값 있는지 판별 ( OR )
let boo_some = arr.some( a => a > 10 );

// every() : 배열들이 조건을 만족하는 값인지 판별 ( AND )\
let boo_every = arr.every( a => a === 7 );

// filter() : 배열의 요소 중에 주어진 함수에 만족한 요소만 모아서 새로운 배열을 리턴
let boo_filter = arr.filter( a => a % 7 === 0 );