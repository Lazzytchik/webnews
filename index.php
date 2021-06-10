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
            $db = new NewsDB('localhost', 'webnews');
            $db->connect('root', 'root');
            
            $query = $db->get_news('html', 'Классика');
            while($row = $query->fetch(PDO::FETCH_OBJ)){
                require 'news_form.php';
            }
        
        ?>
        
    </body>
</html>