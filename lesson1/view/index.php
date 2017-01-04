<?php
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>news</title>
</head>
<body>
<?php foreach ($news as $vol): ?>
<p><a href="article.php?id=<?php echo $vol['id_news']; ?>"><?php echo $vol['header']; ?></a></p>
<p><?php echo $vol['text']; ?></p>
    <p><a href="add.php?id=<?php echo $vol['id_news']; ?>">Редактировать</a></p>
<?php endforeach; ?>
</body>
</html>
