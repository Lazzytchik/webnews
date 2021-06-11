<nav>
    <ul class="topmenu">
        <li><a href="/news/" class="active">Главная<span class="fa fa-angle-down"></span></a>
            <ul class="submenu">
                <?php 
                    
                    $cats = $categories->fetchall(PDO::FETCH_ASSOC);
                
                    while($row = $groups->fetch(PDO::FETCH_OBJ)){
                        echo '<li>';
                        echo '<a href="/news/'.$row->name.'/">'.$row->name.'<span class="fa fa-angle-down"></span></a>';
                        require 'submenu.php';
                        echo '</li>';
                    }
                ?>
            </ul>
        </li>
    </ul>
</nav>