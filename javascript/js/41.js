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
        // clearTimeout(mySet);

    // 3. setInterval(콜백함수, 시간(ms)) : 일정 시간 만큼 반복
        let myInter = setInterval(()=>console.log('허이짜'),500);

    // 4. clearInterval(해당 setTimeout객체) : 인터버를 삭제
        // clearInterval(myInter);

        // 실습
            // 오픈 5초후 두둥둥장
                let h1 = document.createElement('h1')
                setTimeout(()=> {
                    h1.innerHTML='두두둥장'
                    document.body.appendChild(h1)
                    // const H1 = document.getElementsByTagName('h1');
                    // H1[0].innerHTML='두두둥장' // 무친 배열놈
                } , 7000);
