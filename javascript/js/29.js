// random() : 0 이상 1미만의 랜덤한 수를 반환
Math.floor(Math.random()*10);
Math.round(Math.random()*10); // 반올림

console.log('시작');
for(let i=0;i<1000000;i++){
    let a = Math.ceil(Math.random()*10);
    if(a < 1 || a > 10 ){
        console.log('이상한 숫자');
    }
}
console.log('끝');

// min(), max()
let arr = [1,2,3,4,5,6,5,6,65];
Math.max(...arr); // 배열은 ...넣고
Math.min(...arr);