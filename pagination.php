<div class="pagination">
    <?php
        if($page > 1){
            echo '<a href="'.((int)$page - 1).'"><div class="arrow block">«</div></a>';
        }
    
        if($page > 4){
            echo '<a href="1"><div class="block">1</div></a>';
        }
    
        echo '<a href="'.$page.'"><div class="block">'.$page.'</div></a>';
    
        if($count - $page > 3){
            echo '<a href="'.$count.'"><div class="block">'.$count.'</div></a>';
        }
    
        if($page < $count){
            echo '<a href="'.((int)$page + 1).'"><div class="arrow block">»</div></a>';
        }
    ?>
</div>