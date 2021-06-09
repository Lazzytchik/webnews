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
        
        <nav>
            <ul class="topmenu">
                <li><a href="" class="active">Главная<span class="fa fa-angle-down"></span></a>
                    <ul class="submenu">
                        <li><a href="">меню второго уровня</a></li>
                        <li><a href="">меню второго уровня<span class="fa fa-angle-down"></span></a>
                            <ul class="submenu">
                                <li><a href="">меню третьего уровня</a></li>
                                <li><a href="">меню третьего уровня</a></li>
                                <li><a href="">меню третьего уровня</a></li>
                            </ul>
                        </li>
                        <li><a href="">меню второго уровня</a></li>
                    </ul>
                </li>
                <li><a href="">Компания</a></li>
                <li><a href="">Блог</a></li>
                <li><a href="">Контакты</a></li>
            </ul>
        </nav>
        
        <?php
        
            require 'dbconfig.php';
            
            $get_news = "SELECT * FROM news JOIN categorized_news cn on news.id = cn.news_id WHERE group_name = :group and cat_name = :category ORDER by post_date DESC";
            //echo $get_news;
            $query = $pdo->prepare($get_news);
            $query->execute(['group' => 'php', 'category' => 'Обучение']);
            while($row = $query->fetch(PDO::FETCH_OBJ)){
                require 'news_form.php';
            }
        
        ?>
        
    </body>
</html>