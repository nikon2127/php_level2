<?php
error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: Никон
 * Date: 04.01.2017
 * Time: 17:47
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if (empty($header) && !empty($text)){ ?>
<p>введите заголовок статьи</p>
<?php }elseif (!empty($header) && empty($text)){ ?>
<p>введите текст статьи</p>
<?php }else{ ?>
<p>заполните форму ниже</p>
<?php } ?>
<form action="add.php" method="post">
    <p>введите заголовок новости: <input style="width: 450px" type="text" name="header"
                                         value="<?php echo $header; ?>"></p>
    <p>введите текст новости: <textarea rows="15" cols="60" name="text"><?php echo $text; ?></textarea></p>
    <p><input type="submit"></p>
</form>
<a href="index.php">на главную</a>
</body>
</html>
