<?php
$currentArticleId = isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 ? (int)$_GET['id'] : 1;

$curNews = $NewsModel->getNewsById($currentArticleId);

$breadCrumbs = [
    ['url' => '/', 'name' => 'Главная'],
    ['url' => "/article.php?id=".$curNews['id'], 'name' => $curNews['title']]
];
?>
<hr>
<main>
    <div class="container">
            <div class="news_page">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        
                        <?php foreach ($breadCrumbs as $crumb): ?>
						        <li class="breadcrumb-item<?php if ($crumb === end($breadCrumbs)) echo ' active'; ?>">
						            <?php if ($crumb !== end($breadCrumbs)): ?>
						                <a href="<?= htmlspecialchars($crumb['url']) ?>"><?= htmlspecialchars($crumb['name']) ?></a>
						            <?php else: ?>
						                <?= htmlspecialchars($crumb['name']) ?>
						            <?php endif; ?>
						        </li>
						    <?php endforeach; ?>
                        
                    </ul>
                </nav>
                

                <h2><?= $curNews['title'] ?></h2>
                <div class="news_item_date">
                    <time><?= date('d.m.Y', strtotime($curNews['date']))?></time>
                </div>

                <div class="news_page_content">
                    <div>
                        <h3><?= $curNews['announce'] ?></h3> 
                        <div>
                            <p><?= $curNews['content'] ?></p>
                        </div>
                        <a class="back_to_news" href="/">НАЗАД К НОВОСТЯМ</a>
                    </div>
                    <div style="background: url(/images/<?= $curNews['image']?>) no-repeat top;">
 
                    </div>
                </div>


            </div>
        <hr>
    </div>
</main>