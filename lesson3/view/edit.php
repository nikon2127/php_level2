<?php
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="index.php?ctrl=Admin&act=Edit">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <p>заголовок: <input type="text" name="title" value="<?php echo $title; ?>"></p>
    <p>текст:<br>
        <textarea rows="25" cols="45" name="text"><?php echo $text; ?></textarea></p>
    <input type="submit">
</form>
</body>
</html>