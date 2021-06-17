<ul class="submenu">
    <?php 
        foreach($cats as $rowcat){
            $amount = $db->get_gc_news($row->name, $rowcat['name'])->rowCount();
            
            if($amount > 0){
                echo '<li>';
                echo '<a href="/news/group-'.$row->name.'/'.strtolower($rowcat['name']).'/">'.$rowcat['ru_name'].'</a>';
                echo '</li>';               
            }

        }
    ?>
</ul>