<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ГАЛАКТИЧЕСКИЙ ВЕСТНИК</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="container top">
    	<?if($_SERVER['PHP_SELF'] !== '/index.php'):?>
        <a class="logo-link" href="/">
        <?endif;?>
        	<img src="img/logo.png" alt="logo">
        	<h1>ГАЛАКТИЧЕСКИЙ<br> ВЕСТНИК</h1>
        <?if($_SERVER['PHP_SELF'] !== '/index.php'):?>
        </a>
        <?endif;?>
    </div>
</header>