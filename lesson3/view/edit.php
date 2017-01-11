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
<form method="post" action="index.php?ctrl=News&act=Edit">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <p>заголовок: <input type="text" name="title" <?php if(!empty($title)): ?>value="<?php echo $title; ?>"<?php endif; ?>></p>
    <p>текст:<br>
        <textarea rows="25" cols="45" name="text"><?php if(!empty($text)): echo $text; endif; ?></textarea></p>
    <input type="submit">
</form>
</body>
</html>