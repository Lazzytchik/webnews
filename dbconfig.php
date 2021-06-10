<?

    class NewsDB{
        
        private $host;
        private $dbname;
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
            $get_news = "SELECT * FROM news JOIN categorized_news cn on news.id = cn.news_id WHERE group_name = :group and cat_name = :category ORDER by post_date DESC";
            $query = $this->pdo->prepare($get_news);
            $query->execute(['group' => $group, 'category' => $category]);
            return $query;
        }
        
        //  Функция, которая возващает результат запроса новостей по группе
        function get_grouped_news($group){
            $get_news = "SELECT * FROM news WHERE group_name = :group ORDER by post_date DESC";
            $query = $this->pdo->prepare($get_news);
            $query->execute(['group' => $group]);
            return $query;
        }
        
        //  Функция, которая возващает результат запроса новостей
        function get_news(){
            $get_news = "SELECT * FROM news ORDER by post_date DESC";
            $query = $this->pdo->query($get_news);
            return $query;
        }
        
    }

    

    
?>