<section>
    <div class="page_buts">
        <?php if($page_num>10){ ?>
                <a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $prev_page_num ?>"><div class="arrow_L"></div><span>이전</span></a><div class="sero"></div>
        <?php } ?>
        <?php
            $culc=((ceil($page_num/$page_list))*$page_list);
            $i=$culc-($page_list-1);
                    for($i;$i<=$culc;$i++){
                        if($i>$max_page_num){   
                        break;}
                        if($i==$page_num){
        ?>
                            <a class="page-btn_now" id="page-btn" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php
                        } else { // <button type=submit></button>
        ?>
                        <a class="page-btn" id="page-btn" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php       }} ?>
        <?php if($culc<$max_page_num){ ?>
                <div class="sero"></div><a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $next_page_num ?>"><span>다음</span><div class="arrow_R"></div></a>
        <?php } ?>         
    </div>  

</section>