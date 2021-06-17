<!DOCTYPE html>

<!-- HTML форма для вывода новостей -->
<div class="newspaper">
    <h2><?php echo $row->title ?></h2>
    <div class="tags">
        <p class="group"><?php echo $row->group_name?></p>
        <?php
            $ncats = $db->get_news_categories($row->id);
            while($inrow = $ncats->fetch(PDO::FETCH_OBJ)){
                echo ('<p class="category">'.$inrow->ru_name.'</p>') ;
            }
        ?>
    </div>
    <p class="date"><?php echo $row->post_date ?></p>
    <p><?php echo $row->text ?></p>
</div>