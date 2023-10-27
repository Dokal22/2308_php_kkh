// ------------------
// 실습
// ------------------
    // 1. 버튼 누르면 숨는다!+알럴트
    const BTNDIV1 = document.getElementById('btn_div1');
    const BTNDIV2 = document.getElementById('btn_div2');
    const DIV2 = document.querySelector('#div2');
    const DIV3 = document.querySelector('#div3');
    let onoff = false;
    let findout = 0;
    let findout2 = 0;
    let start = 0;
    function div_limit(val, num){
        return ((val/100)*num);
    }
    let div2_top = () =>  {return div_limit(Math.round(Math.random()*100),83.8)};
    let div2_left = () =>  {return div_limit(Math.round(Math.random()*100),91.4)};
    let div3_xy = () =>  {return div_limit(Math.round(Math.random()*100),80)};

    
    BTNDIV1.addEventListener('click', ()=>{
        onoff = !onoff; // => toggle() : classlist명을 적용/미적용
        if(onoff===true){
            alert('켜짐')
        }else{
            alert('꺼짐')
        }
    });

    BTNDIV2.addEventListener('click', ()=>{
        if(onoff===true){
            if(start===0){
                alert('날 찾아보시오\n개행뭐요');
                
                findout=0;
                DIV2.style.top=div2_top()+'%';
                DIV2.style.left=div2_left()+'%';
                DIV3.style.top=div3_xy()+'%';
                DIV3.style.left=div3_xy()+'%';
            }
        }
    });
    // 2. 근처 오면 두근두근, +알럴트은 마지막에
    DIV2.addEventListener('mouseenter', () => {
        if(onoff===true){
            if(findout===0){
                alert('풉키풉키');
                findout=1;
                start=1;
            }
            DIV2.style.backgroundColor='black';
            BTNDIV2.addEventListener('click', ()=>{
                DIV2.style.backgroundColor='transparent';
            });
        }
    });
    // 3. 누르면 찾았구나, 등장+알럴트
    DIV3.addEventListener('click', () => {
        if(onoff===true){
            if(findout2===0){
                alert('우예알았소');
                findout2=1;
            }else if(findout2===1){
                findout=0;
                findout2=0;
                alert('다시 찾아보실?\n아흥행');
                DIV2.style.top=div2_top()+'%';
                DIV2.style.left=div2_left()+'%';
                DIV3.style.top=div3_xy()+'%';
                DIV3.style.left=div3_xy()+'%';
            }
            
            DIV3.style.backgroundColor='pink';
            BTNDIV2.addEventListener('click', ()=>{
                DIV3.style.backgroundColor='transparent';
            });
        }
    });
    // 4. 누르면 다시 숨을게+알럴트