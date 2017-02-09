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
<form method="post" action="/lesson3/admin/add">
    <p>заголовок: <input type="text" name="title" value="<?php echo $title; ?>"></p>
    <p>текст:<br>
    <textarea rows="25" cols="45" name="text"><?php echo $text; ?></textarea></p>
    <input type="submit">
</form>
</body>
</html>
