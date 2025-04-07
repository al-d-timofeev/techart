<?php
class NewsModel {
    private $db_host = 'localhost';
    private $db_user = 'cl183602_techart';
    private $db_password = '0OneTwo34';
    private $db_name = 'cl183602_techart';
    
    
    
    
    
    
    public function __construct() {
        // Подключение к базе данных
        $this->connection = new mysqli(
            $this->db_host,
            $this->db_user,
            $this->db_password,
            $this->db_name
        );
        
        if ($this->connection->connect_error) {
            die('Ошибка подключения: ' . $this->connection->connect_error);
        }
    }
    
    public function getAllNews() {
        // Выполнение SQL-запроса
        $sql = "SELECT * FROM news ORDER BY id DESC"; // 
        $result = $this->connection->query($sql);
        
        if (!$result) {
            return [];
        }
        
        $news = [];
        while ($row = $result->fetch_assoc()) {
            $news[] = $row;
        }
        
        return $news;
    }
    
    public function getPaginatedNews($offset, $limit) {
        // Получение новостей с учетом пагинации
        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT ?, ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param('ii', $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        
        
		$stmt->close();
        
        if (!$result) {
            return [];
        }
        
        $news = [];
        while ($row = $result->fetch_assoc()) {
            $news[] = $row;
        }
        
        return $news;
    }
    
    public function getNewsById(int $id) {
    	
		    $sql = 'SELECT * FROM news WHERE id = ?';
		    $stmt = $this->connection->prepare($sql);
		    $stmt->bind_param('i', $id);
		    $stmt->execute();
		
			$result = $stmt->get_result();

		    $curNews = $result->fetch_assoc();

		    return $curNews; 

    }
    
    
}


?>