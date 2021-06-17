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
        
    ?>

    <div id='main'>
        <h1>О нас</h1>
        <p>На этом небольшом новостном портале вы можете найти новости в сфере веб-технологий на различные темы. Здесь представлены следующие группы и категории:</p>
        <h3>Группы новостей</h3>
        <ul class="groups-list">
            <?php
                $groups = $db->get_groups();

                while($row = $groups->fetch(PDO::FETCH_OBJ)){
                    $amount = $db->get_grouped_news($row->name)->rowCount();
                    $categories = $db->get_categories();
                    
                    if($amount > 0){
                        echo '<li><a href="/news/group-'.$row->name.'/">'.$row->name.'('.$amount.')</br> - '.$row->description.'</a>';
                    
                        echo '<ul class="cat-list">';
                    
                        while($catrow = $categories->fetch(PDO::FETCH_OBJ)){
                            $amount = $db->get_gc_news($row->name, $catrow->name)->rowCount();
                            
                            if($amount > 0){
                                echo '<li><a href="/news/group-'.$row->name.'/'.strtolower($catrow->name).'/">'.$catrow->ru_name.'('.$amount.')'.'</a>';
                                echo '</li>';
                            }
                        }
                        echo '</ul>';
                        echo '</li>';
                    }
                }
                
            ?>
        </ul>
    </div>
    
</body>

</html>