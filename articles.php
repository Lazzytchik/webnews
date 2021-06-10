<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>News</title>
        <link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        
        <?php
        
            require 'dbconfig.php';
            $db = new NewsDB('localhost', 'webnews');
            $db->connect('root', 'root');
        
            $groups = $db->get_groups();
            $categories = $db->get_categories();
        
            require 'mainmenu.php';
            
            $group = $_GET['group'];
            $category = $_GET['category'];
        
            if ($group == null){
                $query = $db->get_news();
            } else if($category == null){
                $query = $db->get_grouped_news($group);
            } else{
                $query = $db->get_gc_news($group, $category);
            }
        
            while($row = $query->fetch(PDO::FETCH_OBJ)){
                require 'news_form.php';
            }
        
        ?>
        
    </body>
</html>