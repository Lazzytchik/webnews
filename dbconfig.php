<?
    //  Класс организующий работу с базой данных новостей
    class NewsDB{
        
        //  Имя хоста
        private $host;
        
        //  Название базы данных
        private $dbname;
        
        //  Ссылка на объект pdo
        private $pdo;
        
        //  Количество выводимых записей
        public $limit = 2;
        
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
        
        //  Функция, которая возвращает результат запроса новостей по группе и категории
        //  Параметр page определяет на какой странице находятся данные. Если page = 0, то запрос происходит без лимита
        function get_gc_news($group, $category, $page = 0){
            $news = "SELECT * FROM news JOIN categorized_news cn on news.id = cn.news_id WHERE group_name = :group and cat_name = :category ORDER by post_date DESC";
            $limitsql = "LIMIT :limit OFFSET :start";
            if ($page > 0){
                $news = $news.' '.$limitsql;
                $offset = ($page - 1)*$this->limit;
                $query = $this->pdo->prepare($news);
                $query->bindValue('limit', $this->limit, PDO::PARAM_INT);
                $query->bindValue('start', $offset, PDO::PARAM_INT);
            } else {
                $query = $this->pdo->prepare($news);
            }
            $query->bindValue('group', $group, PDO::PARAM_STR);
            $query->bindValue('category', $category, PDO::PARAM_STR);
            $query->execute();
            return $query;
        }
        
        //  Функция, которая возвращает результат запроса новостей по группе
        //  Параметр page определяет на какой странице находятся данные. Если page = 0, то запрос происходит без лимита
        function get_grouped_news($group, $page = 0){
            $news = "SELECT * FROM news WHERE group_name = :group ORDER by post_date DESC";
            $limitsql = "LIMIT :limit OFFSET :start";
            if ($page > 0){
                $news = $news.' '.$limitsql;
                $offset = ($page - 1)*$this->limit;
                $query = $this->pdo->prepare($news);
                $query->bindValue('limit', $this->limit, PDO::PARAM_INT);
                $query->bindValue('start', $offset, PDO::PARAM_INT);
            } else {
                $query = $this->pdo->prepare($news);
            }
            $query->bindValue('group', $group, PDO::PARAM_STR);
            $query->execute();
            return $query;
        }
        
        //  Функция, которая возвращает результат запроса новостей
        //  Параметр page определяет на какой странице находятся данные. Если page = 0, то запрос происходит без лимита
        function get_news($page = 0){
            $news = "SELECT * FROM news ORDER by post_date DESC";
            $limitsql = "LIMIT :limit OFFSET :start";
            if ($page > 0){
                $news = $news.' '.$limitsql;
                $offset = ($page - 1)*$this->limit;
                $query = $this->pdo->prepare($news);
                $query->bindValue('limit', $this->limit, PDO::PARAM_INT);
                $query->bindValue('start', $offset, PDO::PARAM_INT);
            } else {
                $query = $this->pdo->prepare($news);
            }
            $query->execute();
            return $query;
        }
        
        //  Функция, которая возвращает результат запроса групп новостей
        function get_groups(){
            $groups = "SELECT * FROM `groups`";
            $query = $this->pdo->query($groups);
            return $query;
        }
        
        //  Функция, которая возвращает результат запроса категорий новостей
        function get_categories(){
            $cat = "SELECT * FROM categories ORDER by name";
            $query = $this->pdo->query($cat);
            return $query;
        }
        
        //  Функция, которая возвращает результат запроса категорияй для определённой новости
        function get_news_categories($news_id){
            $sql = "SELECT cat_name, ru_name FROM `news` JOIN `categorized_news` cn ON news.id = cn.news_id JOIN `categories` c ON cn.cat_name = c.name WHERE id = :id";
            $query = $this->pdo->prepare($sql);
            $query->bindValue('id', $news_id, PDO::PARAM_INT);
            $query->execute();
            return $query;
        }
        
        //  Функция, которая возвращает результат запроса новости по идентификатору
        function get_article($id){
            $sql = "SELECT * FROM news WHERE id = :id";
            $query = $this->pdo->prepare($sql);
            $query->bindValue('id', $id, PDO::PARAM_INT);
            $query->execute();
            return $query;
        }
        
        //  Функция, которая возыращает результат запроса пользователя по имени пользователя
        function get_user($login){
            $sql = "SELECT * FROM users WHERE login = :login";
            $query = $this->pdo->prepare($sql);
            $query->bindValue('login', $login, PDO::PARAM_STR);
            $query->execute();
            return $query;
        }
        
    }

    

    
?>
