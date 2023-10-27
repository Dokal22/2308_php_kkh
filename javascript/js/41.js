// 타이머 함수
    // 1. setTimeout(콜백함수, 시간(ms)) : 일정시간이 흐른 후에 콜백함수를 실행
        setTimeout(()=>console.log('시간'), 5000);

        // 실습
            // 콘솔에 1초 뒤에 'A', 2초 뒤에 'B', 3초 뒤에 'C'
                setTimeout(()=>{
                    console.log('A');
                    setTimeout(()=>{
                        console.log('B');
                        setTimeout(()=>console.log('C'), 1000);
                    }, 1000);
                }, 1000);
            
            // 위의 항목을 함수로
                let sigan = (chr, ms) =>
                    setTimeout(()=>console.log(chr), ms);

                sigan('D',4000);
    
    // 2. clearTimeout(해당 setTimeout객체) : 타이머를 삭제
        let mySet = setTimeout(()=>console.log('No시간'), 6000);
        clearTimeout(mySet);
