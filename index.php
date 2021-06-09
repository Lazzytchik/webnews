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
        
        <?php
        
            require 'dbconfig.php';
            
            $get_news = 'SELECT * FROM news ORDER by post_date DESC';
            $query = $pdo->query($get_news);
            while($row = $query->fetch(PDO::FETCH_OBJ)){
                require 'news_form.php';
            }
        
        ?>
        
    </body>
</html>