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
        <h1> Добро пожаловать на тестовый новостной портал!</h1>
        <p>На этом небольшом новостном портале вы можете найти новости в сфере веб-технологий на различные темы.</p>
    </div>
    
</body>

</html>
