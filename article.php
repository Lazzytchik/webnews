<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <?
        
            require 'dbconfig.php';
            $db = new NewsDB('localhost', 'webnews');
            $db->connect('root', 'root');
        
            $groups = $db->get_groups();
            $categories = $db->get_categories();
    
            require 'mainmenu.php';
    
            $id = $_GET['id'];
            $name = $_GET['name'];
    
            $article = $db->get_article($id);
            $row = $article->fetch(PDO::FETCH_OBJ);
        
    ?>

    <div id='main'>
        <div class="newspaper">
            <h2><?php echo $row->title ?></h2>
            <div class="tags">
                <p class="group"><?php echo $row->group_name ?></p>
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
    </div>
    
</body>

</html>