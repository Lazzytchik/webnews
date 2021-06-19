<nav>
    <ul class="topmenu">
        <li><a href="/news/" class="active">Новости<span class="fa fa-angle-down"></span></a>
            <ul class="submenu">
                <?php 
                    
                    $cats = $categories->fetchall(PDO::FETCH_ASSOC);
                    
                    while($row = $groups->fetch(PDO::FETCH_OBJ)){
                        $amount = $db->get_grouped_news($row->name)->rowCount();
                        
                        if($amount > 0){
                            echo '<li>';
                            echo '<a href="/news/group-'.$row->name.'/">'.$row->name.'<span class="fa fa-angle-down"></span></a>';
                            require 'submenu.php';
                            echo '</li>'; 
                        }
                    }
                ?>
            </ul>
        </li>
        <li><a href="/about.php">О нас</a></li>
        <li><a href="/rules.php">Правила</a></li>
    </ul>
    <?php 
    
        if(isset($_SESSION['username'])){
            echo '<form class="authorization" action="/logout.php" method="post">';
            echo '<h2>Привет, '.$_SESSION['username'].'!<h2>';
            echo '<input type="submit" class="submit" name="submit" value="Выйти">';
            echo '</form>';
        }else{
            require "authmenu.php";
        }
    ?>
</nav>