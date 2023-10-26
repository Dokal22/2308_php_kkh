// ------------------
// 실습
// ------------------
    // 1. 버튼 누르면 숨는다!+알럴트
    const BTNDIV2 = document.getElementById('btn_div2');
    const DIV2 = document.querySelector('#div2');
    const DIV3 = document.querySelector('#div3');
    let findout = 0;
    let findout2 = 0;
    let start = 0;
    function div_limit(val, num){
        return (val/100)*num;
    }
    BTNDIV2.addEventListener('click', ()=>{
        findout=0;
        findout2=0;
        if(start===0){
            alert('날 찾아보시오\n개행뭐요');
        }else{
            alert('다시 찾아보실?\n아흥행');
        }
        DIV2.style.top=div_limit(Math.round(Math.random()),83.8)+'%';
        DIV2.style.left=div_limit(Math.round(Math.random()),91.4)+'%';
        DIV3.style.top=div_limit(Math.round(Math.random()),80)+'%';
        DIV3.style.left=div_limit(Math.round(Math.random()),80)+'%';
    });
    // 2. 근처 오면 두근두근, +알럴트은 마지막에
    DIV2.addEventListener('mouseenter', () => {
        if(findout===0){
            alert('풉키풉키');
            findout=1;
        }
        DIV2.style.backgroundColor='black';
        BTNDIV2.addEventListener('click', ()=>{
            DIV2.style.backgroundColor='transparent';
        });
    });
    // 3. 누르면 찾았구나, 등장+알럴트
    DIV3.addEventListener('click', () => {
        if(findout2===0){
            alert('우예알았소');
            findout2=1;
        }
        start=1;
        DIV3.style.backgroundColor='pink';
        BTNDIV2.addEventListener('click', ()=>{
            DIV3.style.backgroundColor='transparent';
        });
    });
    // 4. 누르면 다시 숨을게+알럴트