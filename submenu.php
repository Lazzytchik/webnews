<ul class="submenu">
    <?php 
        foreach($cats as $rowcat){
            echo '<li>';
            echo '<a href="/news/'.$row->name.'/'.$rowcat['name'].'/">'.$rowcat['name'].'</a>';
            echo '</li>';
        }
    ?>
</ul>