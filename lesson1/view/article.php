<?php
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $article['header']; ?></title>
</head>
<body>
<h1><?php echo $article['header']; ?></h1>
<p><?php echo $article['text']; ?></p>
<a href="index.php">на главную</a>
</body>
</html>
