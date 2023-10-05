
<div class="bottom_list">
    <table>
        <colgroup>
            <col width=70%>
            <col width=15%>
            <col width=15%>
        </colgroup>
        <!-- if(count($result) === false){ -->
        
        <!-- <tr><td>검색조건에 맞는 게시글을 찾을 수 없습니다.</td></tr> -->
        <?php
        // } else{
            foreach($result_bottom as $item_bottom){ ?>

                <?php 
                if($id == $item_bottom["id"]){
                ?>
                <tr class="now_bottom_list">
                <?php 
                }else{
                ?>
                <tr>
                <?php 
                }
                ?>
                    <td id="title">                        
                        <a href="/mini_board/src/detail.php/?id=<?php echo $item_bottom["id"]; ?>&page=<?php echo $page_num; ?>">
                        <?php echo $item_bottom["title"]; ?>
                        </a>
                    </td>
                    <td><?php echo $item_bottom["ip"]; ?></td>
                    <td>
                        <?php
                            if(date("Y-m-d") == substr($item_bottom["create_at"],0,10)){
                                echo substr($item_bottom["create_at"],10,6);
                            }
                            else {echo substr($item_bottom["create_at"],0,10);}
                        ?>
                    </td>
                </tr>

        <?php 
            }
        ?>

        
    </table>
</div>