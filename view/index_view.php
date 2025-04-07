
<div class="main_news" style="background: url(/images/<?echo $allNews[array_key_first($allNews)]['image']?>) no-repeat center; background-size: cover;">
    <div class="container">
    	
        <h2>
        	<a href="/article.php?id=<?echo $allNews[array_key_first($allNews)]['id']?>">
        		<?echo $allNews[array_key_first($allNews)]['title']?>
        		</a>
        </h2>
        <p><?echo $allNews[array_key_first($allNews)]['announce']?></p>
    </div>
</div>
<main>
    <div class="container">
        <div class="news">
            <h2>Новости</h2>
            <div class="news_block">
            	
            	<?php foreach ($news as $item): ?>
			        
			        <div class="news_item">
	                    <div class="news_item_date">
	                        <time><?= date('d.m.Y', strtotime($item['date']))?></time>
	                    </div>
	                    <h3><?= $item['title'] ?></h3>
	                    <?= $item['announce'] ?>
	                    <a href="/article.php?id=<?= $item['id']?>">ПОДРОБНЕЕ</a>
	                </div>
	                
			    <?php endforeach; ?>
            	
            </div>


            <div class="pagination">
                <ul>
                	
                    <?
	                    for ($i = 1; $i <= $totalPages; $i++) {
						  
							if ($i == $currentPage) { 
					            echo "<li><a class='active' href='/index.php?page=$i'>$i</a></li>";
					        } else {
					            echo "<li><a href='/index.php?page=$i'>$i</a></li>";
					        }
						}
                    ?>
                    
                </ul>
                
                
	                <?
		                if($currentPage < $totalPages){
							echo "<div class='pagination_next'><a href='/index.php?page=$nextPage'></a></div>";
						}
	                ?>
                
            </div>
        </div>
        <hr>
    </div>


</main>



