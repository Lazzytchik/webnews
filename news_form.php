<!DOCTYPE html>

<!-- HTML форма для вывода новостей -->
<div class="newspaper">
    <h2><?php echo $row->title ?></h2>
    <p class="date"><?php echo $row->post_date ?></p>
    <p><?php echo $row->text ?></p>
</div>