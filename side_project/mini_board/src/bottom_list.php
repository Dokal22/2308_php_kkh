<table>
    <!-- if(count($result) === false){ -->
    
    <!-- <tr><td>검색조건에 맞는 게시글을 찾을 수 없습니다.</td></tr> -->
    <?php
    // } else{
        foreach($result as $item){ ?>

            <tr>
                <td><?php echo $item["id"]; ?></td>
                <td id="title">
                    <a href="/mini_board/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
                    <?php echo $item["title"]; ?></a>
                </td>
                <td><?php echo $item["ip"]; ?></td>
                <td>
                    <?php
                        if(date("Y-m-d") == substr($item["create_at"],0,10)){
                            echo substr($item["create_at"],10,6);
                        }
                        else {echo substr($item["create_at"],0,10);}
                    ?>
                </td>
                <td>
                    <?php
                        echo $item["view_cnt"] ;
                    ?>
                </td>
                <td>0</td>
            </tr>

    <?php 
        }
    // } 
    ?>

    
</table>