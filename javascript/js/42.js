// 비동기 : 절차순 무시?

// console.log('content1');
// setTimeout(()=>console.log('content2'),1000);
// console.log('content3');

// ---------------------------
// setTimeout 자체적으로 만들기 (얘는 동기적으로 작동)
// ---------------------------
    function mysetTimout(callback, ms){
        const NOW = new Date();
        let l1 = new Date();

        while(l1 - NOW <= ms){
            l1 = new Date();
        }
        callback();
    }

// ( 타이머 함수, http 요청, 이벤트 핸들러 )이것들 만 => 비동기처리