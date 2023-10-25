// Date()
let now = new Date();
let sDate = new Date('2023-09-30 19:20:10');

// getFullYear()
let y = now.getFullYear();

// getMonth() : index값
let mo = now.getMonth()+1;

// getDate()
let d = now.getDate();

// getDay() : index값
let dy = now.getDay();

// getHours() : index값
let h = now.getHours();

// getMinutes() : index값
let m = now.getMinutes();

// getSeconds() : index값
let s = now.getSeconds();

// getMilliseconds() : index값
let ms = now.getMilliseconds();

    // 밀리초 주의 1792809치면 1792809000... 더 나와서 자리 맞춰줘야 맞음

let now2 = y + '년' + mo +'월'+d+'일'+dy+'요일'+h+'시'+m+'분'+s+'초'+ms;

// getTime() : 1970 리눅스 타임
let diff = now - sDate;
let diff_print = (diff / (1000*60*60*24));
console.log(Math.ceil(diff_print));
// console.log(diff.getDate()); 안되네ㅠ
// abs() : 절대값

// new Date(year, month-1, date, 0, 0, 0, 0) : now->day단위까지 계산