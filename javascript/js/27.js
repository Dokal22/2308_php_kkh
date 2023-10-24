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