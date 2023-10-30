// 1. promise 객체
//     - 비동기 프로그래밍의 근간이 되는 기법 중 하나
//     - 프로미스를 사용하면 콜백함수를 대체하고, 비동기 직업의 흐름을 쉽게 제어가능
//     - promise 객체는 작업의 최종 완료 또는 실패를 나타내는 독자적이 객체

// 2. promise 사용법
    // const PROMISE1 = new Promise(function(resolve, reject) {
    //     let flg = true;
    //     if(flg) {
    //         return resolve('성공'); // 요청 성공 시
    //     } else {
    //         return reject('실패'); // 요청 실패 시
    //     }
    // });

    // PROMISE1
    // .then(data => console.log(data))
    // .catch(err => console.log(err))
    // .finally(() => console.log('finally'))

    // PROMISE1
    // .then(() => setTimeout(()=>{console.log('A')}, 3000))
    // .catch(err => console.log(err))
    // .finally(() => console.log('finally'))

    function PRO2() {
        return new Promise(function(resolve, reject) {
                let flg = true;
                if(flg) {
                    return resolve('성공'); // 요청 성공 시
                } else {
                    return reject('실패'); // 요청 실패 시
                }
        });
    }

    PRO2()
    .then()
    .catch()
    .finally()