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
            $page = (int)$_GET['page'];
        
            if ($group == null){
                $query = $db->get_news($page);
                $count = $db->get_news()->rowCount();
            } else if($category == null){
                $query = $db->get_grouped_news($group, $page);
                $count = $db->get_grouped_news()->rowCount();
            } else{
                $query = $db->get_gc_news($group, $category, $page);
                $count = $db->get_gc_news()->rowCount();
            }
        
            $count = round($count / $db->limit, 0);
        
            while($row = $query->fetch(PDO::FETCH_OBJ)){
                require 'news_form.php';
            }
        
            require 'pagination.php';
        
        ?>
        
    </body>
</html>