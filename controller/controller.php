<?php
require_once 'model/model.php';


        // экземпляр модели
        $NewsModel = new NewsModel();
      
        
        // количество новостей на страницу
		$itemsPerPage = 4;
		
		// текущая страница
		$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
		
		// начальная позиция для выборки
		$startIndex = ($currentPage - 1) * $itemsPerPage;
		
		// новость с учетом пагинации
		$news = $NewsModel->getPaginatedNews($startIndex, $itemsPerPage);
		
		// общее количество новостей
		$allNews = $NewsModel->getAllNews();
		$totalItems = count($allNews);
		
		// общее количество страниц
		$totalPages = ceil($totalItems / $itemsPerPage);
		
		// следующая страница
		$nextPage = $currentPage + 1;
		
        
        
        $currentUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		if ($currentUrl === '/' || $currentUrl === '/index.php') {
			    
			    require_once 'view/index_view.php';
			    
			} elseif ($currentUrl === '/article.php') {
				
			    require_once 'view/article_view.php';
			}
        
