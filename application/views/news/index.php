<?php 
    foreach ($news as $news_item): 
?>
    <h2><?php echo $news_item['title'] ?></h2>
    <div id="main">
    <?php 
        echo $news_item['text'];
    ?>
    </div>
    <p>
        <a href="news/view/<?php echo $news_item['slug'] ?>">Ver Articulo</a>
        <a href="news/delete/<?php echo $news_item['slug'] ?>">Borrar Articulo</a>
        <a href="news/update/<?php echo $news_item['id'] ?>">Actualizar Articulo</a></p> <?//href="news/update" ?>
    </p>
<?php 
    endforeach
?>
