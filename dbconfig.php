<?
    //  Класс организующий работу с базой данных новостей
    class NewsDB{
        
        //  Имя хоста
        private $host;
        
        //  Название базы данных
        private $dbname;
        
        //  Ссылка на объект pdo
        private $pdo;
        
        //  Конструктор с установкой хоста и названия базы данных.
        function __construct($host, $dbname){
            $this->host = $host;
            $this->dbname = $dbname;
        }
        
        //  Процедура для подключения к базе данных
        function connect($login, $password){
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
            $this->pdo = new PDO($dsn, 'root', 'root');
        }
        
        //  Функция, которая возващает результат запроса новостей по группе и категории
        function get_gc_news($group, $category){
            $news = "SELECT * FROM news JOIN categorized_news cn on news.id = cn.news_id WHERE group_name = :group and cat_name = :category ORDER by post_date DESC";
            $query = $this->pdo->prepare($news);
            $query->execute(['group' => $group, 'category' => $category]);
            return $query;
        }
        
        //  Функция, которая возващает результат запроса новостей по группе
        function get_grouped_news($group){
            $news = "SELECT * FROM news WHERE group_name = :group ORDER by post_date DESC";
            $query = $this->pdo->prepare($news);
            $query->execute(['group' => $group]);
            return $query;
        }
        
        //  Функция, которая возващает результат запроса новостей
        function get_news(){
            $news = "SELECT * FROM news ORDER by post_date DESC";
            $query = $this->pdo->query($news);
            return $query;
        }
        
        //  Функция, которая возвращает результат запроса групп новостей
        function get_groups(){
            $groups = "SELECT * FROM `groups`";
            $query = $this->pdo->query($groups);
            return $query;
        }
        
        //  Функция, которая возваращет результат запроса категорий новостей
        function get_categories(){
            $cat = "SELECT * FROM categories ORDER by name";
            $query = $this->pdo->query($cat);
            return $query;
        }
        
    }

    

    
?>