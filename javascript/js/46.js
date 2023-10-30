// 1. async & await
//     promise를 더 보기 편하게!

    function PRO2(str, ms) {
        return new Promise(function(resolve) {
            setTimeout(()=>{
                console.log(str);
                resolve();
            }, ms);
        });
    }

    async function test() { // http 통신(API) 할 때 유용하다고 한다
        await PRO2('A', 3000);
        await PRO2('B', 2000);
        await PRO2('C', 1000);
    }
    
    // 병렬처리 하는 방법 : Promise.all()
        function PRO3() {

        }

        async function test2() {
            return Promise.all([PRO2('A',3000),PRO2('B',1000)])
                .then( duta => console.log('처리완료') );
        }

        const NOW = new Date();

        test2()
        .then( data =>{ // 통신시간 결과값 나옴
            console.log(data);
            const NOW2 =new Date();
            console.log(NOW2 - NOW);
        });