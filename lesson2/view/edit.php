<?php
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>добавление новости</title>
</head>
<body>
<?php if (empty($art->title) && empty($art->text)): ?>
    <p>заполните форму ниже</p>
<?php elseif (empty($art->title)): ?>
    <p>введите заголовок статьи</p>
<?php elseif(empty($art->text)): ?>
    <p>введите текст статьи</p>
<?php endif; ?>
<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $art->id; ?>">
    <p>введите заголовок новости: <input style="width: 450px" type="text" name="header"
                                         value="<?php echo $art->title; ?>"></p>
    <p>введите текст новости: <textarea rows="15" cols="60" name="text"><?php echo $art->text; ?></textarea></p>
    <p><input type="submit"></p>
</form>
<a href="index.php">на главную</a>
</body>
</html>