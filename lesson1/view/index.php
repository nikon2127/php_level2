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
<p><a href="add.php">Добавить новость</a><hr></p>
<?php foreach ($news as $vol): ?>
<p><a href="article.php?id=<?php echo $vol['id_news']; ?>"><?php echo $vol['header']; ?></a></p>
<p><?php echo $vol['text']; ?></p>
    <p><a href="edit.php?id=<?php echo $vol['id_news']; ?>">Редактировать</a></p>
    <p><a href="delete.php?id=<?php echo $vol['id_news']; ?>">Удалить новость</a>
    <hr></p>
<?php endforeach; ?>
</body>
</html>
